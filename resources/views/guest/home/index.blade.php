@extends('guest.layouts.layout')
@section('container')
<div class="w-full py-16">
    <h1 class="block capitalize font-semibold text-2xl text-center pb-14">Selamat datang, silahkan pilih layanan yang
        tersedia</h1>

    <div class="w-full flex items-center justify-center">
        <div class="xl:w-1/4 sm:w-1/2 w-[512px] flex flex-col items-center py-16 md:py-12 bg-white border border-black rounded-lg shadow-sm">
            <div class="w-full flex items-center justify-center">
                <div class="flex flex-col items-center">
                    <div
                        class="mb-3 w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center cursor-pointer text-indigo-700">
                        <i class="fa-solid fa-vial text-4xl"></i>
                    </div>
                    <a href="/guest/menu-pengujian-sampel" tabindex="0" class="focus:outline-none mt-2 text-xs sm:text-sm md:text-xl font-semibold text-center text-indigo-600">Pengujian Data Sampel</a>
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
