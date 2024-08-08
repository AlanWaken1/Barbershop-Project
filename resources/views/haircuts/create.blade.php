@extends('layout.app')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white"> Registrar Corte </h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="index.html">Inicio /</a>
                </li>
                <li class="font-medium text-primary">Registrar corte</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->
    <div class="flex flex-col gap-9 sm:grid-cols-2">
        <div class="flex flex-col gap-9">
            <!-- Contact Form -->
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">
                        Registrar corte
                    </h3>
                </div>
                <form action="{{ route('haircuts.store') }}" method="POST">
                    @csrf
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Empleado
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                                <select id="employee_id" name="employee_id" required
                                    class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                    :class="isOptionSelected && 'text-black dark:text-white'"
                                    @change="isOptionSelected = true">
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                                <span class="absolute right-4 top-1/2 z-30 -translate-y-1/2">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                fill=""></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4.5">
                            <label
                              class="mb-3 block text-sm font-medium text-black dark:text-white"
                            >
                              Seleccionar Fecha
                            </label>
                            <div class="relative">
                              <input type="date" id="date" name="date" required
                                class="form-datepicker w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                data-class="flatpickr-right"
                              />
                              <div
                                class="pointer-events-none absolute inset-0 left-auto right-5 flex items-center"
                              >
                                <svg
                                  width="18"
                                  height="18"
                                  viewBox="0 0 18 18"
                                  fill="none"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    d="M9.0002 12.8249C8.83145 12.8249 8.69082 12.7687 8.5502 12.6562L2.08145 6.2999C1.82832 6.04678 1.82832 5.65303 2.08145 5.3999C2.33457 5.14678 2.72832 5.14678 2.98145 5.3999L9.0002 11.278L15.0189 5.34365C15.2721 5.09053 15.6658 5.09053 15.9189 5.34365C16.1721 5.59678 16.1721 5.99053 15.9189 6.24365L9.45019 12.5999C9.30957 12.7405 9.16895 12.8249 9.0002 12.8249Z"
                                    fill="#64748B"
                                  />
                                </svg>
                              </div>
                            </div>
                          </div>

                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Precio <span class="text-meta-1">*</span>
                            </label>
                            <input type="number" step="0.01" id="price" name="price" required placeholder="Ingresa el precio"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Característica
                            </label>
                            <input type="text" id="feature" name="feature" placeholder="Ingresa la característica"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Productos
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                                <select id="products" name="products[]" multiple
                                    class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                    :class="isOptionSelected && 'text-black dark:text-white'"
                                    @change="isOptionSelected = true">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                <span class="absolute right-4 top-1/2 z-30 -translate-y-1/2">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                fill=""></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Precio2
                            </label>
                            <input type="number" step="0.01" id="price2" name="price2" placeholder="Ingresa el precio2"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <button type="submit"
                            class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                            Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
