<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Webkul\Product\Models\Product;
use App\Services\Product\ProductVisibilityService;

class DiagnoseProductVisibility extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:diagnose {product_id : The ID of the product to diagnose}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'تشخيص مشاكل ظهور المنتج في الواجهة الأمامية';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $productId = $this->argument('product_id');
        
        $product = Product::find($productId);
        
        if (!$product) {
            $this->error("❌ المنتج #{$productId} غير موجود!");
            return 1;
        }

        $this->info("🔍 تشخيص المنتج: {$product->sku}");
        $this->newLine();

        $service = new ProductVisibilityService();
        
        // Check visibility
        $isVisible = $service->isVisibleInFrontend($product);
        
        if ($isVisible) {
            $this->info("✅ المنتج مرئي في الواجهة الأمامية");
        } else {
            $this->error("❌ المنتج غير مرئي في الواجهة الأمامية");
        }
        
        $this->newLine();
        $this->info("📋 متطلبات الظهور:");
        $this->newLine();

        // Get requirements
        $requirements = $service->getVisibilityRequirements($product);
        
        $headers = ['المتطلب', 'مطلوب؟', 'القيمة الحالية', 'صحيح؟', 'الرسالة'];
        $rows = [];
        
        foreach ($requirements as $key => $req) {
            $rows[] = [
                $key,
                $req['required'] ? '✅ نعم' : '⚪ لا',
                $req['current'] ?? 'NULL',
                $req['valid'] ? '✅ نعم' : '❌ لا',
                $req['message'],
            ];
        }
        
        $this->table($headers, $rows);
        
        // Show missing requirements
        $missing = $service->getMissingRequirements($product);
        
        if (!empty($missing)) {
            $this->newLine();
            $this->error("⚠️  المتطلبات الناقصة:");
            foreach ($missing as $key => $req) {
                $this->line("  • {$key}: {$req['message']}");
            }
        }
        
        // Additional checks
        $this->newLine();
        $this->info("🔍 فحوصات إضافية:");
        
        // Check price indices
        $hasPrice = $service->hasValidPrice($product);
        $this->line("  • السعر (price_indices): " . ($hasPrice ? '✅ موجود' : '❌ غير موجود'));
        
        // Check inventory indices
        $hasInventory = $service->hasValidInventory($product);
        $this->line("  • المخزون (inventory_indices): " . ($hasInventory ? '✅ موجود' : '❌ غير موجود'));
        
        // Check product_flat
        $productFlat = \DB::table('product_flat')
            ->where('product_id', $product->id)
            ->where('locale', app()->getLocale())
            ->where('channel', core()->getCurrentChannel()->code)
            ->first();
        
        $this->line("  • product_flat: " . ($productFlat ? '✅ موجود' : '❌ غير موجود'));
        
        if ($productFlat) {
            $this->line("    - name: " . ($productFlat->name ?? 'NULL'));
            $this->line("    - url_key: " . ($productFlat->url_key ?? 'NULL'));
            $this->line("    - status: " . ($productFlat->status ?? 'NULL'));
            $this->line("    - visible_individually: " . ($productFlat->visible_individually ?? 'NULL'));
        }
        
        // Check categories
        $categoriesCount = $product->categories()->count();
        $this->line("  • الفئات (categories): " . ($categoriesCount > 0 ? "✅ {$categoriesCount} فئة" : '❌ لا توجد فئات'));
        
        // Check images
        $imagesCount = $product->images()->count();
        $this->line("  • الصور (images): " . ($imagesCount > 0 ? "✅ {$imagesCount} صورة" : '⚠️  لا توجد صور'));
        
        // Check channels
        $channelsCount = $product->channels()->count();
        $this->line("  • القنوات (channels): " . ($channelsCount > 0 ? "✅ {$channelsCount} قناة" : '❌ لا توجد قنوات'));
        
        $this->newLine();
        
        // Recommendations
        if (!$isVisible) {
            $this->info("💡 التوصيات:");
            
            if (!empty($missing)) {
                $this->line("  1. قم بتحديث المتطلبات الناقصة أعلاه");
            }
            
            if (!$hasPrice) {
                $this->line("  2. قم بإنشاء price index للمنتج");
            }
            
            if (!$hasInventory) {
                $this->line("  3. قم بإنشاء inventory index للمنتج");
            }
            
            if (!$productFlat) {
                $this->line("  4. قم بتحديث product_flat table");
                $this->line("     php artisan indexer:index products");
            }
            
            if ($categoriesCount == 0) {
                $this->line("  5. قم بربط المنتج بفئة واحدة على الأقل");
            }
            
            if ($channelsCount == 0) {
                $this->line("  6. قم بربط المنتج بقناة واحدة على الأقل");
            }
        }
        
        return 0;
    }
}
