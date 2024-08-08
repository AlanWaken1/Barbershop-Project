@extends('layout.app')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">Lista de Empleados</h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route('index') }}">Inicio /</a>
                </li>
                <li class="font-medium text-primary">Empleados</li>
            </ol>
        </nav>
    </div>

    <a href="{{ route('employees.create') }}"
           class="inline-flex items-center justify-center gap-2.5 rounded-full bg-black px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
            <span>
                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 0C10.5523 0 11 0.447715 11 1V9H19C19.5523 9 20 9.44772 20 10C20 10.5523 19.5523 11 19 11H11V19C11 19.5523 10.5523 20 10 20C9.44772 20 9 19.5523 9 19V11H1C0.447715 11 0 10.5523 0 10C0 9.44772 0.447715 9 1 9H9V1C9 0.447715 9.44772 0 10 0Z" fill="currentColor"/>
                </svg>
            </span>
            Añadir empleado
        </a>
        <br>
        <br>
    <!-- Breadcrumb End -->

    <!-- Table Start -->
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-2 text-left dark:bg-meta-4">
                        <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                            Nombre
                        </th>
                        <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">
                            Rol
                        </th>
                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                <h5 class="font-medium text-black dark:text-white">{{ $employee->name }}</h5>
                            </td>
                            <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                <h5 class="font-medium text-black dark:text-white">{{ $employee->role }}</h5>
                            </td>
                            <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                <div class="flex items-center space-x-3.5">
                                    <a href="{{ route('employees.edit', $employee) }}" class="hover:text-primary">
                                        <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.25 3.75L14.6484 7.14844L4.64844 17.1484L1.25 17.1484L1.25 13.75L11.25 3.75ZM14.6484 8.91406L13.0859 10.4766L11.5234 8.91406L12.9531 7.48438L14.6484 8.91406ZM12.1875 6.45312L13.6172 7.88281L12.0547 9.44531L10.625 8.01562L12.1875 6.45312ZM9.72656 4.99219L11.1562 6.42188L9.59375 7.98438L8.16406 6.55469L9.72656 4.99219ZM8.4375 3.75L9.84375 5.15625L8.28125 6.71875L6.875 5.3125L8.4375 3.75ZM5.97656 2.28906L7.38281 3.69531L5.82031 5.25781L4.41406 3.85156L5.97656 2.28906ZM2.51562 0.851562L5.91406 4.25L4.47656 5.6875L1.07812 2.28906L2.51562 0.851562Z" fill=""/>
                                        </svg>
                                    </a>



                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="hover:text-primary" onclick="return confirm('¿Estás seguro?')">
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z" fill=""/>
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
    <!-- Table End -->
@endsection
