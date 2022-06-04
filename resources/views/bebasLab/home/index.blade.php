@extends('home.layouts.layout')

@section('container')
<div class="py-16">

    <div class="2xl:container 2xl:mx-auto lg:px-20 md:py-12 md:px-6 py-9 px-4">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 lg:gap-8 gap-6">
            <div class="p-6 bg-gray-50">
                <i class="fa-solid fa-list-ul text-indigo-700 text-lg"></i>
                <p class="text-xl text-gray-800 font-semibold leading-5 mt-6">Buat Form Bebas Lab</p>
                <p class="font-normal text-base leading-6 text-gray-600 my-4">Silahkan mengisi form untuk melakukan bebas lab</p>
                <a href="bebas-lab/create" class="cursor-pointer text-base leading-4 font-medium text-gray-800 border-b-2 border-gray-800 hover:text-gray-600">Akses Disini</a>
            </div>

            <div class="p-6 bg-gray-50">
                <i class="fa-solid fa-bars-progress text-indigo-700 text-lg"></i>
                <p class="text-xl text-gray-800 font-semibold leading-5 mt-6">Cek Status</p>
                <p class="font-normal text-base leading-6 text-gray-600 my-4"> Cek status form bebas lab anda disini</p>
                <a href="bebas-lab/status" class="cursor-pointer text-base leading-4 font-medium text-gray-800 border-b-2 border-gray-800 hover:text-gray-600">Akses Disini</a>
            </div>

        </div>
    </div>

</div>

@endsection
