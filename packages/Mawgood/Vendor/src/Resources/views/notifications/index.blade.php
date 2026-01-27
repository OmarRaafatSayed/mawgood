@extends('mawgood-vendor::layouts.app')

@section('title', 'الإشعارات')
@section('page-title', 'الإشعارات')
@section('page-icon', '<i class="fas fa-bell me-2"></i>')

@section('header-actions')
<div class="d-flex gap-2">
    <form method="POST" action="{{ route('vendor.notifications.delete_all') }}" onsubmit="return confirm('هل تريد حذف جميع الإشعارات؟')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">
            <i class="fas fa-trash me-2"></i>حذف الكل
        </button>
    </form>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">جميع الإشعارات</h5>
            </div>
            <div class="card-body p-0">
                @forelse($notifications as $notification)
                <div class="notification-item {{ $notification->read_at ? '' : 'unread' }} border-bottom p-3">
                    <div class="d-flex align-items-start">
                        <div class="notification-icon me-3">
                            @php
                                $iconClass = match($notification->type) {
                                    'order' => 'fa-shopping-cart text-primary',
                                    'wallet' => 'fa-wallet text-success',
                                    'product' => 'fa-box text-info',
                                    'system' => 'fa-cog text-warning',
                                    default => 'fa-bell text-secondary'
                                };
                            @endphp
                            <i class="fas {{ $iconClass }} fa-2x"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">{{ $notification->title }}</h6>
                            <p class="text-muted mb-2">{{ $notification->message }}</p>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                            </small>
                        </div>
                        @if(!$notification->read_at)
                        <span class="badge bg-primary">جديد</span>
                        @endif
                    </div>
                </div>
                @empty
                <div class="text-center py-5">
                    <i class="fas fa-bell-slash fa-3x text-muted mb-3"></i>
                    <p class="text-muted">لا توجد إشعارات</p>
                </div>
                @endforelse
            </div>
            @if($notifications->hasPages())
            <div class="card-footer">
                {{ $notifications->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.notification-item.unread {
    background-color: #f8f9fa;
}
.notification-item:hover {
    background-color: #f1f3f5;
}
.notification-icon {
    width: 50px;
    text-align: center;
}
</style>
@endpush
