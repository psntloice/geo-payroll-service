<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['external_id', 'name', 'job_title', 'department_id', 'salary'];

    // Define relationships
    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'employeeID');
    }

    public function earnings()
    {
        return $this->hasMany(Earning::class, 'employeeID');
    }

    public function deductions()
    {
        return $this->hasMany(Deduction::class, 'employeeID');
    }

    // public function taxes()
    // {
    //     return $this->hasMany(Tax::class, 'employeeID');
    // }
}
