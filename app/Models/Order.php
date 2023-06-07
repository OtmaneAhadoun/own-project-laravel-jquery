<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function getTotalAttribute($value)
    {   
        $total=0;
        foreach($this->order_items as $orderItem){
            $subTotal=(int)$orderItem->product->price*$orderItem->quantity;
            $total+=$subTotal;
        }
        $shippingCities = ['rabat', 'sale', 'temara'];
        $deliveryCity = strtolower($this->delivery->city);
        if (in_array($deliveryCity, array_map('strtolower', $shippingCities))) {
            $total += 25;
        } else {
            $total += 60;
        }
        
        return $total . "DH";
    }
    public function order_items()
    {
        return $this->hasMany(Order_item::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
