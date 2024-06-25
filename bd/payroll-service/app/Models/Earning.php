<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;
    protected $primaryKey = 'earningID';
    // protected $fillable = ['employeeID', 'payPeriodID', 'earningType', 'amount'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employeeID');
    }

    public function payPeriod()
    {
        return $this->belongsTo(PayPeriod::class, 'payPeriodID');
    }
   
}
