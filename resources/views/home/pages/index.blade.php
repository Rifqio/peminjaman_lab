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

            <!-- Modal -->
            @if (Auth::user()->mahasiswa->nim === null)
                <div class="modal fade" id="exampleModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-bold" id="exampleModalLabel">Informasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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
    </div>
@endsection
