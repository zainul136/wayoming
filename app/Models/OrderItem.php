<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'service_item_id',
        'amount',
        'description',
    ];

    public function serviceitems()
    {
        return $this->belongsTo(ServiceItem::class, 'service_item_id', 'id');
    }
}
