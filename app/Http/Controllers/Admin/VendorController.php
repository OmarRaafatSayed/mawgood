<?php

namespace App\Http\Controllers\Admin;

use Webkul\Admin\Http\Controllers\Controller;
use App\Repositories\VendorRepository;
use App\DataGrids\VendorDataGrid;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    protected $vendorRepository;

    public function __construct(VendorRepository $vendorRepository)
    {
        $this->vendorRepository = $vendorRepository;
    }

    public function index()
    {
        if (request()->ajax()) {
            return datagrid(VendorDataGrid::class)->process();
        }

        return view('admin::vendors.index');
    }

    public function show($id)
    {
        $vendor = $this->vendorRepository->findOrFail($id);
        return view('admin::vendors.show', compact('vendor'));
    }

    public function create()
    {
        return view('admin::vendors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|in:pending,approved,rejected,suspended'
        ]);

        $this->vendorRepository->create($request->all());
        session()->flash('success', 'تم إنشاء التاجر بنجاح');
        return redirect()->route('admin.vendors.index');
    }

    public function edit($id)
    {
        $vendor = $this->vendorRepository->findOrFail($id);
        return view('admin::vendors.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'status' => 'required|in:pending,approved,rejected,suspended'
        ]);

        $this->vendorRepository->update($request->all(), $id);
        session()->flash('success', 'تم تحديث التاجر بنجاح');
        return redirect()->route('admin.vendors.index');
    }

    public function destroy($id)
    {
        $this->vendorRepository->delete($id);
        session()->flash('success', 'تم حذف التاجر بنجاح');
        return redirect()->route('admin.vendors.index');
    }
}