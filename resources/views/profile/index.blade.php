@extends('home.layouts.layout')
@section('container')
<div class="container min-h-screen">
    <div class="col-6 m-auto">
        <div class="row mt-3">
            <form action="/profile" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" value="{{ Auth::user()->mahasiswa->nim }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Prodi</label>
                    <select name="prodi_id" class="form-select @error('prodi') is-invalid @enderror">
                        @foreach ($prodi as $prodi)
                         <option value="{{ $prodi->id }}" {{ $prodi->id == Auth::user()->mahasiswa->prodi_id ? 'selected' : '' }} >{{ $prodi->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Angkatan</label>
                    <input type="text" name="angkatan" class="form-control"
                        value="{{ Auth::user()->mahasiswa->angkatan }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Hp</label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ Auth::user()->mahasiswa->phone }}">
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
