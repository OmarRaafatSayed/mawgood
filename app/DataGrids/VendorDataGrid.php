<?php

namespace App\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class VendorDataGrid extends DataGrid
{
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('vendors')
            ->select(
                'vendors.id',
                'vendors.name',
                'vendors.email',
                'vendors.phone',
                'vendors.shop_name',
                'vendors.status',
                'vendors.commission_rate',
                'vendors.available_balance',
                'vendors.unavailable_balance',
                'vendors.created_at'
            );

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
            'index'      => 'name',
            'label'      => 'اسم التاجر',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'shop_name',
            'label'      => 'اسم المتجر',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
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
            'index'      => 'status',
            'label'      => 'الحالة',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                $statusLabels = [
                    'pending' => 'في الانتظار',
                    'approved' => 'موافق عليه',
                    'rejected' => 'مرفوض',
                    'suspended' => 'معلق'
                ];
                return $statusLabels[$row->status] ?? $row->status;
            },
        ]);

        $this->addColumn([
            'index'      => 'commission_rate',
            'label'      => 'نسبة العمولة %',
            'type'       => 'string',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => false,
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => 'تاريخ التسجيل',
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
                return route('admin.vendors.show', $row->id);
            },
        ]);

        $this->addAction([
            'index'  => 'edit',
            'icon'   => 'icon-edit',
            'title'  => 'تعديل',
            'method' => 'GET',
            'url'    => function ($row) {
                return route('admin.vendors.edit', $row->id);
            },
        ]);

        $this->addAction([
            'index'  => 'delete',
            'icon'   => 'icon-delete',
            'title'  => 'حذف',
            'method' => 'DELETE',
            'url'    => function ($row) {
                return route('admin.vendors.destroy', $row->id);
            },
        ]);
    }

    public function prepareMassActions()
    {
        $this->addMassAction([
            'icon'   => 'icon-delete',
            'title'  => 'حذف',
            'method' => 'POST',
            'url'    => route('admin.vendors.mass_delete'),
        ]);
    }
}