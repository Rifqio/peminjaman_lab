@extends('home.layouts.layout')

@section('container')
<div class="py-12">
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
    </div>
</div>

@endsection
