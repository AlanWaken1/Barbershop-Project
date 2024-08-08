<?php

namespace App\Http\Controllers;

use App\Models\Haircut;
use App\Models\Employee;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;


class HaircutController extends Controller
{
    public function index(Request $request)
{
    Carbon::setLocale('es');

    // Crear una consulta para los datos de los cortes de cabello
    $query = Haircut::with('employee', 'products');

    // Filtrar por fecha exacta si se ha proporcionado
    if ($request->has('date') && !empty($request->date)) {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $query->whereDate('date', $date);
    }

    // Filtrar por mes si se ha proporcionado
    if ($request->has('month') && !empty($request->month)) {
        $month = Carbon::parse($request->month)->format('m');
        $query->whereMonth('date', $month);
    }

    // Filtrar por año si se ha proporcionado
    if ($request->has('year') && !empty($request->year)) {
        $year = $request->year;
        $query->whereYear('date', $year);
    }

    // Obtener los datos de los cortes de cabello con paginación
    $haircuts = $query->paginate(7)
        ->through(function ($haircut) {
            // Formatear la fecha usando Carbon
            $haircut->formatted_date = Carbon::parse($haircut->date)->format('Y, F, d');
            return $haircut;
        });

    // Procesar los datos para el gráfico
    $monthlyData = Haircut::selectRaw('MONTH(date) as month, SUM(total) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $months = $monthlyData->pluck('month');
    $totals = $monthlyData->pluck('total');

    return view('haircuts.index', [
        'haircuts' => $haircuts,
        'months' => $months,
        'totals' => $totals
    ]);
}



    public function create()
    {
        $employees = Employee::all();
        $products = Product::all();
        return view('haircuts.create', compact('employees', 'products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'price' => 'required|numeric',
            'feature' => 'nullable|string|max:255',
            'products' => 'nullable|array',
            'products.*' => 'exists:products,id',
            'price2' => 'nullable|numeric',
        ]);

        $validatedData['date'] = Carbon::parse($validatedData['date'])->format('Y-m-d');

        $employee = Employee::find($validatedData['employee_id']);
        $total = $this->calculateTotal($validatedData['price'], $validatedData['price2'] ?? 0, $employee->role);

        $haircut = Haircut::create(array_merge($validatedData, ['total' => $total]));

        if (!empty($validatedData['products'])) {
            $haircut->products()->attach($validatedData['products']);
        }

        return redirect()->route('haircuts.index')->with('success', 'Corte de cabello registrado exitosamente.');
    }

    private function calculateTotal($price, $price2, $role)
    {
        if ($role == 'dueño') {
            return $price + $price2;
        } else {
            return ($price * 0.5) + ($price2 * 0.1);
        }
    }

    public function edit($id)
    {
        $haircut = Haircut::findOrFail($id);
        $employees = Employee::all();
        $products = Product::all();
        return view('haircuts.edit', compact('haircut', 'employees', 'products'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'price' => 'required|numeric',
            'feature' => 'nullable|string|max:255',
            'products' => 'nullable|array',
            'products.*' => 'exists:products,id',
            'price2' => 'nullable|numeric',
        ]);

        $employee = Employee::find($validatedData['employee_id']);
        $total = $this->calculateTotal($validatedData['price'], $validatedData['price2'] ?? 0, $employee->role);

        $haircut = Haircut::findOrFail($id);
        $haircut->update(array_merge($validatedData, ['total' => $total]));

        if (!empty($validatedData['products'])) {
            $haircut->products()->sync($validatedData['products']);
        } else {
            $haircut->products()->detach();
        }

        return redirect()->route('haircuts.index')->with('success', 'Corte de cabello actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $haircut = Haircut::findOrFail($id);
        $haircut->products()->detach();
        $haircut->delete();

        return redirect()->route('haircuts.index')->with('success', 'Corte de cabello eliminado exitosamente.');
    }

    public function monthlyReport($month)
{

    $haircuts = Haircut::with('employee')
        ->whereMonth('date', $month)
        ->get();

    $report = [];

    foreach ($haircuts as $haircut) {
        $employeeName = $haircut->employee->name;
        if (!isset($report[$employeeName])) {
            $report[$employeeName] = 0;
        }
        $report[$employeeName] += $haircut->calculateEarnings();
    }

    return view('reports.monthly', [
        'report' => $report,
        'month' => $month
    ]);
}







    //Exportar a PDF

    public function exportPDF()
    {
        $haircuts = Haircut::with(['employee', 'products'])->get();

        $pdf = Pdf::loadView('haircuts.export_pdf', compact('haircuts'));
        return $pdf->download('cortes_de_cabello.pdf');
    }


}
