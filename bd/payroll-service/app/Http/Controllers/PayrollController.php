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
            'payPeriodID' => 'required|integer|exists:pay_periods,payPeriodID',
            'employeeID' => 'required|integer|exists:employeeID',       
                 'amount' => 'required|numeric',
            'totalEarnings' => 'required|numeric',
            'totalDeductions' => 'required|numeric',
            'netpay' => 'required|numeric',

        ]);

        return "hey";
    }

    public function show($id)
    {
        $payroll = Payroll::where('id', $id)->first();
        if (!$payroll) {
            return response()->json(['message' => 'not found'], 404);
        }
        return $payroll;
        // return $payroll->load('employee');
    }
    public function showPayrollSpecificEmployee(Payroll $payroll)
    {
        // $earning = Earning::where('id', $id)->first();
        // if ($earning) {
        //     return response()->json(['message' => 'not found'], 404);
        // }
        // return $earning;
        // return $payroll->load('employee');
    }
    // public function update(Request $request, Payroll $payroll)


    public function update(Request $request, $id)
    {
       
        $payroll = Payroll::where('id', $id)->first();
        if (!$payroll) {
            return response()->json(['message' => 'not found'], 404);
        }
        $validated = $request->validate([
            'payPeriodID' => 'required|integer|exists:payPeriodID',
            'employeeID' => 'required|integer|exists:employeeID',            'amount' => 'required|numeric',
            'totalEarnings' => 'required|numeric',
            'totalDeductions' => 'required|numeric',
            'netpay' => 'required|numeric',
        ]);

        $payroll->update($validated);

        return $payroll;
    }
    // public function destroy(Payroll $payroll)

    public function destroy(Payroll $id)
    {
        $payroll = Payroll::where('id', $id)->first();
        if (!$payroll) {
            return response()->json(['message' => 'not found'], 404);
        }
        $payroll->delete();

        return response()->noContent();
    }
}
