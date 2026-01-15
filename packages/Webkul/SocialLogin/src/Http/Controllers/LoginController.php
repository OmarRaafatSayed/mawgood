<?php

namespace Webkul\SocialLogin\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Event;
use Laravel\Socialite\Facades\Socialite;
use Webkul\SocialLogin\Repositories\CustomerSocialAccountRepository;

class LoginController extends Controller
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected CustomerSocialAccountRepository $customerSocialAccountRepository) {}

    /**
     * Redirects to the social provider
     *
     * @param  string  $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        try {
            return Socialite::driver($provider)->redirect();
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());

            return redirect()->route('shop.customer.session.index');
        }
    }

    /**
     * Handles callback
     *
     * @param  string  $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        try {
            /** @var \Laravel\Socialite\Contracts\User $user */
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('shop.customer.session.index');
        }

        /** @var \Webkul\Customer\Models\Customer|null $customer */
        $customer = $this->customerSocialAccountRepository->findOrCreateCustomer($user, $provider);

        if (! $customer instanceof \Illuminate\Contracts\Auth\Authenticatable) {
            session()->flash('error', 'Unable to authenticate with social provider');
            return redirect()->route('shop.customer.session.index');
        }

        auth()->guard('customer')->login($customer, true);

        Event::dispatch('customer.after.login', $customer);

        // If this was a fresh social signup, redirect to account type selection
        if (session('social_signup')) {
            session()->forget('social_signup');
            return redirect()->route('account-type.show');
        }

        return redirect()->intended(route('shop.customers.account.profile.index'));
    }
}
