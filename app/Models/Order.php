<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_business',
        'order_type',
        'company_name',
        'first_name',
        'last_name',
        'email',
        'country',
        'phone_number',
        'physical_address',
        'company_mailing_address',
        'mailing_address',
        'zip_postal_code',
        'city',
        'state_province',
        'attorney_first_name',
        'attorney_last_name',
        'attorney_mailing_address',
    ];

    public function items()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id', 'id');
    }
    public function managements()
    {
        return $this->hasMany(OrderManagement::class, 'order_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function sharetypes()
    {
        return $this->hasMany(ShareType::class, 'order_id', 'id');
    }

    public function compmanagment()
    {
        return $this->hasMany(CompanyManagement::class, 'order_id', 'id');
    }

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function agentrenewal()
    {
        return $this->hasOne(AgentRenewal::class);
    }

    public function orderupdate()
    {
        return $this->hasMany(OrderUpdateRequest::class, 'order_update_id', 'id');
    }

    public function shareupdate()
    {
        return $this->hasMany(ShareTypeUpdateRequest::class, 'order_id', 'id');
    }

    public function managementupdate()
    {
        return $this->hasMany(OrderManagementUpdateRequest::class, 'order_id', 'id');
    }

    public function companymanagementupdate()
    {
        return $this->hasMany(CompanyManagementUpdateRequest::class, 'order_id', 'id');
    }

    public function renewalmany()
    {
        return $this->hasMany(AgentRenewal::class, 'order_id', 'id');
    }

    public function renewalupdate()
    {
        return $this->hasMany(AgentRenewalUpdateRequest::class, 'order_id', 'id');
    }

//    updated by zain
    public function approvalRejects()
    {
        return $this->hasMany(ApprovalReject::class, 'order_id', 'id');
    }

    public function omcheckbox()
    {
        return $this->hasOne(OrderManagement::class);
    }

}
