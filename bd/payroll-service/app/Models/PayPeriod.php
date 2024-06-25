<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayPeriod extends Model
{
    use HasFactory;

    // protected $fillable = ['payPeriodStart', 'payPeriodEnd', 'paydate'];
    protected $primaryKey = 'payPeriodID'; // Specify the custom primary key name

    protected $fillable = [
        'payPeriodStart',
        'payPeriodEnd',
        'paydate',
    ];

    // If you need timestamps, keep this line
    public $timestamps = true;
    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'pay_period_id');
    }
}
