<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Vendor;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        $vendor = Vendor::where('customer_id', $customer->id)->first();
        
        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found'], 404);
        }

        $notifications = $this->getVendorNotifications($vendor);
        
        return response()->json([
            'notifications' => $notifications,
            'unread_count' => collect($notifications)->where('read', false)->count()
        ]);
    }

    public function markAsRead(Request $request)
    {
        $customer = Auth::guard('customer')->user();
        $vendor = Vendor::where('customer_id', $customer->id)->first();
        
        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found'], 404);
        }

        $notificationId = $request->input('notification_id');
        
        // In a real implementation, you would update the notification status in database
        // For now, we'll just return success
        
        return response()->json(['success' => true]);
    }

    public function markAllAsRead()
    {
        $customer = Auth::guard('customer')->user();
        $vendor = Vendor::where('customer_id', $customer->id)->first();
        
        if (!$vendor) {
            return response()->json(['error' => 'Vendor not found'], 404);
        }

        // In a real implementation, you would update all notifications for this vendor
        
        return response()->json(['success' => true]);
    }

    private function getVendorNotifications($vendor)
    {
        $notifications = [];

        // New Orders Notification
        $pendingOrders = DB::table('vendor_orders')
            ->where('vendor_id', $vendor->id)
            ->where('status', 'pending')
            ->count();

        if ($pendingOrders > 0) {
            $notifications[] = [
                'id' => 'new_orders',
                'type' => 'new_orders',
                'title' => 'طلبات جديدة',
                'message' => "لديك {$pendingOrders} طلب جديد في انتظار المعالجة",
                'icon' => 'fas fa-shopping-cart',
                'color' => 'success',
                'count' => $pendingOrders,
                'created_at' => Carbon::now()->subMinutes(5),
                'read' => false,
                'action_url' => route('vendor.orders.index', ['status' => 'pending'])
            ];
        }

        // Product Approval Notifications
        $approvedProducts = DB::table('products')
            ->where('vendor_id', $vendor->id)
            ->where('status', 1)
            ->whereDate('updated_at', Carbon::today())
            ->count();

        if ($approvedProducts > 0) {
            $notifications[] = [
                'id' => 'product_approval',
                'type' => 'product_approval',
                'title' => 'موافقة على المنتجات',
                'message' => "تم الموافقة على {$approvedProducts} منتج من قبل الإدارة",
                'icon' => 'fas fa-check-circle',
                'color' => 'warning',
                'count' => $approvedProducts,
                'created_at' => Carbon::now()->subHour(),
                'read' => false,
                'action_url' => route('vendor.products.index', ['status' => 'approved'])
            ];
        }

        // Low Stock Alerts
        $lowStockCount = 0;
        try {
            if (DB::getSchemaBuilder()->hasTable('product_inventories')) {
                $productIds = DB::table('products')->where('vendor_id', $vendor->id)->pluck('id');
                $lowStockCount = DB::table('product_inventories')
                    ->whereIn('product_id', $productIds)
                    ->whereBetween('qty', [1, 5])
                    ->count();
            }
        } catch (\Exception $e) {
            // Handle gracefully if inventory table doesn't exist
        }

        if ($lowStockCount > 0) {
            $notifications[] = [
                'id' => 'low_stock',
                'type' => 'low_stock',
                'title' => 'تنبيه مخزون منخفض',
                'message' => "{$lowStockCount} منتج لديه مخزون منخفض",
                'icon' => 'fas fa-exclamation-triangle',
                'color' => 'danger',
                'count' => $lowStockCount,
                'created_at' => Carbon::now()->subDays(2),
                'read' => false,
                'action_url' => route('vendor.products.index', ['stock' => 'low'])
            ];
        }

        // Withdrawal Status Updates
        $recentWithdrawals = DB::table('vendor_payouts')
            ->where('vendor_id', $vendor->id)
            ->where('status', 'completed')
            ->whereDate('updated_at', Carbon::today())
            ->count();

        if ($recentWithdrawals > 0) {
            $notifications[] = [
                'id' => 'withdrawal_status',
                'type' => 'withdrawal_status',
                'title' => 'حالة طلب السحب',
                'message' => 'تم معالجة طلب السحب بنجاح',
                'icon' => 'fas fa-money-bill-wave',
                'color' => 'info',
                'count' => $recentWithdrawals,
                'created_at' => Carbon::now()->subDay(),
                'read' => false,
                'action_url' => route('vendor.wallet.transactions')
            ];
        }

        // System Notifications (could be from admin)
        $systemNotifications = [
            [
                'id' => 'system_update',
                'type' => 'system',
                'title' => 'تحديث النظام',
                'message' => 'تم تحديث النظام بميزات جديدة',
                'icon' => 'fas fa-info-circle',
                'color' => 'primary',
                'count' => null,
                'created_at' => Carbon::now()->subDays(3),
                'read' => true,
                'action_url' => null
            ]
        ];

        return array_merge($notifications, $systemNotifications);
    }

    public function getUnreadCount()
    {
        $customer = Auth::guard('customer')->user();
        $vendor = Vendor::where('customer_id', $customer->id)->first();
        
        if (!$vendor) {
            return response()->json(['count' => 0]);
        }

        $notifications = $this->getVendorNotifications($vendor);
        $unreadCount = collect($notifications)->where('read', false)->count();
        
        return response()->json(['count' => $unreadCount]);
    }
}