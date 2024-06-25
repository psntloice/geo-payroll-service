<?php

namespace App\Http\Controllers;

use App\Models\PayPeriod;
use Illuminate\Http\Request;

class PayPeriodController extends Controller
{
    public function index()
    {
        return PayPeriod::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'payroll_record_id' => 'required|integer|exists:payroll_records,id',
            'payPeriodStart' => 'required|date',
            'payPeriodEnd' => 'required|date',
        ]);

        return PayPeriod::create($validated);
    }

    public function show($id)
    {
        return PayPeriod::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $payPeriod = PayPeriod::findOrFail($id);

        $validated = $request->validate([
            // 'payroll_record_id' => 'sometimes|integer|exists:payroll_records,id',
            'payPeriodStart' => 'sometimes|date',
            'payPeriodEnd' => 'sometimes|date',
        ]);

        $payPeriod->update($validated);

        return $payPeriod;
    }

    public function destroy($id)
    {
        $payPeriod = PayPeriod::findOrFail($id);
        $payPeriod->delete();

        return response()->noContent();
    }
}
