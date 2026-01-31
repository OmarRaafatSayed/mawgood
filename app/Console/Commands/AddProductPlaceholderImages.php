<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Webkul\Product\Models\Product;
use Webkul\Product\Models\ProductImage;

class AddProductPlaceholderImages extends Command
{
    protected $signature = 'products:add-placeholder-images';
    protected $description = 'إضافة صور افتراضية للمنتجات التي ليس لها صور';

    public function handle()
    {
        $this->info('جاري البحث عن المنتجات بدون صور...');
        
        $productsWithoutImages = Product::doesntHave('images')->get();
        
        if ($productsWithoutImages->isEmpty()) {
            $this->info('جميع المنتجات لديها صور!');
            return 0;
        }
        
        $this->info("تم العثور على {$productsWithoutImages->count()} منتج بدون صور");
        
        // نسخ صورة placeholder إلى storage
        $placeholderSource = base_path('packages/Webkul/Shop/src/Resources/assets/images/medium-product-placeholder.webp');
        
        if (!File::exists($placeholderSource)) {
            $this->error('لم يتم العثور على صورة placeholder');
            return 1;
        }
        
        $bar = $this->output->createProgressBar($productsWithoutImages->count());
        $bar->start();
        
        foreach ($productsWithoutImages as $product) {
            // إنشاء مجلد للمنتج
            $productPath = 'product/' . $product->id;
            Storage::disk('public')->makeDirectory($productPath);
            
            // نسخ الصورة
            $imageName = 'placeholder.webp';
            $destinationPath = $productPath . '/' . $imageName;
            
            Storage::disk('public')->put(
                $destinationPath,
                File::get($placeholderSource)
            );
            
            // إضافة السجل في قاعدة البيانات
            ProductImage::create([
                'product_id' => $product->id,
                'path' => $destinationPath,
                'type' => 'image',
                'position' => 1,
            ]);
            
            $bar->advance();
        }
        
        $bar->finish();
        $this->newLine();
        $this->info('تم إضافة الصور بنجاح!');
        
        return 0;
    }
}
