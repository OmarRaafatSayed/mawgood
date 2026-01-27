<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class VendorApprovedNotification extends Notification
{
    use Queueable;

    protected $vendor;

    public function __construct($vendor)
    {
        $this->vendor = $vendor;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        $url = route('vendor.dashboard');

        return (new MailMessage)
                    ->subject(__('Your store has been approved'))
                    ->greeting(__('Congratulations!'))
                    ->line(__('Your store :store has been approved and is now ready. You can now add products and manage orders from your merchant control panel.', ['store' => $this->vendor->store_name]))
                    ->action(__('Go to your store dashboard'), $url)
                    ->line(__('If you have any questions, contact support.'));
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => __('Store Approved'),
            'message' => __('Your store :store is approved and ready. You can now add products and manage your merchant control panel.', ['store' => $this->vendor->store_name]),
            'vendor_id' => $this->vendor->id,
            'action_url' => route('vendor.dashboard')
        ];
    }
}
