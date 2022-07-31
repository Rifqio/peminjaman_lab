@extends('guest.layouts.layout')
@section('container')
    <!-- component -->
    <div class="sm:px-6 w-full">
        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        <div class="px-4 md:px-10 py-4 md:py-7">
            <div class="flex items-center justify-between">
                <p tabindex="0"
                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                    Daftar Status Uji Sampel</p>
            </div>
            <div class="alert alert-primary d-flex align-items-center mt-2" role="alert">
                <i class="fa-solid fa-circle-info mr-4"></i>
                <div>
                    Silahkan upload bukti pembayaran dengan mengklik status pembayaran
                </div>
            </div>
        </div>
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">

            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <tbody>
                        <th>Nama Sampel</th>
                        <th>Nomor Pembayaran</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status Pembayaran</th>

                        @foreach ($data as $data)
                            <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">

                                {{-- Title --}}
                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                            {{ $data->nama_sampel }}</p>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                            {{ $data->no_pembayaran }}</p>
                                    </div>
                                </td>

                                {{-- Keterangan --}}
                                <td class="">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M9.16667 2.5L16.6667 10C17.0911 10.4745 17.0911 11.1922 16.6667 11.6667L11.6667 16.6667C11.1922 17.0911 10.4745 17.0911 10 16.6667L2.5 9.16667V5.83333C2.5 3.99238 3.99238 2.5 5.83333 2.5H9.16667"
                                                stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <circle cx="7.50004" cy="7.49967" r="1.66667" stroke="#52525B"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round">
                                            </circle>
                                        </svg>
                                        <p class="text-sm leading-none text-gray-600 ml-2"> {{ $data->no_surat }} </p>
                                    </div>
                                </td>

                                <td class="pl-5">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path d="M7.5 5H16.6667" stroke="#52525B" stroke-width="1.25"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M7.5 10H16.6667" stroke="#52525B" stroke-width="1.25"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M7.5 15H16.6667" stroke="#52525B" stroke-width="1.25"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4.16669 5V5.00667" stroke="#52525B" stroke-width="1.25"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4.16669 10V10.0067" stroke="#52525B" stroke-width="1.25"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4.16669 15V15.0067" stroke="#52525B" stroke-width="1.25"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-sm leading-none text-gray-600 ml-2">
                                            {{ \Carbon\Carbon::parse($data->tanggal_masuk)->format('j F, Y') }}
                                        </p>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}"
                                            class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">{{ $data->status }}</button>
                                        {{-- Modal --}}
                                        <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form id="fileUploadForm" action="{{ route('upload-bukti') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Status Pembayaran
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                <p class="text-lg font-semibold">Kode Pembayaran Anda</p>
                                                                <p class="m-4 font-bold text-3xl text-blue-500">
                                                                    {{ $data->no_pembayaran }}</p>
                                                                <p class="text-lg font-semibold capitalize">Dengan jumlah
                                                                    sebesar</p>
                                                                <p class="m-4 font-bold text-3xl text-blue-500">Rp50.000
                                                                </p>
                                                            </div>
                                                            <div class="bg-gray-200 w-[220px] h-0.5 m-auto"></div>
                                                            <div class="text-justify mt-4 mb-4">
                                                                <p class="capitalize mb-2">Silahkan upload bukti pembayaran anda
                                                                    disini</p>
                                                                <input type="file" name="bukti_pembayaran">
                                                                <input type="hidden" name="pembayaran_id" value="{{ $data->id }}">
                                                                <div class="progress mt-2">
                                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                                </div>
                                                            </div>
                                                            @if ( $data->url_bukti_pembayaran )
                                                            <button class="bg-green-500 py-2 w-full text-white font-semibold text-md rounded-sm hover:bg-green-800">
                                                                <a href="/storage/{{ $data->url_bukti_pembayaran }}" target="_blank" class="hover:text-white" > Sudah diunggah, Lihat dokumen </a>
                                                            </button>
                                                            <input type="hidden" name="old_image" value="{{ $data->url_bukti_pembayaran }}">
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="bg-blue-600 hover:shadow-xl  px-6 py-2 rounded-md text-white font-semibold">Submit</button>
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="./index.js"></script>
    <style>
        .checkbox:checked+.check-icon {
            display: flex;
        }
    </style>
    <script>
        function dropdownFunction(element) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            let list = element.parentElement.parentElement.getElementsByClassName("dropdown-content")[0];
            list.classList.add("target");
            for (i = 0; i < dropdowns.length; i++) {
                if (!dropdowns[i].classList.contains("target")) {
                    dropdowns[i].classList.add("hidden");
                }
            }
            list.classList.toggle("hidden");
        }
        $(function () {
            $(document).ready(function () {
                $('#fileUploadForm').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function (xhr) {
                        location.reload(true);
                    }
                });
            });
        });
    </script>
@endsection
