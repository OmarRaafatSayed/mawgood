<?php

namespace App\Models;

use Webkul\Product\Models\Product as BaseProduct;
use Webkul\BookingProduct\Models\BookingProduct;

class Product extends BaseProduct
{
    /**
     * Get the booking product associated with this product.
     */
    public function bookingProduct()
    {
        return $this->hasOne(BookingProduct::class, 'product_id');
    }

    /**
     * Check if this is a booking product
     */
    public function isBookingProduct()
    {
        return $this->type === 'booking' || $this->bookingProduct()->exists();
    }

    /**
     * Get product price with booking fallback
     */
    public function getPriceAttribute()
    {
        // Try to get price from booking product first
        if ($this->bookingProduct && $this->bookingProduct->price) {
            return $this->bookingProduct->price;
        }

        // Fallback to parent method
        return parent::getPriceAttribute();
    }

    /**
     * Get product name with booking fallback
     */
    public function getNameAttribute()
    {
        // Try to get name from attributes first
        $name = $this->attribute_values->where('attribute.code', 'name')->first();
        if ($name && $name->text_value) {
            return $name->text_value;
        }

        // Fallback to booking product name or default
        if ($this->bookingProduct) {
            return 'Booking Product ' . $this->id;
        }

        return 'Product ' . $this->id;
    }

    /**
     * Override status check to include booking products
     */
    public function getStatusAttribute()
    {
        // Check if we have a status attribute value
        $status = $this->attribute_values->where('attribute.code', 'status')->first();
        if ($status) {
            return $status->boolean_value;
        }

        // Default to active for booking products
        if ($this->isBookingProduct()) {
            return true;
        }

        return $this->attributes['status'] ?? true;
    }

    /**
     * Ensure product has inventory
     */
    public function hasInventory()
    {
        $inventory = $this->inventories->sum('qty');
        return $inventory > 0 || $this->isBookingProduct();
    }
}