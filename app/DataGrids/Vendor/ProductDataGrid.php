<?php

namespace App\DataGrids\Vendor;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class ProductDataGrid extends DataGrid
{
    public function prepareQueryBuilder()
    {
        $vendor = $this->getCurrentVendor();
        
        $queryBuilder = DB::table('products')
            ->leftJoin('product_flat', 'products.id', '=', 'product_flat.product_id')
            ->leftJoin('product_inventories', 'products.id', '=', 'product_inventories.product_id')
            ->where('products.vendor_id', $vendor->id)
            ->select(
                'products.id',
                'products.sku',
                'products.type',
                'product_flat.name',
                'product_flat.price',
                'product_flat.status',
                'products.created_at',
                DB::raw('SUM(product_inventories.qty) as total_qty')
            )
            ->groupBy('products.id', 'products.sku', 'products.type', 'product_flat.name', 'product_flat.price', 'product_flat.status', 'products.created_at');

        return $queryBuilder;
    }

    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => 'الرقم',
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'sku',
            'label'      => 'رمز المنتج',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => 'اسم المنتج',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'type',
            'label'      => 'النوع',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'price',
            'label'      => 'السعر',
            'type'       => 'price',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'total_qty',
            'label'      => 'الكمية',
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => false,
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => 'الحالة',
            'type'       => 'boolean',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                return $row->status ? 'نشط' : 'غير نشط';
            },
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => 'تاريخ الإنشاء',
            'type'       => 'datetime',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);
    }

    public function prepareActions()
    {
        $this->addAction([
            'index'  => 'edit',
            'icon'   => 'icon-edit',
            'title'  => 'تعديل',
            'method' => 'GET',
            'url'    => function ($row) {
                return route('vendor.products.edit', $row->id);
            },
        ]);

        $this->addAction([
            'index'  => 'delete',
            'icon'   => 'icon-delete',
            'title'  => 'حذف',
            'method' => 'DELETE',
            'url'    => function ($row) {
                return route('vendor.products.destroy', $row->id);
            },
        ]);
    }

    public function prepareMassActions()
    {
        $this->addMassAction([
            'icon'   => 'icon-delete',
            'title'  => 'حذف',
            'method' => 'POST',
            'url'    => route('vendor.products.mass_delete'),
        ]);
    }

    protected function getCurrentVendor()
    {
        $customer = auth()->guard('customer')->user();
        
        if (!$customer || $customer->user_type !== 'seller') {
            return null;
        }

        return app('App\Repositories\VendorRepository')->findWhere(['customer_id' => $customer->id])->first();
    }
}