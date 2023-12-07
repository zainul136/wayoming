<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentRenewal extends Model
{
    use HasFactory;

    protected $fillable = [
        'cash',
        'tradeNotesInput',
        'allowanceInput',
        'accountsReceivable',
        'governmentObligations',
        'securities',
        'currentAssets',
        'loans',
        'mortgage',
        'otherInvestments',
        'buildings',
        'depietableAssets',
        'land',
        'intangibleAssets',
        'accumulatedAmortization',
        'intangibleAmortization',
        'otherAssets',
        'totalAssetsValue',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
