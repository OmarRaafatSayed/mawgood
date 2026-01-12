<?php

namespace App\DataGrids\Vendor;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class OrderDataGrid extends DataGrid
{
    public function prepareQueryBuilder()
    {
        $vendor = $this->getCurrentVendor();
        
        $queryBuilder = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->where('products.vendor_id', $vendor->id)
            ->select(
                'orders.id',
                'orders.increment_id',
                'orders.status',
                'orders.created_at',
                'customers.first_name',
                'customers.last_name',
                'customers.email',
                DB::raw('SUM(order_items.total) as vendor_total'),
                DB::raw('SUM(order_items.qty_ordered) as total_items')
            )
            ->groupBy('orders.id', 'orders.increment_id', 'orders.status', 'orders.created_at', 'customers.first_name', 'customers.last_name', 'customers.email');

        return $queryBuilder;
    }

    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'increment_id',
            'label'      => 'رقم الطلب',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'customer_name',
            'label'      => 'اسم العميل',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => false,
            'filterable' => false,
            'closure'    => function ($row) {
                return $row->first_name . ' ' . $row->last_name;
            },
        ]);

        $this->addColumn([
            'index'      => 'email',
            'label'      => 'البريد الإلكتروني',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'total_items',
            'label'      => 'عدد المنتجات',
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => false,
        ]);

        $this->addColumn([
            'index'      => 'vendor_total',
            'label'      => 'إجمالي المبلغ',
            'type'       => 'price',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => 'الحالة',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                $statusLabels = [
                    'pending' => 'في الانتظار',
                    'processing' => 'قيد المعالجة',
                    'shipped' => 'تم الشحن',
                    'delivered' => 'تم التسليم',
                    'completed' => 'مكتمل',
                    'cancelled' => 'ملغي',
                    'refunded' => 'مسترد'
                ];
                return $statusLabels[$row->status] ?? $row->status;
            },
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => 'تاريخ الطلب',
            'type'       => 'datetime',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);
    }

    public function prepareActions()
    {
        $this->addAction([
            'index'  => 'view',
            'icon'   => 'icon-view',
            'title'  => 'عرض',
            'method' => 'GET',
            'url'    => function ($row) {
                return route('vendor.orders.show', $row->id);
            },
        ]);

        $this->addAction([
            'index'  => 'invoice',
            'icon'   => 'icon-invoice',
            'title'  => 'فاتورة',
            'method' => 'GET',
            'url'    => function ($row) {
                return route('vendor.orders.invoice', $row->id);
            },
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