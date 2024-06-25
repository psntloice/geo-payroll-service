<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'salary' => 'required|numeric',
        ]);

        return Employee::create($validated);
    }

    public function show(Employee $employee)
    {
        return $employee;
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:employees,email,' . $employee->id,
            'salary' => 'sometimes|numeric',
        ]);

        $employee->update($validated);

        return $employee;
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->noContent();
    }
}
