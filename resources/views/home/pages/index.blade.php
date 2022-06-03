@extends('home.layouts.layout')

@section('container')
{{-- <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @elseif (session()->has('warning'))
        <div class="alert alert-danger" role="alert">
            {{ session('warning') }}
        </div>
        @endif
        <h1>Selamat Datang, Silahkan Pilih Layanan yang Tersedia</h1>

        <button><a href="peminjaman">Isi Form Peminjaman Lab</a></button>
        <button>Permintaan Surat Bebas Lab</button>

        <!-- Modal -->
        @if (Auth::user()->mahasiswa->nim === null)
        <div class="modal fade" id="exampleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-bold" id="exampleModalLabel">Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Silahkan melengkapi profil di halaman profile sebelum melakukan transaksi
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div> --}}

<div class="w-full py-16">
    <h1 class="block capitalize font-semibold text-2xl text-center pb-24">Selamat datang, silahkan pilih layanan yang
        tersedia</h1>
    <div class="container mx-auto px-6 flex items-start justify-center">

        <div aria-label="group of cards" class="w-full">
            <!-- Card is full width. Use in 12 col grid for best view. -->
            <!-- Card code block start -->
            <div class="flex flex-col lg:flex-row mx-auto bg-white dark:bg-gray-800 shadow rounded">
                <div class="w-full lg:w-1/3 px-12 flex flex-col items-center py-10 hover:bg-gray-50">
                    <div
                        class="mb-3 w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center cursor-pointer text-indigo-700">
                        <i class="fa-solid fa-flask-vial text-4xl"></i>
                    </div>
                    <a href="/peminjaman" tabindex="0"
                        class="focus:outline-none focus:opacity-75 hover:opacity-75 text-gray-800 dark:text-gray-100 cursor-pointer focus:underline">
                        <h2 class=" text-xl tracking-normal font-medium mb-1">Surat Ijin Akses Lab</h2>
                    </a>
                    <p
                        class="text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-8 text-center w-10/12">
                        The more I deal with the work as something that is my own, as something that is personal, the
                        more successful it is.</p>

                </div>
                <div
                    class="w-full lg:w-1/3 px-12 border-t border-b lg:border-t-0 lg:border-b-0 lg:border-l hover:bg-gray-50 lg:border-r border-gray-300 flex flex-col items-center py-10">
                    <div
                        class="mb-3 w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center cursor-pointer text-indigo-700">
                        <i class="fa-solid fa-envelope text-4xl"></i>

                    </div>
                    <a tabindex="0"
                        class="cursor-pointer  focus:opacity-75 focus:underline hover:opacity-75  focus:outline-none text-gray-800 dark:text-gray-100 text-xl tracking-normal text-center font-medium mb-1">Surat
                        Ijin Bebas Lab</a>
                    <p
                        class="text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-8 text-center w-10/12">
                        John is a true asset to us, providing advanced designing skills from years of experience as UX
                        designer.</p>

                </div>
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
    </div>
</div>
@if (session()->has('success'))
    <x-alert-badge :message="session('success')"/>
@endif

@endsection
