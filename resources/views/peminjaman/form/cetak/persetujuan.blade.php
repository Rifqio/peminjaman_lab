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
            margin-left: 50px
        }

        .data {
            text-align: left;
        }
        .subjudul {
            text-align: center;
        }

        .header {
            display: flex;
        }

        .bold {
            font-weight: 800;
        }

        #nama {
            margin-left: 174px;
        }

        #nim {
            margin-left: 151.5px;
        }

        #prodi {
            margin-left: 120px;
        }

        #penelitian {
            margin-left: 110px;
        }

        #keterangan {
            margin-left: 139.5px;
        }

        #sumber_dana {
            margin-left: 125.5px;
        }

        #pembimbing {
            margin-left: 2px;
        }

        #hp {
            margin-left: 137px;
        }

        #email {
            margin-left: 175.5px;
        }

        #alamat {
            margin-left: 166.5px;
        }

        #waktu {
            margin-left: 88px;
        }


        .logo {
            max-width: 22%;
            transform: translateY(5px)
        }

        .tanda-tangan-dosen {
            width: 100vh;
            max-width: 30%;
            float: right;
            text-align: center;
        }

        .tanda-tangan-kepala-lab {
            width: 100vh;
            max-width: 30%;
            float: left;
            text-align: center;
        }

        .keterangan {
            font-weight: bold;
            margin-top: 200px;
            margin-left: -200px;
            width: 100vh;
            float: left;
        }

        .margin-ttd {
            margin-top: 60px;
        }

        .content {
            transform: translateY(-120px)
        }
    </style>
    <table>
        <tr>
            <td> <img class="logo"
                    src="https://i0.wp.com/uns.ac.id/id/wp-content/uploads/logo-uns-biru.png?fit=528%2C526&ssl=1"
                    alt=""></td>

        </tr>
    </table>
    <div class="content">
        <div class="judul">
            <h4>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h4>
            <h4>UNIVERSITAS SEBELAS MARET</h4>
            <h4>FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</h4>
            <h3>LABORATORIUM TERPADU</h3>
            <h5>Jl. Ir. Sutami 36A Kentingan Surakarta 57216, Telp. 0271669376, Fax. 0271663375</h5>
        </div>
        <hr style="text-align:center">
        @foreach ($data as $d )
        <div class="subjudul">
            <h4>SURAT PERSETUJUAN AKSES LABORATORIUM <br> FAKULTAS MIPA <br>No: {{ $d->no_surat }} </br></h4> <br>
        </div>
        <div class="data">
            <p>
                Nama <span id="nama">:</span> {{ $d->name }} <br>
                NIM/NIP <span id="nim">:</span> {{ $d->nim }} <br>
                Program Studi <span id="prodi">:</span> {{ $d->nama_prodi }} <br>
                Judul Penelitian <span id="penelitian">:</span> {{ $d->judul_penelitian }} <br>
                Keterangan <span id="keterangan">:</span> {{ $d->keterangan }} <br>
                Sumber Dana <span id="sumber_dana">:</span> {{ $d->sumber_dana }} <br>
                Pembimbing / Penanggungjawab <span id="pembimbing">:</span> {{ $d->pembimbing }} <br>
                Telepon HP <span id="hp">:</span> {{ $d->phone }} <br>
                Email <span id="email">:</span> {{ $d->email }} <br>
                Alamat <span id="alamat">:</span> {{ $d->alamat }} <br>
                Waktu Pelaksanaan <span id="waktu">:</span> Tanggal
                {{\Carbon\Carbon::parse($d->tanggal_awal_peminjaman)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                sampai tanggal {{\Carbon\Carbon::parse($d->tanggal_akhir_peminjaman)->locale('id_ID')->isoFormat('D MMMM YYYY')  }} <br>
            </p>
        </div>
        <br>
        <div class="tanda-tangan-kepala-lab">
            <p>Menyetujui<br>
                Kepala Lab Biologi
             </p>
             <div class="margin-ttd"> </div>
             <p class="margin-ttd">Nama Dosen<br>
                 NIP. Dosen
             </p>
        </div>
        <div class="tanda-tangan-dosen">
                <p>Menyetujui<br>
                   Kepala Lab MIPA Terpadu
                </p>
                <div class="margin-ttd"> </div>
                <p class="margin-ttd">Nama Dosen<br>
                    NIP. Dosen
                </p>
        </div>
        <br>
        <div class="keterangan">
            <p>Keterangan : <br>
               1) Berlaku 6 Bulan per tanggal permohonan akses lab atau menurut waktu yang ditentukan sesuai kesepakatan <br>
               2) Menyetujui Kepala Laboratorium yang dituju <br>
               3) Surat persetujuan akses laboratorium dibuat sejumlah laboratorium yang akan dituju
            </p>
        </div>
    </div>
    @endforeach
</body>

</html>
