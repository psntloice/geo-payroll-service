<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'tax_type', 'tax_rate', 'tax_amount'];

    // public function employee()
    // {
    //     return $this->belongsTo(Employee::class, 'employee_id', 'external_employee_id');
    // }
    
}
