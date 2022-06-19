@extends('guest.layouts.layout')
@section('container')
<div class="w-full py-16">
    <h1 class="block capitalize font-semibold text-2xl text-center pb-14">Selamat datang, silahkan pilih layanan yang
        tersedia</h1>
    {{-- <div class="container mx-auto px-6 flex items-start justify-center">
        <div class="w-full">
            <div class="flex flex-col lg:flex-row mx-auto bg-white dark:bg-gray-800 shadow rounded">
                <div
                    class="w-full lg:w-1/3 px-12 border-t border-b lg:border-t-0 lg:border-b-0 lg:border-l hover:bg-gray-50 lg:border-r border-gray-300 flex flex-col items-center py-10">
                    <div
                        class="mb-3 w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center cursor-pointer text-indigo-700">
                        <i class="fa-solid fa-vial text-4xl"></i>
                    </div>
                    <a tabindex="0"
                        class="cursor-pointer  focus:opacity-75 focus:underline hover:opacity-75  focus:outline-none text-gray-800 dark:text-gray-100 text-xl tracking-normal text-center font-medium mb-1">Pengujian
                        Data Sampel</a>
                    <p
                        class="text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-8 text-center w-10/12">
                        John is a true asset to us, providing advanced designing skills from years of experience as UX
                        designer.</p>

                </div>
            </div>
            <!-- Card code block end -->
        </div>
    </div> --}}

    <div class="w-full flex items-center justify-center">
        <div class="xl:w-1/4 sm:w-1/2 w-full 2xl:w-1/5 flex flex-col items-center py-16 md:py-12 bg-white border border-black rounded-lg shadow-sm">
            <div class="w-full flex items-center justify-center">
                <div class="flex flex-col items-center">
                    <div
                        class="mb-3 w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center cursor-pointer text-indigo-700">
                        <i class="fa-solid fa-vial text-4xl"></i>
                    </div>
                    <a href="/guest/pengujian-sampel" tabindex="0" class="focus:outline-none mt-2 text-xs sm:text-sm md:text-xl font-semibold text-center text-indigo-600">Pengujian Data Sampel</a>
                </div>
            </div>
            <div class="flex items-center mt-7">
               <p class="text-center text-gray-500 font-light max-w-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, sint.</p>
            </div>
        </div>
    </div>

</div>
@if (session()->has('success'))
    <x-alert-badge :message="session('success')" />
@elseif (session()->has('warning'))
    <x-danger-toast :message="session('warning')" />
@endif

@endsection
