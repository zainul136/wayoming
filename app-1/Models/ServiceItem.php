<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'price', 'description'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function ordersitems()
    {
        return $this->hasMany(OrderItem::class, 'service_item_id', 'id');
    }
}
