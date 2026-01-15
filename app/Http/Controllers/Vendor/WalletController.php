<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Vendor;
use App\Models\VendorPayout;
use Carbon\Carbon;

class WalletController extends Controller
{
    /**
     * Display vendor wallet
     */
    public function index()
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (!$vendor) {
                return redirect()->route('shop.home.index')->with('error', 'غير مصرح لك بالوصول لهذه الصفحة');
            }

            // Calculate wallet statistics (vendor earnings are vendor_amount = sales - commission)
            $totalEarnings = DB::table('vendor_orders')
                ->where('vendor_id', $vendor->id)
                ->where('status', 'completed')
                ->sum('vendor_amount');

            $totalPayouts = DB::table('vendor_payouts')
                ->where('vendor_id', $vendor->id)
                ->where('status', 'completed')
                ->sum('amount');

            $pendingPayouts = DB::table('vendor_payouts')
                ->where('vendor_id', $vendor->id)
                ->where('status', 'pending')
                ->sum('amount');

            $availableBalance = $totalEarnings - $totalPayouts - $pendingPayouts;

            // Recent transactions
            $recentTransactions = DB::table('vendor_payouts')
                ->where('vendor_id', $vendor->id)
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();

            $walletStats = [
                'total_earnings' => (float) $totalEarnings,
                'total_payouts' => (float) $totalPayouts,
                'pending_payouts' => (float) $pendingPayouts,
                'available_balance' => (float) $availableBalance,
                'currency' => core()->getCurrentCurrencyCode()
            ];

            return view('vendor.wallet.index', compact('walletStats', 'recentTransactions', 'vendor'));

        } catch (\Exception $e) {
            \Log::error('Vendor Wallet Error: ' . $e->getMessage());
            return view('vendor.wallet.index', [
                'walletStats' => [
                    'total_earnings' => 0,
                    'total_payouts' => 0,
                    'pending_payouts' => 0,
                    'available_balance' => 0,
                    'currency' => 'EGP'
                ],
                'recentTransactions' => collect(),
                'vendor' => null
            ]);
        }
    }

    /**
     * Request withdrawal
     */
    public function requestWithdrawal(Request $request)
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (!$vendor) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $request->validate([
                'amount' => 'required|numeric|min:1',
                'payment_method' => 'required|string',
                'payment_details' => 'required|string'
            ]);

            // Calculate available balance
            $totalEarnings = DB::table('vendor_orders')
                ->where('vendor_id', $vendor->id)
                ->where('status', 'completed')
                ->sum('vendor_amount');

            $totalPayouts = DB::table('vendor_payouts')
                ->where('vendor_id', $vendor->id)
                ->where('status', 'completed')
                ->sum('amount');

            $pendingPayouts = DB::table('vendor_payouts')
                ->where('vendor_id', $vendor->id)
                ->where('status', 'pending')
                ->sum('amount');

            $availableBalance = $totalEarnings - $totalPayouts - $pendingPayouts;

            if ($request->amount > $availableBalance) {
                return response()->json([
                    'error' => 'المبلغ المطلوب أكبر من الرصيد المتاح'
                ], 400);
            }

            // Create withdrawal request
            VendorPayout::create([
                'vendor_id' => $vendor->id,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method,
                'payment_details' => $request->payment_details,
                'status' => 'pending',
                'requested_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'تم إرسال طلب السحب بنجاح'
            ]);

        } catch (\Exception $e) {
            \Log::error('Withdrawal Request Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to process withdrawal'], 500);
        }
    }

    /**
     * Get transactions
     */
    public function transactions(Request $request)
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (!$vendor) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $query = DB::table('vendor_payouts')
                ->where('vendor_id', $vendor->id);

            // Apply filters
            if ($request->has('status') && $request->status !== '') {
                $query->where('status', $request->status);
            }

            if ($request->has('from_date') && $request->from_date) {
                $query->whereDate('created_at', '>=', $request->from_date);
            }

            if ($request->has('to_date') && $request->to_date) {
                $query->whereDate('created_at', '<=', $request->to_date);
            }

            $transactions = $query->orderBy('created_at', 'desc')->paginate(15);

            return response()->json($transactions);

        } catch (\Exception $e) {
            \Log::error('Transactions Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch transactions'], 500);
        }
    }

    /**
     * Get earnings chart data
     */
    public function earningsChart(Request $request)
    {
        try {
            $customer = Auth::guard('customer')->user();
            $vendor = Vendor::where('customer_id', $customer->id)->first();

            if (!$vendor) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $period = $request->get('period', 'monthly'); // daily, weekly, monthly, yearly

            $chartData = [];

            switch ($period) {
                case 'daily':
                    // Last 30 days
                    for ($i = 29; $i >= 0; $i--) {
                        $date = Carbon::now()->subDays($i);
                        $earnings = DB::table('vendor_orders')
                            ->where('vendor_id', $vendor->id)
                            ->where('status', 'completed')
                            ->whereDate('created_at', $date->toDateString())
                            ->sum('vendor_amount');
                        
                        $chartData[] = [
                            'date' => $date->format('M d'),
                            'earnings' => (float) $earnings
                        ];
                    }
                    break;

                case 'weekly':
                    // Last 12 weeks
                    for ($i = 11; $i >= 0; $i--) {
                        $startOfWeek = Carbon::now()->subWeeks($i)->startOfWeek();
                        $endOfWeek = Carbon::now()->subWeeks($i)->endOfWeek();
                        
                        $earnings = DB::table('vendor_orders')
                            ->where('vendor_id', $vendor->id)
                            ->where('status', 'completed')
                            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                            ->sum('vendor_amount');
                        
                        $chartData[] = [
                            'date' => $startOfWeek->format('M d') . ' - ' . $endOfWeek->format('M d'),
                            'earnings' => (float) $earnings
                        ];
                    }
                    break;

                case 'yearly':
                    // Last 5 years
                    for ($i = 4; $i >= 0; $i--) {
                        $year = Carbon::now()->subYears($i);
                        $earnings = DB::table('vendor_orders')
                            ->where('vendor_id', $vendor->id)
                            ->where('status', 'completed')
                            ->whereYear('created_at', $year->year)
                            ->sum('vendor_amount');
                        
                        $chartData[] = [
                            'date' => $year->format('Y'),
                            'earnings' => (float) $earnings
                        ];
                    }
                    break;

                default: // monthly
                    // Last 12 months
                    for ($i = 11; $i >= 0; $i--) {
                        $month = Carbon::now()->subMonths($i);
                        $earnings = DB::table('vendor_orders')
                            ->where('vendor_id', $vendor->id)
                            ->where('status', 'completed')
                            ->whereMonth('created_at', $month->month)
                            ->whereYear('created_at', $month->year)
                            ->sum('vendor_amount');
                        
                        $chartData[] = [
                            'date' => $month->format('M Y'),
                            'earnings' => (float) $earnings
                        ];
                    }
                    break;
            }

            return response()->json($chartData);

        } catch (\Exception $e) {
            \Log::error('Earnings Chart Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch chart data'], 500);
        }
    }
}