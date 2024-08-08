<?php

namespace App\Http\Controllers;

use App\Models\Haircut;
use App\Models\Employee;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        Carbon::setLocale('es');

        // Mapear los números de los meses a los nombres de los meses en español
        $months = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        // Datos mensuales
        $monthlyData = Haircut::selectRaw('MONTH(date) as period, SUM(total) as total')
            ->groupBy('period')
            ->orderBy('period')
            ->get()
            ->map(function($item) use ($months) {
                $item->period = $months[$item->period];
                return $item;
            });

        // Calcular el total de ingresos mensuales
        $totalMonthlyIncome = $monthlyData->sum('total');

        // Otros datos
        $weeklyData = Haircut::selectRaw('WEEK(date) as period, SUM(total) as total')
            ->groupBy('period')
            ->orderBy('period')
            ->get();

        $dailyData = Haircut::selectRaw('DAY(date) as period, SUM(total) as total')
            ->groupBy('period')
            ->orderBy('period')
            ->get();

        $employeeMonthlyData = Haircut::selectRaw('employee_id, MONTH(date) as period, SUM(total) as total')
            ->groupBy('employee_id', 'period')
            ->orderBy('period')
            ->get();

        $employeeWeeklyData = Haircut::selectRaw('employee_id, WEEK(date) as period, SUM(total) as total')
            ->groupBy('employee_id', 'period')
            ->orderBy('period')
            ->get();

        $employeeDailyData = Haircut::selectRaw('employee_id, DAY(date) as period, SUM(total) as total')
            ->groupBy('employee_id', 'period')
            ->orderBy('period')
            ->get();

        $topEmployee = $employeeMonthlyData->first();
        $topEmployeeName = $topEmployee ? Employee::find($topEmployee->employee_id)->name : 'No Data';
        $topEmployeeCuts = $topEmployee ? $topEmployee->total_cuts : 0;

        // Ingreso diario promedio
        $averageDailyIncome = $dailyData->avg('total');

        // Cortes de cabello diarios
        $todayCuts = Haircut::whereDate('date', Carbon::today())->count();
        $yesterdayCuts = Haircut::whereDate('date', Carbon::yesterday())->count();
        $dailyCutsChange = $yesterdayCuts > 0 ? (($todayCuts - $yesterdayCuts) / $yesterdayCuts) * 100 : 0;


        $currentMonth = Carbon::now()->format('m'); // Mes actual en formato 01, 02, etc.

        $currentYear = Carbon::now()->format('Y'); // Año actual

        $currentDay = Carbon::now()->format('D'); //Dia actual

        $employees = Employee::all()->pluck('name', 'id');

        return view('layout.index', [
            'monthlyData' => $monthlyData,
            'totalMonthlyIncome' => $totalMonthlyIncome,
            'weeklyData' => $weeklyData,
            'dailyData' => $dailyData,
            'employeeMonthlyData' => $employeeMonthlyData,
            'employeeWeeklyData' => $employeeWeeklyData,
            'employeeDailyData' => $employeeDailyData,
            'topEmployeeName' => $topEmployeeName,
            'topEmployeeCuts' => $topEmployeeCuts,
            'averageDailyIncome' => $averageDailyIncome,
            'todayCuts' => $todayCuts,
            'dailyCutsChange' => $dailyCutsChange,
            'employees' => $employees,
            'currentMonth' => $currentMonth,
        ]);
    }
}
