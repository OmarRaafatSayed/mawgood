<?php

namespace Webkul\Shop\Http\Controllers\Customer\Account;

use Webkul\Shop\Http\Controllers\Controller;
use Webkul\Customer\Repositories\WishlistRepository;

class WishlistController extends Controller
{
    public function __construct(protected WishlistRepository $wishlistRepository) {}

    /**
     * Displays the listing resources if the customer having items in wishlist.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (! core()->getConfigData('customer.settings.wishlist.wishlist_option')) {
            abort(404);
        }

        $items = $this->wishlistRepository->findWhere([
            'customer_id' => auth()->guard('customer')->id(),
            'channel_id' => core()->getCurrentChannel()->id,
        ]);

        return view('shop::customers.account.wishlist.index', compact('items'));
    }
}
