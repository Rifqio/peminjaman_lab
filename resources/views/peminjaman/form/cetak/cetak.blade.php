<!DOCTYPE html>
<html>

<head>
    <title>Cetak Surat Peminjaman Lab</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <style type="text/css">
        .judul {
            line-height: 20%;
            text-align: center;
        }

        .header {
            display: flex;
        }

        .bold {
            font-weight: 800;
        }

        #nama {
            margin-left: 80px;
        }

        #nim {
            margin-left: 57px;
        }

        #email {
            margin-left: 80px;
        }

        #prodi {
            margin-left: 25px;
        }

        #alamat {
            margin-left: 71px;
        }

        #hp {
            margin-left: 41px;
        }

        .logo {
            max-width: 20%;
            display: flex;
            transform: translateY(120px);
        }

        .tanda-tangan {
            width: 100vh;
            max-width: 30%;
            float: right;
        }
    </style>
    <div class="header">
        {{-- <img class="logo"
            src="https://i0.wp.com/uns.ac.id/id/wp-content/uploads/logo-uns-biru.png?fit=528%2C526&ssl=1" alt=""> --}}
        <div class="judul">
            <h4>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h4>
            <h4>UNIVERSITAS SEBELAS MARET</h4>
            <h4>FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</h4>
            <h3>LABORATORIUM TERPADU</h3>
            <h5>Jl. Ir. Sutami 36A Kentingan Surakarta 57216, Telp. 0271669376, Fax. 0271663375</h5>
            <hr>
        </div>
    </div>
    <p>Hal : Permohonan Ijin Akses Lab</p>
    <br>
    <p>Kepada Yth. <br>
        Kepala Laboratorium MIPA Terpadu FMIPA <br>
        Universitas Sebelas Maret
    </p>
    <br>
    @foreach ($data as $d )
    <p>Saya yang bertanda tangan di bawah ini:<br>
        Nama <span id="nama">:</span> {{ $d->name }} <br>
        NIM/NIP <span id="nim">:</span> {{ $d->nim }} <br>
        Email <span id="email">:</span> {{ $d->email }} <br>
        Program Studi <span id="prodi">:</span> {{ $d->nama_prodi }} <br>
        Alamat <span id="alamat">:</span> {{ $d->alamat }} <br>
        Telepon HP <span id="hp">:</span> {{ $d->phone }}
    </p>

    <p>Dalam rangka penelitian: <span class="bold"> {{ $d->keterangan }}</span> dengan judul: <br>
        <span class="bold">{{ $d->judul_penelitian }}</span> <br>
        Mohon untuk dapat diijinkan untuk menggunakan fasilitas laboratorium di lingkungan Fakultas MIPA
        sebagai berikut: <br>
        {{ $d->nama_ruang }}
    </p>
    <br>
    <br>
    <div class="tanda-tangan">
        <p>Surakarta, {{ \Carbon\Carbon::now()->locale('id_ID')->isoFormat('D MMMM YYYY') }}<br>
            Mahasiswa / Peneliti
        </p>
        <br>
        <p>{{ $d->name }}<br>
            NIP/NIM {{ $d->nim }}
        </p>
    </div>
    @endforeach

</body>

</html>
