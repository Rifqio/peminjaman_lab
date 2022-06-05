@extends('home.layouts.layout')

@section('container')
<div class="px-2 ">
    <div class="flex flex-no-wrap items-start">
        <div class="w-full m-auto ">
            <div class="py-4 px-2">
                <div class="bg-white rounded shadow mt-7 py-7">

                    <div class="mt-10 px-7">
                        <p class="text-xl font-semibold leading-tight text-gray-800">Form Surat Bebas Lab</p>
                        <form action="{{ url('bebas-lab') }}" method="post">
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
                                    <p class="text-base font-medium leading-none text-gray-800">Dalam Rangka</p>
                                    <input
                                        class="w-full p-3 mt-4 border border-gray-300 rounded outline-none focus:bg-gray-50" name="keterangan">
                                </div>

                                <div>
                                    <p class="text-base font-medium leading-none text-gray-800">Judul Kegiatan</p>
                                    <input
                                        class="w-full p-3 mt-4 border border-gray-300 rounded outline-none focus:bg-gray-50" name="judul">
                                </div>
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
