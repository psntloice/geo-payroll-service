<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deduction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'deductionID';
    // protected $fillable = ['employeeID', 'payPeriodID', 'deductionType', 'amount', 'taxID'];

    protected $fillable = [
        'payPeriodID',
        'employeeID',
        'deductionType',
        'amount',
    ];
    public function payPeriod()
    {
        return $this->belongsTo(PayPeriod::class, 'payPeriodID');
    }

    // public function tax()
    // {
    //     return $this->belongsTo(Tax::class, 'taxID');
    // }
}
