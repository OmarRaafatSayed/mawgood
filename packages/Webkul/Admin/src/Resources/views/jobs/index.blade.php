<x-admin::layouts>
    <x-slot:title>
        الوظائف
    </x-slot>

    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>الوظائف</h1>
            </div>
        </div>

        <div class="page-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>العنوان</th>
                            <th>الشركة</th>
                            <th>الفئة</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->company_name }}</td>
                            <td>{{ $job->category->name ?? 'غير محدد' }}</td>
                            <td>
                                <span class="badge {{ $job->is_active ? 'badge-success' : 'badge-danger' }}">
                                    {{ $job->is_active ? 'نشط' : 'غير نشط' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin::layouts>