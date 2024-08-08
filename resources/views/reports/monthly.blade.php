@extends('layout.app')

@section('content')

<!-- Breadcrumb Start -->
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        Reporte mensual
    </h2>

    <nav>
        <ol class="flex items-center gap-2">
            <li>
                <a class="font-medium" href="{{ route('index') }}">Inicio /</a>
            </li>
            <li class="font-medium text-primary">Reporte del mes de
                @switch($month)
                    @case('01') Enero @break
                    @case('02') Febrero @break
                    @case('03') Marzo @break
                    @case('04') Abril @break
                    @case('05') Mayo @break
                    @case('06') Junio @break
                    @case('07') Julio @break
                    @case('08') Agosto @break
                    @case('09') Septiembre @break
                    @case('10') Octubre @break
                    @case('11') Noviembre @break
                    @case('12') Diciembre @break
                    @default {{ $month }}
                @endswitch
            </li>
        </ol>
    </nav>
</div>
<!-- Breadcrumb End -->

<form method="GET" action="{{ route('reports.monthly', ['month' => $month]) }}" class="mb-6">
    <label for="month" class="block text-sm font-medium text-gray-700">Seleccione el mes:</label>
    <select id="month" name="month" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
        <option value="01" {{ $month == '01' ? 'selected' : '' }}>Enero</option>
        <option value="02" {{ $month == '02' ? 'selected' : '' }}>Febrero</option>
        <option value="03" {{ $month == '03' ? 'selected' : '' }}>Marzo</option>
        <option value="04" {{ $month == '04' ? 'selected' : '' }}>Abril</option>
        <option value="05" {{ $month == '05' ? 'selected' : '' }}>Mayo</option>
        <option value="06" {{ $month == '06' ? 'selected' : '' }}>Junio</option>
        <option value="07" {{ $month == '07' ? 'selected' : '' }}>Julio</option>
        <option value="08" {{ $month == '08' ? 'selected' : '' }}>Agosto</option>
        <option value="09" {{ $month == '09' ? 'selected' : '' }}>Septiembre</option>
        <option value="10" {{ $month == '10' ? 'selected' : '' }}>Octubre</option>
        <option value="11" {{ $month == '11' ? 'selected' : '' }}>Noviembre</option>
        <option value="12" {{ $month == '12' ? 'selected' : '' }}>Diciembre</option>
    </select>
    <button type="submit" class="mt-3 px-4 py-2 bg-indigo-600 text-white rounded-md">Ver Reporte</button>
</form>





<!-- Report Table -->
<div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
    <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
        Reporte Mensual
    </h4>

    <div class="flex flex-col">
        <div class="grid grid-cols-2 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-2">
            <div class="p-2.5 xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Empleado</h5>
            </div>
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Ingresos</h5>
            </div>
        </div>

        @foreach ($report as $employee => $earnings)
        <div class="grid grid-cols-2 border-b border-stroke dark:border-strokedark sm:grid-cols-2">
            <div class="flex items-center gap-3 p-2.5 xl:p-5">
                <p class="font-medium text-black dark:text-white">{{ $employee }}</p>
            </div>
            <div class="flex items-center justify-center p-2.5 xl:p-5">
                <p class="font-medium text-meta-3">${{ number_format($earnings, 2) }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
