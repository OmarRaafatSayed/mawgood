<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Webkul\Customer\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Auth;

class SocialLoginController extends Controller
{
    public function __construct(
        protected CustomerRepository $customerRepository
    ) {}

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            
            $customer = $this->customerRepository->findOneWhere(['email' => $socialUser->getEmail()]);
            
            if (!$customer) {
                $customer = $this->customerRepository->create([
                    'first_name' => $socialUser->getName() ?? explode('@', $socialUser->getEmail())[0],
                    'last_name' => '',
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt(str()->random(16)),
                    'is_verified' => 1,
                    'channel_id' => core()->getCurrentChannel()->id,
                    'customer_group_id' => core()->getConfigData('customer.settings.default_group') ?? 1,
                ]);
            }
            
            Auth::guard('customer')->login($customer);
            
            return redirect()->route('shop.home.index')->with('success', 'تم تسجيل الدخول بنجاح');
            
        } catch (\Exception $e) {
            return redirect()->route('shop.customer.session.index')
                ->with('error', 'فشل تسجيل الدخول. حاول مرة أخرى.');
        }
    }
}
