<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    

    protected $fillable = [
        'name',           // Guest user's name
        'phone',          // Guest user's phone number
        'address',        // Delivery or billing address
        'items_purchased', // Details of purchased items (JSON format)
        'amount',          // Total payment amount
        'payment_method',  // Payment method (e.g., Credit Card, PayPal)
        'status',          // Payment status (e.g., pending, completed, failed)
        'order_type',        // Save order type (Pickup or Delivery)
        'order_date',        // Save order date (null for Delivery)
        'order_time',        // Save order time (null for Delivery)
        'order_postcode',    // Save postcode (null for Pickup)
        'user_id'
    ];
}
