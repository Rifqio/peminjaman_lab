@extends('home.layouts.layout')
@section('container')
<div class="container min-h-screen">
    <div class="col-6 m-auto">
        <div class="row mt-3">
            <form action="/peminjaman" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->mahasiswa->nim }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Prodi</label>
                    <select name="prodi" class="form-select @error('prodi') is-invalid @enderror">
                        @foreach ($prodi as $prodi)
                        <option value="{{ $prodi->id }}" selected>{{ $prodi->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Angkatan</label>
                    <input type="text" name="angkatan" class="form-control"
                        value="{{ Auth::user()->mahasiswa->angkatan }}">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
