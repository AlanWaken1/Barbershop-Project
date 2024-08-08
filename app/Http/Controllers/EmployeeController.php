<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        Employee::create($request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
        ]));

        return redirect()->route('employees.index')->with('success', 'Empleado creado exitosamente.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
        ]));

        return redirect()->route('employees.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}

