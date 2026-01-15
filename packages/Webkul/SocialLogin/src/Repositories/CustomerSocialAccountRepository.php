<?php

namespace Webkul\SocialLogin\Repositories;

use Illuminate\Container\Container;
use Webkul\Core\Eloquent\Repository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\Customer\Repositories\CustomerRepository;

class CustomerSocialAccountRepository extends Repository
{
    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected CustomerGroupRepository $customerGroupRepository,
        Container $container
    ) {
        parent::__construct($container);
    }

    /**
     * Specify Model class name.
     */
    public function model(): string
    {
        return 'Webkul\SocialLogin\Contracts\CustomerSocialAccount';
    }

    /**
     * @param  \Laravel\Socialite\Contracts\User  $providerUser
     * @param  string  $provider
     * @return \Webkul\Customer\Models\Customer|null
     */
    public function findOrCreateCustomer(\Laravel\Socialite\Contracts\User $providerUser, string $provider): ?\Webkul\Customer\Models\Customer
    {
        // Defensive extraction: provider user can be an object (Socialite User) or an array-like structure
        $providerId = is_object($providerUser) && method_exists($providerUser, 'getId') ? $providerUser->getId() : data_get($providerUser, 'id');
        $email = is_object($providerUser) && method_exists($providerUser, 'getEmail') ? $providerUser->getEmail() : data_get($providerUser, 'email');
        $name = is_object($providerUser) && method_exists($providerUser, 'getName') ? $providerUser->getName() : data_get($providerUser, 'name');

        $account = $this->findOneWhere([
            'provider_name' => $provider,
            'provider_id'   => $providerId,
        ]);

        if ($account) {
            return $account->customer;
        } else {
            $customer = $email ? $this->customerRepository->findOneByField('email', $email) : null;

            if (! $customer) {
                $names = $this->getFirstLastName($name);

                $customer = $this->customerRepository->create([
                    'email'             => $email,
                    'first_name'        => $names['first_name'],
                    'last_name'         => $names['last_name'],
                    'status'            => 1,
                    'is_verified'       => ! core()->getConfigData('customer.settings.email.verification'),
                    'customer_group_id' => $this->customerGroupRepository->findOneWhere(['code' => 'general'])->id,
                ]);

                // Mark that a social signup occurred so the app can prompt for additional data
                session(['social_signup' => true]);
            }

            $this->create([
                'customer_id'   => $customer->id,
                'provider_id'   => $providerId,
                'provider_name' => $provider,
            ]);

            return $customer;
        }
    }

    /**
     * Returns first and last name from name
     *
     * @param  string  $name
     * @return array{first_name:string,last_name:string}
     */
    public function getFirstLastName(string $name): array
    {
        $name = trim($name);

        $lastName = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);

        $firstName = trim(preg_replace('#'.$lastName.'#', '', $name));

        return [
            'first_name' => $firstName,
            'last_name'  => $lastName,
        ];
    }
}
