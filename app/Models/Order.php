<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total',
        'delivery_fees',
        'total_price',
        'payment_method',
        'location',
        'location_details',
        'user_id',
        'card_number' ,
        'expiry_date',
        'cvv',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function cart() 
    {
        return $this->belongsTo(Cart::class);
    }

}
