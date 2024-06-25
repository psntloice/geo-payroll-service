<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        // return Payroll::with('employee')->get();
       return Payroll::all();

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric',
            'pay_date' => 'required|date',
        ]);

        return Payroll::create($validated);
    }

    public function show(Payroll $payroll)
    {
        return $payroll->load('employee');
    }

    public function update(Request $request, Payroll $payroll)
    {
        $validated = $request->validate([
            'employee_id' => 'sometimes|exists:employees,id',
            'amount' => 'sometimes|numeric',
            'pay_date' => 'sometimes|date',
        ]);

        $payroll->update($validated);

        return $payroll;
    }

    public function destroy(Payroll $payroll)
    {
        $payroll->delete();

        return response()->noContent();
    }
}
