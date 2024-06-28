<?php

namespace App\Http\Controllers;

use App\Models\Earning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EarningController extends Controller
{
    public function index()
    {
        // $token = 'Bearer ' . 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiZXhwIjoxNzE5NjYxNDk4LCJpYXQiOjE3MTk1NzUwOTgsImp0aSI6IjFhZTgxZTY3NWQyNTQ2ZDdhMTNhNDZlNTYwYTE5YmQ0IiwidXNlcl9pZCI6MSwiZW1haWwiOiJhZG1pbkBnbWFpbC5jb20iLCJyb2xlIjoiYWRtaW4ifQ.sMoHzVyzP6fMvwHE0lP5kuxq7XQHkSX1oCUINl3y7_0';
        $token = 'Bearer ' . 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiZXhwIjoxNzE5NjYxNDk4LCJpYXQiOjE3MTk1NzUwOTgsImp0aSI6IjFhZTgxZTY3NWQyNTQ2ZDdhMTNhNDZlNTYwYTE5YmQ0IiwidXNlcl9pZCI6MSwiZW1haWwiOiJhZG1pbkBnbWFpbC5jb20iLCJyb2xlIjoiYWRtaW4ifQ.sMoHzVyzP6fMvwHE0lP5kuxq7XQHkSX1oCUINl3y7_0';

        $employeeResponse = Http::withHeaders([
            'Authorization' => $token,
        ])->get('https://geo-employee-service.vercel.app/api/employees/');
        // return Earning::all();
        // $employeeResponse = Http::get(env('EMPLOYEE_SERVICE_BASE_URL') . '/employees/' );
        if ($employeeResponse->failed()) {
            Log::error('Failed to fetch employee data from external service: ' . $employeeResponse->status());
            return response()->json(['error' => 'Employee not found'], 404);
        }
        else return $employeeResponse;

      


    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'payroll_record_id' => 'required|integer|exists:payroll_records,id',
            'type' => 'required|string',
            'amount' => 'required|numeric',
        ]);
        $employeeResponse = Http::get(env('EMPLOYEE_SERVICE_BASE_URL') . '/employees/' . $validated['employee_id']);
        if ($employeeResponse->failed()) {
            return response()->json(['error' => 'Employee not found'], 404);
        }
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
