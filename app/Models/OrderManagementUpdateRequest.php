<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderManagementUpdateRequest extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'address_selector', 'address'];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
