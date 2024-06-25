<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;
    protected $primaryKey = 'deductionID';
    // protected $fillable = ['employeeID', 'payPeriodID', 'deductionType', 'amount', 'taxID'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employeeID');
    }

    public function payPeriod()
    {
        return $this->belongsTo(PayPeriod::class, 'payPeriodID');
    }

    // public function tax()
    // {
    //     return $this->belongsTo(Tax::class, 'taxID');
    // }
}
