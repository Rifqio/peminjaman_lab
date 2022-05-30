@extends('admin.layout.layout')
@section('container')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <h1>Selamat Datang, {{ auth()->user()->name }}</h1>
        <button><a href="daftar-peminjam">Cek Daftar Peminjam</a></button>
    </div>
</div>


@endsection
