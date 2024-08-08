<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HaircutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HaircutExportController;




Route::get('/', [HomeController::class, 'index'])->name('index');



//rutas para el CRUD de la aplicación
//-----------------------------------------------------//
Route::resource('employees', EmployeeController::class);
Route::resource('haircuts', HaircutController::class);
Route::resource('brands', BrandController::class);
Route::resource('products', ProductController::class);
//------------------------------------------------------//



Route::get('/reports/monthly/{month}', [HaircutController::class, 'monthlyReport'])->name('reports.monthly');

Route::get('/haircuts', [HaircutController::class, 'index'])->name('haircuts.index');


//Exportar archivos
Route::get('/export-excel', [HaircutExportController::class, 'exportToExcel'])->name('export.excel');
Route::get('haircuts/export/pdf', [HaircutController::class, 'exportPDF'])->name('haircuts.export.pdf');
