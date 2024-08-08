<?php

namespace App\Http\Controllers;

use App\Models\Haircut;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HaircutExportController extends Controller
{
    public function exportToExcel()
    {
        $haircuts = Haircut::all();
        $response = new StreamedResponse(function () use ($haircuts) {
            $writer = SimpleExcelWriter::streamDownload('cortes_de_cabello.xlsx');

            $writer->addRows($haircuts->map(function ($haircut) {
                return [
                    'Empleado' => $haircut->employee->name,
                    'Fecha' => $haircut->formatted_date,
                    'Precio' => $haircut->price,
                    'Característica' => $haircut->feature ?? 'Ninguna',
                    'Productos' => $haircut->products->pluck('name')->implode(', ') ?: 'Ninguno',
                    'Precio2' => $haircut->price2 ?? 0.00,
                    'Total' => $haircut->total,
                ];
            })->toArray());

            $writer->close();
        });

        return $response->send();
    }
}

