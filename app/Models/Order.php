<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\shippingAddress;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name','billing_address_id', 'shipping_address_id'];

    public function billing_address()
    {
        return $this->belongsTo(BillingAddress::class);
    }

    public function shipping_address()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function kits()
    {
        return $this->belongsToMany(Kit::class, 'kit_order', 'order_id', 'kit_id');
    }

}
