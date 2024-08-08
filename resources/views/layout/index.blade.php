{{-- Aqui van a estar las gráficas y todo eso --}}
@extends('layout.app')
@section('content')
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
        <!-- Card Item Start -->
        <div
            class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                <svg class="fill-primary dark:fill-white" width="22" height="22" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 17.25L9 11.25L12.75 15L21 6.75" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>

            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">
                        ${{ number_format($totalMonthlyIncome, 2) }} <!-- Mostrar el total de ingresos mensuales -->
                    </h4>
                    <span class="text-sm font-medium">Ingresos Mensuales</span>
                </div>

                <span class="flex items-center gap-1 text-sm font-medium text-meta-3">
                    <!-- Porcentaje o cambios -->
                    0.43%
                    <svg class="fill-meta-3" width="10" height="10" viewBox="0 0 10 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L9 5L5 9L1 5L5 1Z" fill="currentColor" />
                    </svg>
                </span>
            </div>
        </div>
        <!-- Card Item End -->



        <!-- Card Item Start -->
        <div
            class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                <svg class="fill-primary dark:fill-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 24 24" width="24" height="24">
                    <path stroke="none" stroke-linecap="round" stroke-linejoin="round" d="M4.5 18.75l7.5-7.5 7.5 7.5" />
                    <path stroke="none" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l7.5-7.5 7.5 7.5" />
                </svg>
            </div>

            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h4 class="text-title-md font-bold text-black dark:text-white">
                        {{ $topEmployeeName }} <!-- Nombre del empleado con más cortes -->
                    </h4>
                    <span class="text-sm font-medium">{{ $topEmployeeCuts }} Más cortes de cabello</span>
                    <!-- Número de cortes -->
                </div>

                <span class="flex items-center gap-1 text-sm font-medium text-meta-3">
                    <!-- Porcentaje o cambios (puedes agregar algo aquí si deseas) -->+
                </span>
            </div>
        </div>
        <!-- Card Item End -->





<!-- Card Item: Ingreso Diario Promedio -->
<div
    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
        <svg class="fill-primary dark:fill-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 24 24" width="24" height="24">
            <path stroke="none" stroke-linecap="round" stroke-linejoin="round" d="M3 17h2v-7H3v7zm4 0h2v-4H7v4zm4 0h2V7h-2v10zm4 0h2V4h-2v13zm4 0h2v-10h-2v10z" />
        </svg>
    </div>
    <div class="mt-4 flex items-end justify-between">
        <div>
            <h4 class="text-title-md font-bold text-black dark:text-white">
                ${{ number_format($averageDailyIncome, 2) }}
            </h4>
            <span class="text-sm font-medium">Ingreso Diario Promedio</span>
        </div>
    </div>
</div>
<!-- Card Item End -->



<!-- Card Item: Número de Cortes Diarios -->
<div
    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
        <svg class="fill-primary dark:fill-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 24 24" width="24" height="24">
            <path stroke="none" stroke-linecap="round" stroke-linejoin="round" d="M3 12h3v8H3zM7 8h3v12H7zM11 5h3v15h-3zM15 4h3v16h-3zM19 6h3v14h-3z" />
        </svg>
    </div>
    <div class="mt-4 flex items-end justify-between">
        <div>
            <h4 class="text-title-md font-bold text-black dark:text-white">
                {{ $todayCuts }}
            </h4>
            <span class="text-sm font-medium">Cortes de Cabello Hoy</span>
        </div>
        <span class="flex items-center gap-1 text-sm font-medium text-meta-3">
            {{ $dailyCutsChange > 0 ? '+' : '' }}{{ number_format($dailyCutsChange, 2) }}%
        </span>
    </div>
</div>
<!-- Card Item End -->




    </div>

    <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">

        <!-- ====== Chart One Start -->
        <div
            class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-12">
            <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap">
                <div class="flex w-full flex-wrap gap-3 sm:gap-5">
                    <div class="flex min-w-40.5">
                        <span
                            class="mr-2 mt-1 flex h-4 w-full max-w-4 items-center justify-center rounded-full border border-primary">
                            <span class="block h-2.5 w-full max-w-2.5 rounded-full bg-primary"></span>
                        </span>
                        <div class="w-auto">
                            <p class="font-semibold text-primary">Total de ganancias</p>
                            <p class="text-sm font-medium">Datos mensuales, semanales y diarios</p>
                        </div>
                    </div>

                </div>
                <div class="flex w-full max-w-45 justify-end">
                    <div class="inline-flex items-center rounded-md bg-whiter p-1.5 dark:bg-meta-4">
                        <button id="dayBtn"
                            class="rounded bg-white px-3 py-1 text-xs font-medium text-black shadow-card hover:bg-white hover:shadow-card dark:bg-boxdark dark:text-white dark:hover:bg-boxdark">
                            Diario
                        </button>
                        <button id="weekBtn"
                            class="rounded px-3 py-1 text-xs font-medium text-black hover:bg-white hover:shadow-card dark:text-white dark:hover:bg-boxdark">
                            Semanal
                        </button>
                        <button id="monthBtn"
                            class="rounded px-3 py-1 text-xs font-medium text-black hover:bg-white hover:shadow-card dark:text-white dark:hover:bg-boxdark">
                            Mensual
                        </button>
                    </div>
                </div>
            </div>
            <!-- Chart Container -->
            <div>
                <canvas id="chartOne"></canvas>
            </div>
        </div>
        <!-- ====== Chart One End -->

        <!-- Chart.js Script -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('chartOne').getContext('2d');

                var primaryColor = 'rgba(37, 99, 235, 1)';
                var primaryColorBg = 'rgba(37, 99, 235, 0.2)';

                var data = {
                    labels: @json($monthlyData->pluck('period')),
                    datasets: [{
                        label: 'Ingresos totales',
                        data: @json($monthlyData->pluck('total')),
                        fill: false,
                        borderColor: primaryColor,
                        backgroundColor: primaryColorBg,
                        tension: 0.1
                    }]
                };

                var options = {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Mes'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Ingresos'
                            }
                        }
                    }
                };

                var chartOne = new Chart(ctx, {
                    type: 'line', // Tipo de gráfico inicial
                    data: data,
                    options: options
                });

                document.getElementById('dayBtn').addEventListener('click', function() {
                    updateChart('day');
                });

                document.getElementById('weekBtn').addEventListener('click', function() {
                    updateChart('week');
                });

                document.getElementById('monthBtn').addEventListener('click', function() {
                    updateChart('month');
                });

                function updateChart(period) {
                    if (period === 'day') {
                        chartOne.data.labels = @json($dailyData->pluck('period'));
                        chartOne.data.datasets[0].data = @json($dailyData->pluck('total'));
                        chartOne.options.scales.x.title.text = 'Día';
                    } else if (period === 'week') {
                        chartOne.data.labels = @json($weeklyData->pluck('period'));
                        chartOne.data.datasets[0].data = @json($weeklyData->pluck('total'));
                        chartOne.options.scales.x.title.text = 'Semana';
                    } else if (period === 'month') {
                        chartOne.data.labels = @json($monthlyData->pluck('period'));
                        chartOne.data.datasets[0].data = @json($monthlyData->pluck('total'));
                        chartOne.options.scales.x.title.text = 'Mes';
                    }
                    chartOne.update();
                }

                function updateChartType(newType) {
                    chartOne.destroy(); // Destruir el gráfico actual
                    chartOne = new Chart(ctx, {
                        type: newType, // Nuevo tipo de gráfico
                        data: data,
                        options: options
                    });
                }
            });
        </script>







        <!-- ====== Chart Three Start -->
        <div
            class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-12 xl:col-span-12">
            <div class="mb-3 justify-between gap-4 sm:flex">
                <div>
                    <h4 class="text-xl font-bold text-black dark:text-white">Ganancias por Empleado</h4>
                </div>
                <div>
                    <div class="relative z-20 inline-block">
                        <select id="timeframeSelect"
                            class="relative z-20 inline-flex appearance-none bg-transparent py-1 pl-3 pr-8 text-sm font-medium outline-none">
                            <option value="monthly">Mensual</option>
                            <option value="weekly">Semanal</option>
                            <option value="daily">Diario</option>
                        </select>
                        <span class="absolute right-3 top-1/2 z-10 -translate-y-1/2">
                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.47072 1.08816C0.47072 1.02932 0.500141 0.955772 0.54427 0.911642C0.647241 0.808672 0.809051 0.808672 0.912022 0.896932L4.85431 4.60386C4.92785 4.67741 5.06025 4.67741 5.14851 4.60386L9.09079 0.896932C9.19376 0.793962 9.35557 0.808672 9.45854 0.911642C9.56151 1.01461 9.5468 1.17642 9.44383 1.27939L5.50155 4.98632C5.22206 5.23639 4.78076 5.23639 4.51598 4.98632L0.558981 1.27939C0.50014 1.22055 0.47072 1.16171 0.47072 1.08816Z"
                                    fill="#637381" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.22659 0.546578L5.00141 4.09604L8.76422 0.557869C9.08459 0.244537 9.54201 0.329403 9.79139 0.578788C10.112 0.899434 10.0277 1.36122 9.77668 1.61224L9.76644 1.62248L5.81552 5.33722C5.36257 5.74249 4.6445 5.7544 4.19352 5.32924C4.19327 5.32901 4.19377 5.32948 4.19352 5.32924L0.225953 1.61241C0.102762 1.48922 -4.20186e-08 1.31674 -3.20269e-08 1.08816C-2.40601e-08 0.905899 0.0780105 0.712197 0.211421 0.578787C0.494701 0.295506 0.935574 0.297138 1.21836 0.539529L1.22659 0.546578ZM4.51598 4.98632C4.78076 5.23639 5.22206 5.23639 5.50155 4.98632L9.44383 1.27939C9.5468 1.17642 9.56151 1.01461 9.45854 0.911642C9.35557 0.808672 9.19376 0.793962 9.09079 0.896932L5.14851 4.60386C5.06025 4.67741 4.92785 4.67741 4.85431 4.60386L0.912022 0.896932C0.809051 0.808672 0.647241 0.808672 0.54427 0.911642C0.500141 0.955772 0.47072 1.02932 0.47072 1.08816C0.47072 1.16171 0.50014 1.22055 0.558981 1.27939L4.51598 4.98632Z"
                                    fill="#637381" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <canvas id="employeeChart"></canvas>
            </div>
        </div>
        <!-- ====== Chart Three End -->

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('employeeChart').getContext('2d');
                var employeeMonthlyData = @json($employeeMonthlyData);
                var employeeWeeklyData = @json($employeeWeeklyData);
                var employeeDailyData = @json($employeeDailyData);
                var employees = @json($employees);

                var chartData = formatData(employeeMonthlyData);

                var employeeChart = new Chart(ctx, {
                    type: 'scatter',
                    data: chartData,
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Periodo'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Ganancias'
                                }
                            }
                        }
                    }
                });

                document.getElementById('timeframeSelect').addEventListener('change', function() {
                    var timeframe = this.value;

                    if (timeframe === 'monthly') {
                        chartData = formatData(employeeMonthlyData);
                    } else if (timeframe === 'weekly') {
                        chartData = formatData(employeeWeeklyData);
                    } else if (timeframe === 'daily') {
                        chartData = formatData(employeeDailyData);
                    }

                    employeeChart.data = chartData;
                    employeeChart.update();
                });

                function formatData(data) {
                    var labels = [];
                    var datasets = {};

                    data.forEach(function(item) {
                        var employeeName = employees[item.employee_id];
                        var period = item.period;
                        var total = item.total;

                        if (!labels.includes(period)) {
                            labels.push(period);
                        }

                        if (!datasets[employeeName]) {
                            datasets[employeeName] = {
                                label: employeeName,
                                data: [],
                                borderColor: getRandomColor(),
                                fill: false
                            };
                        }

                        datasets[employeeName].data.push({
                            x: period,
                            y: total
                        });
                    });

                    return {
                        labels: labels.sort(),
                        datasets: Object.values(datasets)
                    };
                }

                function getRandomColor() {
                    var letters = '0123456789ABCDEF';
                    var color = '#';
                    for (var i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }
            });
        </script>






    </div>
@endsection
