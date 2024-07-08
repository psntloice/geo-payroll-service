<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Earning extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'earningID';
    // protected $fillable = ['employeeID', 'payPeriodID', 'earningType', 'amount'];
    protected $fillable = [
        'payPeriodID',
        'employeeID',
        'earningType',
        'amount',
    ];
    public function payPeriod()
    {
        return $this->belongsTo(PayPeriod::class, 'payPeriodID');
    }
   
}
