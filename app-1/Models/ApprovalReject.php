<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalReject extends Model
{
    use HasFactory;

    public function ordersupdate()
    {
        return $this->belongsTo(OrderUpdateRequest::class, 'order_update_id', 'order_id');
    }

    public function ordersupdatedetail()
    {
        return $this->hasOne(OrderUpdateRequest::class, 'order_update_id', 'order_id');
    }

}
