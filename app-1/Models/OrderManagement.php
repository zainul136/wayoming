<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'type', 'first_name', 'last_name', 'np_corp_type', 'np_exempt_status', 'address_to_record_with_state', 'number_share', 'value_share'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
