<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Webkul\Product\Models\Product;

class ApproveVendorProducts extends Command
{
    protected $signature = 'vendor:approve-products {--product_id= : معرف منتج محدد}';
    protected $description = 'الموافقة على منتجات التجار وإصلاحها';

    public function handle()
    {
        $this->info('=== إصلاح منتجات التجار ===');
        $this->newLine();

        $query = Product::where('vendor_id', '!=', null);
        
        if ($productId = $this->option('product_id')) {
            $query->where('id', $productId);
        } else {
            $query->where('approved_by_admin', false);
        }
        
        $products = $query->get();

        if ($products->isEmpty()) {
            $this->info('✅ لا توجد منتجات تحتاج إصلاح');
            return 0;
        }

        $this->info("وجدت {$products->count()} منتج يحتاج إصلاح");
        $this->newLine();

        $bar = $this->output->createProgressBar($products->count());
        $bar->start();

        foreach ($products as $product) {
            // 1. الموافقة على المنتج
            $product->approved_by_admin = true;
            $product->status = 1;
            $product->save();
            
            // 2. تحديث product_flat و url_key
            $name = DB::table('product_attribute_values')
                ->join('attributes', 'product_attribute_values.attribute_id', '=', 'attributes.id')
                ->where('product_attribute_values.product_id', $product->id)
                ->where('attributes.code', 'name')
                ->value('text_value') ?? 'Product ' . $product->id;
            
            // توليد url_key من الاسم
            $urlKey = \Illuminate\Support\Str::slug($name) . '-' . $product->id;
            
            DB::table('product_flat')
                ->where('product_id', $product->id)
                ->update([
                    'name' => $name, 
                    'status' => 1,
                    'visible_individually' => 1,
                    'url_key' => $urlKey
                ]);
            
            // تحديث url_key في attributes (مهم للـ routing)
            $urlKeyAttr = DB::table('attributes')->where('code', 'url_key')->first();
            if ($urlKeyAttr) {
                // للغة الإنجليزية
                DB::table('product_attribute_values')->updateOrInsert(
                    [
                        'product_id' => $product->id,
                        'attribute_id' => $urlKeyAttr->id,
                        'channel' => 'default',
                        'locale' => 'en'
                    ],
                    [
                        'text_value' => $urlKey,
                        'unique_id' => 'default|en|' . $product->id . '|' . $urlKeyAttr->id
                    ]
                );
                
                // للغة العربية
                DB::table('product_attribute_values')->updateOrInsert(
                    [
                        'product_id' => $product->id,
                        'attribute_id' => $urlKeyAttr->id,
                        'channel' => 'default',
                        'locale' => 'ar'
                    ],
                    [
                        'text_value' => $urlKey,
                        'unique_id' => 'default|ar|' . $product->id . '|' . $urlKeyAttr->id
                    ]
                );
            }
            
            // تحديث visible_individually في attributes
            DB::table('product_attribute_values')
                ->join('attributes', 'product_attribute_values.attribute_id', '=', 'attributes.id')
                ->where('attributes.code', 'visible_individually')
                ->where('product_attribute_values.product_id', $product->id)
                ->update(['boolean_value' => 1]);
            
            // 3. إنشاء price index
            if (!DB::table('product_price_indices')->where('product_id', $product->id)->exists()) {
                $price = $product->price ?? 0;
                DB::table('product_price_indices')->insert([
                    'product_id' => $product->id,
                    'customer_group_id' => 1,
                    'channel_id' => 1,
                    'min_price' => $price,
                    'regular_min_price' => $price,
                    'max_price' => $price,
                    'regular_max_price' => $price,
                ]);
            }
            
            // 4. إنشاء inventory index
            if (!DB::table('product_inventory_indices')->where('product_id', $product->id)->exists()) {
                $qty = DB::table('product_inventories')->where('product_id', $product->id)->sum('qty');
                DB::table('product_inventory_indices')->insert([
                    'product_id' => $product->id,
                    'channel_id' => 1,
                    'qty' => $qty,
                ]);
            }
            
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("✅ تم إصلاح {$products->count()} منتج بنجاح");
        
        return 0;
    }
}
