<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ProductApprovalService;
use Webkul\Product\Repositories\ProductRepository;

class ApproveAllPendingProducts extends Command
{
    protected $signature = 'products:approve-all {--dry-run : Show what would be approved without actually approving}';
    protected $description = 'Approve all pending vendor products and make them visible';

    public function __construct(
        protected ProductApprovalService $approvalService,
        protected ProductRepository $productRepository
    ) {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('🔍 البحث عن المنتجات بانتظار الموافقة...');

        $pendingProducts = $this->productRepository
            ->where('approved_by_admin', false)
            ->whereNotNull('vendor_id')
            ->get();

        if ($pendingProducts->isEmpty()) {
            $this->info('✅ لا توجد منتجات بانتظار الموافقة');
            return 0;
        }

        $this->info("📦 تم العثور على {$pendingProducts->count()} منتج");

        if ($this->option('dry-run')) {
            $this->warn('⚠️  وضع التجربة - لن يتم الموافقة فعليًا');
            $this->table(['ID', 'SKU', 'Vendor ID'], $pendingProducts->map(fn($p) => [
                $p->id, $p->sku, $p->vendor_id
            ])->toArray());
            return 0;
        }

        $bar = $this->output->createProgressBar($pendingProducts->count());
        $bar->start();

        $approved = 0;
        $failed = 0;

        foreach ($pendingProducts as $product) {
            try {
                $this->approvalService->approveProduct($product->id);
                $approved++;
            } catch (\Exception $e) {
                $this->error("\n❌ فشل المنتج #{$product->id}: {$e->getMessage()}");
                $failed++;
            }
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("✅ تمت الموافقة على {$approved} منتج");
        
        if ($failed > 0) {
            $this->error("❌ فشل {$failed} منتج");
        }

        $this->info('🎉 تم! جميع المنتجات الآن مرئية في الموقع');
        
        return 0;
    }
}
