<?php

namespace Webkul\Admin\Mail\Order;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Webkul\Admin\Mail\Mailable;
use Webkul\Sales\Contracts\Order;

class CreatedNotification extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Order $order) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $adminDetails = core()->getAdminEmailDetails();
        
        return new Envelope(
            to: [
                new Address(
                    $adminDetails['email'] ?? config('mail.from.address', 'noreply@mawgood.com'),
                    $adminDetails['name'] ?? config('mail.from.name', 'Mawgood')
                ),
            ],
            subject: trans('admin::app.emails.orders.created.subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin::emails.orders.created',
        );
    }
}
