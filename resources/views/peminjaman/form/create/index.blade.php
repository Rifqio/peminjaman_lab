@extends('home.layouts.layout')

@section('container')
    <div class="container min-h-screen">
        <div class="col-6 m-auto">
            <div class="row mt-3">
                <form action="/peminjaman" method="post">
                    @csrf
                    @if (session()->has('warning'))
                        <div class="alert alert-danger" role="alert">
                            <h1>{{ session('warning') }}</h1>
                        </div>
                    @endif
                    {{-- <div class="mb-3">
                        <label class="form-label">Keterangan Peminjaman</label>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">Pilih Ruang</label>
                        <select name="ruang_lab_id" class="form-select @error('ruang_lab_id') is-invalid @enderror">
                            <option value="">Silahkan Pilih</option>
                            @foreach ($ruangan as $ruang)
                                <option value="{{ $ruang->id }}">{{ $ruang->nama_ruang }}</option>
                            @endforeach
                        </select>
                        @error('ruang_lab_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan Peminjaman</label>
                        <input type="text" class="form-control" name="keterangan" value="{{ old('keterangan') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Waktu Mulai Peminjaman</label>
                        <input type="datetime-local"
                            class="form-control  @error('tanggal_awal_peminjaman') is-invalid @enderror"
                            name="tanggal_awal_peminjaman" value={{ old('tanggal_awal_peminjaman') }}>
                        @error('tanggal_awal_peminjaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sampai</label>
                        <input type="datetime-local" class="form-control" name="tanggal_akhir_peminjaman"
                            value={{ old('tanggal_akhir_peminjaman') }}>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
