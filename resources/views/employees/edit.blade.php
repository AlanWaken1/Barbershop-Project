@extends('layout.app')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">Editar Empleado</h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route('index') }}">Inicio /</a>
                </li>
                <li class="font-medium text-primary">Editar Empleado</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->

    <div class="flex flex-col gap-9 sm:grid-cols-2">
        <div class="flex flex-col gap-9">
            <!-- Form -->
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">
                        Editar Empleado
                    </h3>
                </div>
                <form action="{{ route('employees.update', $employee) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Nombre
                            </label>
                            <input type="text" name="name" id="name" value="{{ $employee->name }}" required placeholder="Nombre del empleado"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Rol
                            </label>
                            <input type="text" name="role" id="role" value="{{ $employee->role }}" required placeholder="Rol del empleado"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <button
                            class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
