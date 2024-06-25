<?php

namespace App\Http\Controllers;

use App\Models\Deduction;
use Illuminate\Http\Request;

class DeductionController extends Controller
{
    public function index()
    {
        return Deduction::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'payroll_record_id' => 'required|integer|exists:payroll_records,id',
            'type' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        return Deduction::create($validated);
    }

    public function show($id)
    {
        return Deduction::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $deduction = Deduction::findOrFail($id);

        $validated = $request->validate([
            'payroll_record_id' => 'sometimes|integer|exists:payroll_records,id',
            'type' => 'sometimes|string',
            'amount' => 'sometimes|numeric',
        ]);

        $deduction->update($validated);

        return $deduction;
    }

    public function destroy($id)
    {
        $deduction = Deduction::findOrFail($id);
        $deduction->delete();

        return response()->noContent();
    }
}
