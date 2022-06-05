@extends('home.layouts.layout')

@section('container')
<div class="px-2 ">
    <div class="flex flex-no-wrap items-start">
        <div class="w-full m-auto ">
            <div class="py-4 px-2">
                <div class="bg-white rounded shadow mt-7 py-7">

                    <div class="mt-10 px-7">
                        <p class="text-xl font-semibold leading-tight text-gray-800">Form Surat Peminjaman Lab</p>
                        <form action="{{ url('peminjaman') }}" method="post">
                            @csrf
                            <div class="grid w-full grid-cols-1 lg:grid-cols-2 md:grid-cols-1 gap-7 mt-7 ">

                                <div>
                                    <p class="text-base font-medium leading-none text-gray-800">Nama Lengkap</p>
                                    <input
                                        class="w-full p-3 mt-4 border border-gray-300 rounded outline-none focus:bg-gray-50"
                                        disabled value="{{ Auth::user()->name }}">
                                </div>
                                <div>
                                    <p class="text-base font-medium leading-none text-gray-800">NIM</p>
                                    <input
                                        class="w-full p-3 mt-4 border border-gray-300 rounded outline-none focus:bg-gray-50"
                                        disabled value="{{ Auth::user()->mahasiswa->nim }}">
                                </div>
                                <div>
                                    <p class="text-base font-medium leading-none text-gray-800">No Telepon</p>
                                    <input
                                        class="w-full p-3 mt-4 border border-gray-300 rounded outline-none focus:bg-gray-50"
                                        disabled value="{{ Auth::user()->mahasiswa->phone }}">
                                </div>

                                <div>
                                    <p class="text-base font-medium leading-none text-gray-800">Prodi</p>
                                    @foreach ($prodi as $prod)
                                    <input
                                        class="w-full p-3 mt-4 border border-gray-300 rounded outline-none focus:bg-gray-50"
                                        disabled value="{{ $prod->nama_prodi }}">
                                    @endforeach
                                </div>
                                <div>
                                    <p class="text-base font-medium leading-none text-gray-800 pb-4">Ruang Lab</p>
                                    <div class="relative top-1">
                                        <select
                                            class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-state" name="ruang_lab_id">
                                            <option value="">Pilih Ruang</option>
                                            @foreach ($ruangan as $ruang)
                                            <option
                                                class="relative flex items-center justify-between w-full pl-5 py-4 dropbtn-one"
                                                value="{{ $ruang->id }}">{{ $ruang->nama_ruang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-base font-medium leading-none text-gray-800">Pembimbing</p>
                                    <input type="text"
                                        class="w-full p-3 mt-4 border border-gray-300 rounded outline-none focus:bg-gray-50"
                                        name="pembimbing">
                                </div>

                                <div>
                                    <p class="text-base font-medium leading-none text-gray-800">Keterangan</p>
                                    <input type="text"
                                        class="w-full p-3 mt-4 border border-gray-300 rounded outline-none focus:bg-gray-50"
                                        name="keterangan">
                                </div>

                                <div>
                                    <p class="text-base font-medium leading-none text-gray-800">Sumber Dana</p>
                                    <input type="text"
                                        class="w-full p-3 mt-4 border border-gray-300 rounded outline-none focus:bg-gray-50"
                                        name="sumber_dana">
                                </div>

                                <div>
                                    <p class="text-base font-medium leading-none text-gray-800">Tanggal Awal Peminjaman
                                    </p>
                                    <input type="date"
                                        class="w-full p-3 mt-4 border border-gray-300 rounded outline-none focus:bg-gray-50"
                                        name="tanggal_awal_peminjaman">
                                </div>

                                <div>
                                    <p class="text-base font-medium leading-none text-gray-800">Tanggal Akhir Peminjaman
                                    </p>
                                    <input type="date"
                                        class="w-full p-3 mt-4 border border-gray-300 rounded outline-none focus:bg-gray-50"
                                        name="tanggal_akhir_peminjaman">
                                </div>

                            </div>
                    </div>
                    <div class="pt-6 border-gray-300 mt-2 px-7">
                        <p class="text-base font-semibold leading-4 text-gray-800">Judul Penelitian</p>
                        <div class="mt-10 border border-gray-300 rounded">
                            <textarea name="judul_penelitian"
                            id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."> </textarea>
                        </div>
                    </div>
                    <hr class="h-[1px] bg-gray-100 my-14">
                    <div
                        class="flex flex-col flex-wrap items-center justify-center w-full px-7 lg:flex-row lg:justify-end md:justify-end gap-x-4 gap-y-4">
                        <button type="submit"
                            class="bg-indigo-700 rounded hover:bg-indigo-600 transform duration-300 ease-in-out text-sm font-medium px-6 py-4 text-white lg:max-w-[144px] w-full ">
                            Save Changes
                        </button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
