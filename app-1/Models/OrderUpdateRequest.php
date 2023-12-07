<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderUpdateRequest extends Model
{
    use HasFactory;

    public function notapproved()
    {
        return $this->hasOne(ApprovalReject::class, 'order_id', 'order_update_id');
    }
}
