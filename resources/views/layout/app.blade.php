{{-- Aqui va a estar toda la estructura del dashboard --}}
@php
    $currentMonth = request()->get('currentMonth', '01'); // O usa un valor predeterminado si es necesario
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Administración de Barbería
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{ asset('images/logo/LogoJMM.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
    <!-- ===== Preloader Start ===== -->
    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
        class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent">
        </div>
    </div>

    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        <!-- ===== Sidebar Start ===== -->
        <aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
            class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
            @click.outside="sidebarToggle = false">
            <!-- SIDEBAR HEADER -->
            <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-1.5">
                <nav class="bg-blue-500 p-3 flex flex-col items-center">
                    <a href="{{ route("index") }}" class="flex flex-col items-center">
                      <img src="{{ asset('images/logo/LogoJMM.png') }}" alt="Logo" class="w-16 h-auto p-2">
                      <span class="text-white text-xl mt-2 text-center">ALTA PELUQUERÍA Y BARBERÍA</span>
                    </a>

                  </nav>


                <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
                    <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                            fill="" />
                    </svg>
                </button>
            </div>
            <!-- SIDEBAR HEADER -->

            <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
                <!-- Sidebar Menu -->
                <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{ selected: $persist('Dashboard') }">
                    <!-- Menu Group -->
                    <div>
                        <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">Administrar</h3>

                        <ul class="mb-6 flex flex-col gap-1.5">

                            <li>
                                <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                                    href="{{ route('index') }}"
                                    @click="selected = (selected === 'Inicio' ? '' : 'Inicio')"
                                    :class="{
                                        'bg-graydark dark:bg-meta-4': (selected === 'Inicio') && (page === 'Inicio')
                                    }">
                                    <svg class="fill-current w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3L4 9V21H8V14H16V21H20V9L12 3Z" fill="currentColor"/>
                                    </svg>
                                    Inicio
                                </a>
                            </li>

                            <!-- Menu Item Agregar Corte -->
                            <li>
                                <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                                    href="{{ route('haircuts.index') }}"
                                    @click="selected = (selected === 'Agregar Corte' ? '' : 'Agregar Corte')"
                                    :class="{
                                        'bg-graydark dark:bg-meta-4': (selected === 'Agregar Corte') && (page === 'Agregar Corte')
                                    }">
                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13 11V4C13 3.44772 12.5523 3 12 3C11.4477 3 11 3.44772 11 4V11H4C3.44772 11 3 11.4477 3 12C3 12.5523 3.44772 13 4 13H11V20C11 20.5523 11.4477 21 12 21C12.5523 21 13 20.5523 13 20V13H20C20.5523 13 21 12.5523 21 12C21 11.4477 20.5523 11 20 11H13Z"
                                            fill="currentColor" />
                                    </svg>
                                    Agregar Corte
                                </a>
                            </li>

                            <!-- Menu Item Empleados -->
                            <li>
                                <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                                    href="{{ route('employees.index') }}" @click="selected = (selected === 'Empleados' ? '' : 'Empleados')"
                                    :class="{
                                        'bg-graydark dark:bg-meta-4': (selected === 'Empleados') && (page === 'Empleados')
                                    }">
                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.0002 7.79065C11.0814 7.79065 12.7689 6.1594 12.7689 4.1344C12.7689 2.1094 11.0814 0.478149 9.0002 0.478149C6.91895 0.478149 5.23145 2.1094 5.23145 4.1344C5.23145 6.1594 6.91895 7.79065 9.0002 7.79065ZM9.0002 1.7719C10.3783 1.7719 11.5033 2.84065 11.5033 4.16252C11.5033 5.4844 10.3783 6.55315 9.0002 6.55315C7.62207 6.55315 6.49707 5.4844 6.49707 4.16252C6.49707 2.84065 7.62207 1.7719 9.0002 1.7719Z" fill="" />
                                        <path d="M10.8283 9.05627H7.17207C4.16269 9.05627 1.71582 11.5313 1.71582 14.5406V16.875C1.71582 17.2125 1.99707 17.5219 2.3627 17.5219C2.72832 17.5219 3.00957 17.2407 3.00957 16.875V14.5406C3.00957 12.2344 4.89394 10.3219 7.22832 10.3219H10.8564C13.1627 10.3219 15.0752 12.2063 15.0752 14.5406V16.875C15.0752 17.2125 15.3564 17.5219 15.7221 17.5219C16.0877 17.5219 16.3689 17.2407 16.3689 16.875V14.5406C16.2846 11.5313 13.8377 9.05627 10.8283 9.05627Z" fill="" />
                                    </svg>
                                    Empleados
                                </a>
                            </li>
                            <!-- Menu Item Empleados -->
                            <li>
                                <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                                    href="{{ route('brands.index') }}" @click="selected = (selected === 'Marcas' ? '' : 'Marcas')"
                                    :class="{
                                        'bg-graydark dark:bg-meta-4': (selected === 'Marcas') && (page === 'Marcas')
                                    }">
                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 2C2.44772 2 2 2.44772 2 3V21C2 21.5523 2.44772 22 3 22H21C21.5523 22 22 21.5523 22 21V3C22 2.44772 21.5523 2 21 2H3ZM4 20V4H20V20H4ZM9 9H15V15H9V9Z" fill="currentColor"/>
                                    </svg>
                                    Marcas
                                </a>
                            </li>

                            <li>
                                <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                                    href="{{ route('products.index') }}" @click="selected = (selected === 'Productos' ? '' : 'Productos')"
                                    :class="{
                                        'bg-graydark dark:bg-meta-4': (selected === 'Productos') && (page === 'Productos')
                                    }">
                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 16V8L12 2L3 8V16L12 22L21 16ZM12 4.27L18 8.24L12 12.19L6 8.24L12 4.27ZM5 10.26L11 14.19V19.74L5 15.76V10.26ZM13 14.19L19 10.26V15.76L13 19.74V14.19Z" fill="currentColor"/>
                                    </svg>
                                    Productos
                                </a>
                            </li>




                            <!-- Menu Item Reportes -->
                            <li>
                                <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                                    @click.prevent="selected = (selected === 'Reportes' ? '' : 'Reportes')"
                                    :class="{
                                        'bg-graydark dark:bg-meta-4': (selected === 'Reportes') || (page === 'formElements' || page === 'formLayout')
                                    }">
                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 17H5V11H3V17Z" fill="currentColor" />
                                        <path d="M7 17H9V7H7V17Z" fill="currentColor" />
                                        <path d="M11 17H13V3H11V17Z" fill="currentColor" />
                                        <path d="M15 17H17V14H15V17Z" fill="currentColor" />
                                        <path d="M19 17H21V10H19V17Z" fill="currentColor" />
                                    </svg>
                                    Reportes
                                    <svg class="absolute right-4 top-1/2 -translate-y-1/2 fill-current" :class="{ 'rotate-180': (selected === 'Reportes') }" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.41107 6.9107C4.73651 6.58527 5.26414 6.58527 5.58958 6.9107L10.0003 11.3214L14.4111 6.91071C14.7365 6.58527 15.2641 6.58527 15.5896 6.91071C15.915 7.23614 15.915 7.76378 15.5896 8.08922L10.5896 13.0892C10.2641 13.4147 9.73651 13.4147 9.41107 13.0892L4.41107 8.08922C4.08563 7.76378 4.08563 7.23614 4.41107 6.9107Z" fill="" />
                                    </svg>
                                </a>

                                <!-- Dropdown Menu Start -->
                                <div class="translate transform overflow-hidden" :class="(selected === 'Reportes') ? 'block' : 'hidden'">
                                    <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                                        {{-- <li>
                                            <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                               href="{{ route('reports.monthly', ['month' => $month]) }}"
                                               :class="page === 'formElements' && '!text-white'">Reporte Mensual</a>
                                        </li> --}}


                                        <li>
                                            <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                                href="{{ route('reports.monthly', ['month' => $currentMonth]) }}"
                                                :class="page === 'formLayout' && '!text-white'">Reporte Mensual</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Dropdown Menu End -->

                            </li>

                        </ul>
                    </div>
                </nav>


                <!-- Sidebar Menu -->


            </div>
        </aside>

        <!-- ===== Sidebar End ===== -->

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <!-- ===== Header Start ===== -->
            <header
                class="sticky top-0 z-999 flex w-full bg-white drop-shadow-1 dark:bg-boxdark dark:drop-shadow-none">
                <div class="flex flex-grow items-center justify-between px-4 py-4 shadow-2 md:px-6 2xl:px-11">
                    <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
                        <!-- Hamburger Toggle BTN -->
                        <button
                            class="z-99999 block rounded-sm border border-stroke bg-white p-1.5 shadow-sm dark:border-strokedark dark:bg-boxdark lg:hidden"
                            @click.stop="sidebarToggle = !sidebarToggle">
                            <span class="relative block h-5.5 w-5.5 cursor-pointer">
                                <span class="du-block absolute right-0 h-full w-full">
                                    <span
                                        class="relative left-0 top-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-[0] duration-200 ease-in-out dark:bg-white"
                                        :class="{ '!w-full delay-300': !sidebarToggle }"></span>
                                    <span
                                        class="relative left-0 top-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-150 duration-200 ease-in-out dark:bg-white"
                                        :class="{ '!w-full delay-400': !sidebarToggle }"></span>
                                    <span
                                        class="relative left-0 top-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-200 duration-200 ease-in-out dark:bg-white"
                                        :class="{ '!w-full delay-500': !sidebarToggle }"></span>
                                </span>
                                <span class="du-block absolute right-0 h-full w-full rotate-45">
                                    <span
                                        class="absolute left-2.5 top-0 block h-full w-0.5 rounded-sm bg-black delay-300 duration-200 ease-in-out dark:bg-white"
                                        :class="{ '!h-0 delay-[0]': !sidebarToggle }"></span>
                                    <span
                                        class="delay-400 absolute left-0 top-2.5 block h-0.5 w-full rounded-sm bg-black duration-200 ease-in-out dark:bg-white"
                                        :class="{ '!h-0 dealy-200': !sidebarToggle }"></span>
                                </span>
                            </span>
                        </button>
                        <!-- Hamburger Toggle BTN -->
                        <a class="block flex-shrink-0 lg:hidden" href="index.html">
                            <img src="{{ asset('images/logo/LogoJM32.png') }}" alt="Logo" />
                        </a>
                    </div>
                    <div class="hidden sm:block">
                        <form action="https://formbold.com/s/unique_form_id" method="POST">
                            <div class="relative">
                                <button class="absolute left-0 top-1/2 -translate-y-1/2">
                                    <svg class="fill-body hover:fill-primary dark:fill-bodydark dark:hover:fill-primary"
                                        width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.16666 3.33332C5.945 3.33332 3.33332 5.945 3.33332 9.16666C3.33332 12.3883 5.945 15 9.16666 15C12.3883 15 15 12.3883 15 9.16666C15 5.945 12.3883 3.33332 9.16666 3.33332ZM1.66666 9.16666C1.66666 5.02452 5.02452 1.66666 9.16666 1.66666C13.3088 1.66666 16.6667 5.02452 16.6667 9.16666C16.6667 13.3088 13.3088 16.6667 9.16666 16.6667C5.02452 16.6667 1.66666 13.3088 1.66666 9.16666Z"
                                            fill="" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.2857 13.2857C13.6112 12.9603 14.1388 12.9603 14.4642 13.2857L18.0892 16.9107C18.4147 17.2362 18.4147 17.7638 18.0892 18.0892C17.7638 18.4147 17.2362 18.4147 16.9107 18.0892L13.2857 14.4642C12.9603 14.1388 12.9603 13.6112 13.2857 13.2857Z"
                                            fill="" />
                                    </svg>
                                </button>

                                <input type="text" placeholder="Type to search..."
                                    class="w-full bg-transparent pl-9 pr-4 focus:outline-none xl:w-125" />
                            </div>
                        </form>
                    </div>

                    <div class="flex items-center gap-3 2xsm:gap-7">
                        <ul class="flex items-center gap-2 2xsm:gap-4">
                            <li>
                                <!-- Dark Mode Toggler -->
                                <label :class="darkMode ? 'bg-primary' : 'bg-stroke'"
                                    class="relative m-0 block h-7.5 w-14 rounded-full">
                                    <input type="checkbox" :value="darkMode" @change="darkMode = !darkMode"
                                        class="absolute top-0 z-50 m-0 h-full w-full cursor-pointer opacity-0" />
                                    <span :class="darkMode && '!right-1 !translate-x-full'"
                                        class="absolute left-1 top-1/2 flex h-6 w-6 -translate-y-1/2 translate-x-0 items-center justify-center rounded-full bg-white shadow-switcher duration-75 ease-linear">
                                        <span class="dark:hidden">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.99992 12.6666C10.5772 12.6666 12.6666 10.5772 12.6666 7.99992C12.6666 5.42259 10.5772 3.33325 7.99992 3.33325C5.42259 3.33325 3.33325 5.42259 3.33325 7.99992C3.33325 10.5772 5.42259 12.6666 7.99992 12.6666Z"
                                                    fill="#969AA1" />
                                                <path
                                                    d="M8.00008 15.3067C7.63341 15.3067 7.33342 15.0334 7.33342 14.6667V14.6134C7.33342 14.2467 7.63341 13.9467 8.00008 13.9467C8.36675 13.9467 8.66675 14.2467 8.66675 14.6134C8.66675 14.9801 8.36675 15.3067 8.00008 15.3067ZM12.7601 13.4267C12.5867 13.4267 12.4201 13.3601 12.2867 13.2334L12.2001 13.1467C11.9401 12.8867 11.9401 12.4667 12.2001 12.2067C12.4601 11.9467 12.8801 11.9467 13.1401 12.2067L13.2267 12.2934C13.4867 12.5534 13.4867 12.9734 13.2267 13.2334C13.1001 13.3601 12.9334 13.4267 12.7601 13.4267ZM3.24008 13.4267C3.06675 13.4267 2.90008 13.3601 2.76675 13.2334C2.50675 12.9734 2.50675 12.5534 2.76675 12.2934L2.85342 12.2067C3.11342 11.9467 3.53341 11.9467 3.79341 12.2067C4.05341 12.4667 4.05341 12.8867 3.79341 13.1467L3.70675 13.2334C3.58008 13.3601 3.40675 13.4267 3.24008 13.4267ZM14.6667 8.66675H14.6134C14.2467 8.66675 13.9467 8.36675 13.9467 8.00008C13.9467 7.63341 14.2467 7.33342 14.6134 7.33342C14.9801 7.33342 15.3067 7.63341 15.3067 8.00008C15.3067 8.36675 15.0334 8.66675 14.6667 8.66675ZM1.38675 8.66675H1.33341C0.966748 8.66675 0.666748 8.36675 0.666748 8.00008C0.666748 7.63341 0.966748 7.33342 1.33341 7.33342C1.70008 7.33342 2.02675 7.63341 2.02675 8.00008C2.02675 8.36675 1.75341 8.66675 1.38675 8.66675ZM12.6734 3.99341C12.5001 3.99341 12.3334 3.92675 12.2001 3.80008C11.9401 3.54008 11.9401 3.12008 12.2001 2.86008L12.2867 2.77341C12.5467 2.51341 12.9667 2.51341 13.2267 2.77341C13.4867 3.03341 13.4867 3.45341 13.2267 3.71341L13.1401 3.80008C13.0134 3.92675 12.8467 3.99341 12.6734 3.99341ZM3.32675 3.99341C3.15341 3.99341 2.98675 3.92675 2.85342 3.80008L2.76675 3.70675C2.50675 3.44675 2.50675 3.02675 2.76675 2.76675C3.02675 2.50675 3.44675 2.50675 3.70675 2.76675L3.79341 2.85342C4.05341 3.11342 4.05341 3.53341 3.79341 3.79341C3.66675 3.92675 3.49341 3.99341 3.32675 3.99341ZM8.00008 2.02675C7.63341 2.02675 7.33342 1.75341 7.33342 1.38675V1.33341C7.33342 0.966748 7.63341 0.666748 8.00008 0.666748C8.36675 0.666748 8.66675 0.966748 8.66675 1.33341C8.66675 1.70008 8.36675 2.02675 8.00008 2.02675Z"
                                                    fill="#969AA1" />
                                            </svg>
                                        </span>
                                        <span class="hidden dark:inline-block">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.3533 10.62C14.2466 10.44 13.9466 10.16 13.1999 10.2933C12.7866 10.3667 12.3666 10.4 11.9466 10.38C10.3933 10.3133 8.98659 9.6 8.00659 8.5C7.13993 7.53333 6.60659 6.27333 6.59993 4.91333C6.59993 4.15333 6.74659 3.42 7.04659 2.72666C7.33993 2.05333 7.13326 1.7 6.98659 1.55333C6.83326 1.4 6.47326 1.18666 5.76659 1.48C3.03993 2.62666 1.35326 5.36 1.55326 8.28666C1.75326 11.04 3.68659 13.3933 6.24659 14.28C6.85993 14.4933 7.50659 14.62 8.17326 14.6467C8.27993 14.6533 8.38659 14.66 8.49326 14.66C10.7266 14.66 12.8199 13.6067 14.1399 11.8133C14.5866 11.1933 14.4666 10.8 14.3533 10.62Z"
                                                    fill="#969AA1" />
                                            </svg>
                                        </span>
                                    </span>
                                </label>
                                <!-- Dark Mode Toggler -->
                            </li>


                    </div>
            </header>

            <!-- ===== Header End ===== -->

            <!-- ===== Main Content Start ===== -->
            <main>
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                    @yield('content')
                </div>
            </main>
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script defer src="{{ asset('js/bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
