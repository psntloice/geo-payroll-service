<?php

namespace App\Http\Controllers;

use App\Models\Earning;
use Illuminate\Http\Request;

class EarningController extends Controller
{
    public function index()
    {
        return Earning::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'payroll_record_id' => 'required|integer|exists:payroll_records,id',
            'type' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        return Earning::create($validated);
    }

    public function show($id)
    {
        return Earning::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $earning = Earning::findOrFail($id);

        $validated = $request->validate([
            'payroll_record_id' => 'sometimes|integer|exists:payroll_records,id',
            'type' => 'sometimes|string',
            'amount' => 'sometimes|numeric',
        ]);

        $earning->update($validated);

        return $earning;
    }

    public function destroy($id)
    {
        $earning = Earning::findOrFail($id);
        $earning->delete();

        return response()->noContent();
    }
}
