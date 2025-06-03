<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'time_of_order', 
        'status', 
        'customer_id'];



            
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalPriceAttribute()
{
    return $this->items->sum(function ($item) {
        return $item->quantity * $item->product->price;
    });
}
}

