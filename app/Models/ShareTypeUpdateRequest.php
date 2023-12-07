<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareTypeUpdateRequest extends Model
{
    use HasFactory;

    protected $casts = [
        'number_share' => 'json',
        'value_share' => 'json',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
