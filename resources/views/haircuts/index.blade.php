@extends('layout.app')

@section('content')
    <div>
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Cortes de cabello
            </h2>
            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="{{ route('index') }}">Inicio /</a>
                    </li>
                    <li class="text-primary">Agregar corte</li>
                </ol>
            </nav>
        </div>


        <a href="{{ route('haircuts.create') }}"
            class="inline-flex items-center justify-center gap-2.5 rounded-full bg-black px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
            <span>
                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 0C10.5523 0 11 0.447715 11 1V9H19C19.5523 9 20 9.44772 20 10C20 10.5523 19.5523 11 19 11H11V19C11 19.5523 10.5523 20 10 20C9.44772 20 9 19.5523 9 19V11H1C0.447715 11 0 10.5523 0 10C0 9.44772 0.447715 9 1 9H9V1C9 0.447715 9.44772 0 10 0Z"
                        fill="currentColor" />
                </svg>
            </span>
            Añadir corte
        </a>

<br>
<br>

<form method="GET" action="{{ route('haircuts.index') }}">
    <div class="mb-6">
        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            Filtrar por fecha
        </label>
        <div class="relative">
            <input
                type="date"
                name="date"
                class="form-datepicker w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                placeholder="mm/dd/yyyy"
                value="{{ request('date') }}"
            />
        </div>
    </div>

    <div class="mb-6">
        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            Filtrar por mes
        </label>
        <div class="relative">
            <input
                type="month"
                name="month"
                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                value="{{ request('month') }}"
            />
        </div>
    </div>

    <div class="mb-6">
        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
            Filtrar por año
        </label>
        <div class="relative">
            <input
                type="number"
                name="year"
                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                placeholder="YYYY"
                min="1900"
                max="{{ date('Y') }}"
                value="{{ request('year') }}"
            />
        </div>
    </div>

    <div class="flex gap-2">
        <button type="submit" class="inline-flex items-center justify-center gap-2.5 rounded-full bg-black px-10 py-4 text-center font-medium text-white hover:bg-green-600">
            <!-- Ícono de filtro -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6" />
            </svg>
            Filtrar
        </button>

        <a href="{{ route('haircuts.index') }}" class="inline-flex items-center justify-center gap-2.5 rounded-full bg-black px-10 py-4 text-center font-medium text-white hover:bg-opacity-90">
            <i class="fas fa-trash-alt"></i>
            Eliminar Filtro
        </a>
    </div>
</form>




<br>




        <a href="{{ route('export.excel') }}"
            class="inline-flex items-center justify-center gap-2.5 rounded-full bg-meta-3 px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="white" width="20" height="20">
                    <path
                        d="M305 240h-61v48h61v40h-61v88h-45v-88h-61v88h-45v-88H79v-40h61v-48H79v-40h61v-88h45v88h61v-88h45v88h61v40zm48-240h-288c-35.35 0-64 28.65-64 64v384c0 35.35 28.65 64 64 64h288c35.35 0 64-28.65 64-64V64c0-35.35-28.7-64-64-64zM400 448c0 8.837-7.163 16-16 16H64c-8.837 0-16-7.163-16-16V64c0-8.837 7.163-16 16-16h320c8.837 0 16 7.163 16 16v384z" />
                </svg>
            </span>
            Exportar a Excel
        </a>


        <a href="{{ route('haircuts.export.pdf') }}"
            class="inline-flex items-center justify-center gap-2.5 rounded-full px-10 py-4 text-center font-medium text-white hover:bg-red-700 lg:px-8 xl:px-10"
            style="background-color: #E53E3E;">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">
                    <path
                        d="M19 3h-6l-2-2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14h-2v-2h2v2zm0-4h-2v-6h2v6zm8 4H7v-2h11v2zm0-4H7v-2h11v2zm0-4H7V7h11v2z" />
                </svg>
            </span>
            Exportar a PDF
        </a>

        <br>
        <br>

        <div
            class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
            <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-2 text-left dark:bg-meta-4">
                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                Empleado
                            </th>
                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">
                                Fecha
                            </th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                Precio
                            </th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                Característica
                            </th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                Productos
                            </th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                Precio2
                            </th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                Total
                            </th>
                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($haircuts as $haircut)
                            <tr>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                    <h5 class="font-medium text-black dark:text-white">{{ $haircut->employee->name }}</h5>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <h5 class="font-medium text-black dark:text-white">{{ $haircut->formatted_date }}</h5>
                                </td>

                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="font-medium text-meta-3">${{ $haircut->price }}</p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    @if ($haircut->feature)
                                        <h5 class="font-medium text-black dark:text-white">{{ $haircut->feature }}</h5>
                                    @else
                                        Ninguna
                                    @endif
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    @if ($haircut->products->isNotEmpty())
                                        <ul>
                                            @foreach ($haircut->products as $product)
                                                <li
                                                    class="inline-flex rounded-full bg-success bg-opacity-10 px-3 py-1 text-sm font-medium text-success">
                                                    {{ $product->name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        Ninguno
                                    @endif
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">

                                    @if ($haircut->price2)
                                    <p class="font-medium text-meta-3">${{ $haircut->price2 }}</p @else $0.00
                                            @endif


                                </td>
                                <td
                                    class="border-b border-[#eee] px-4 py-5 dark:border-strokedark bg-yellow-50 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-yellow-600 dark:text-yellow-300"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12 2L15 8H21L16 12L18 19L12 15L6 19L8 12L3 8H9L12 2Z"
                                            fill="currentColor" />
                                    </svg>
                                    <h5 class="font-medium text-decoration-underline">${{ $haircut->total }}</h5>
                                </td>




                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <div class="flex items-center space-x-3.5">
                                        <a href="{{ route('haircuts.edit', $haircut->id) }}" class="hover:text-primary">
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.25 3.75L14.6484 7.14844L4.64844 17.1484L1.25 17.1484L1.25 13.75L11.25 3.75ZM14.6484 8.91406L13.0859 10.4766L11.5234 8.91406L12.9531 7.48438L14.6484 8.91406ZM12.1875 6.45312L13.6172 7.88281L12.0547 9.44531L10.625 8.01562L12.1875 6.45312ZM9.72656 4.99219L11.1562 6.42188L9.59375 7.98438L8.16406 6.55469L9.72656 4.99219ZM8.4375 3.75L9.84375 5.15625L8.28125 6.71875L6.875 5.3125L8.4375 3.75ZM5.97656 2.28906L7.38281 3.69531L5.82031 5.25781L4.41406 3.85156L5.97656 2.28906ZM2.51562 0.851562L5.91406 4.25L4.47656 5.6875L1.07812 2.28906L2.51562 0.851562Z"
                                                    fill="" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('haircuts.destroy', $haircut->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="hover:text-primary">
                                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7285C12.8816 17.5219 13.8379 16.6219 13.8941 15.4688L14.3441 6.1594C14.8785 5.9344 15.2441 5.42815 15.2441 4.8094V3.96565C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.38477 1.9969C7.38477 1.68002 7.58664 1.47815 7.90352 1.47815H10.0691C10.386 1.47815 10.5879 1.68002 10.5879 1.9969V2.47502H7.38477V1.9969ZM13.2441 3.96565C13.2441 3.64877 13.4459 3.4469 13.7535 3.4469H4.21914C3.91127 3.4469 3.7094 3.64877 3.7094 3.96565V4.8094C3.7094 5.05127 3.87734 5.25752 4.10502 5.35477C4.17414 5.3844 4.23527 5.41402 4.30414 5.41402H13.6685C13.7379 5.41402 13.7991 5.3844 13.8685 5.35477C14.096 5.25752 14.2641 5.05127 14.2641 4.8094V3.96565C14.2641 3.64877 14.0622 3.4469 13.7535 3.4469ZM11.2441 15.6519C11.2441 15.9657 11.011 16.1988 10.6973 16.1988C10.3835 16.1988 10.1504 15.9657 10.1504 15.6519V8.6519C10.1504 8.33815 10.3835 8.10502 10.6973 8.10502C11.011 8.10502 11.2441 8.33815 11.2441 8.6519V15.6519ZM8.69727 15.6519C8.69727 15.9657 8.46414 16.1988 8.15039 16.1988C7.83664 16.1988 7.60352 15.9657 7.60352 15.6519V8.6519C7.60352 8.33815 7.83664 8.10502 8.15039 8.10502C8.46414 8.10502 8.69727 8.33815 8.69727 8.6519V15.6519ZM6.15039 15.6519C6.15039 15.9657 5.91727 16.1988 5.60352 16.1988C5.28977 16.1988 5.05664 15.9657 5.05664 15.6519V8.6519C5.05664 8.33815 5.28977 8.10502 5.60352 8.10502C5.91727 8.10502 6.15039 8.33815 6.15039 8.6519V15.6519Z"
                                                        fill="" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>
        <div class="mt-4">
            {{ $haircuts->links() }}
        </div>
    </div>
@endsection
