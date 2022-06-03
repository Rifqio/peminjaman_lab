@extends('admin.layout.layout')
@section('container')
    <div class="w-full sm:px-6 pt-8">
        <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg">
            <div class="sm:flex items-center justify-between">
                <p tabindex="0"
                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800  ">
                    Daftar Peminjaman Lab</p>
            </div>
        </div>
        <div class="bg-white shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 overflow-y-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 ">
                        <th class="font-normal text-left pl-4">Ruang Lab</th>
                        <th class="font-normal text-left pl-12">Keterangan</th>
                        <th class="font-normal text-left pl-12">Tanggal Peminjaman</th>
                        <th class="font-normal text-left pl-20">Peminjam</th>
                    </tr>
                </thead>
                <tbody class="w-full">
                    @foreach ($peminjam as $data)
                        <tr tabindex="0"
                            class="focus:outline-none h-20 text-sm leading-none text-gray-800  bg-white  hover:bg-gray-100   border-b border-t border-gray-100">
                            <td class="pl-4 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="w-10 h-10">
                                        <img class="w-full h-full"
                                            src="https://cdn.tuk.dev/assets/templates/olympus/projects.png"
                                            alt="UX Design and Visual Strategy" />
                                    </div>
                                    <div class="pl-4">
                                        <p class="font-medium">{{ $data->nama_ruang }}</p>
                                        <p class="text-xs leading-3 text-gray-600 pt-2">{{ $data->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="pl-12">
                                <p class="text-sm font-medium leading-none text-gray-800 ">{{ $data->keterangan }}</p>
                            </td>
                            <td class="pl-12">
                                <p class="font-medium">
                                    {{ \Carbon\Carbon::parse($data->tanggal_awal_peminjaman)->format('j F, Y') }}</p>
                            </td>
                            <td class="pl-20">
                                <p class="font-medium">{{ $data->name }}</p>
                            </td>
                            <td class="px-7 2xl:px-0 inline-flex">
                                {{-- <form action="{{ url('daftar-peminjam') }}" class="m-0 p-0" method="POST">
                                <input type="hidden" name="status_id" value="1">
                                <button class="inline" type="submit"><a href="/daftar-peminjam/{{ $data->id }}">Approve</a></button>
                            </form>
                            <form action="">
                                <button>Tolak</button>
                            </form> --}}

                                <button type="button" class="" data-bs-toggle="modal"
                                    data-bs-target="#approveModal">
                                    Approve
                                </button>
                                <button type="button" class="" data-bs-toggle="modal"
                                    data-bs-target="#disapprovedModal">
                                    Disapproved
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Button trigger modal -->


            <!-- Modal Aproved -->
            <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="approveModalLabel">Approvement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to approve this file?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="" data-bs-dismiss="modal">Close</button>
                            <form action="{{ url('daftar-peminjam/update') }}" method="POST">
                                @csrf
                                @method('put')
                                <input type="hidden" name="status_id" value="{{ Crypt::encrypt(2) }}">
                                <input type="hidden" name="id" value="{{ Crypt::encrypt($data->id) }}">
                                <button type="submit" class="">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Disaproved -->
            <div class="modal fade" id="disapprovedModal" tabindex="-1" aria-labelledby="disapprovedModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="disapprovedModalLabel">Disapprovement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to disapproved this file?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="" data-bs-dismiss="modal">Close</button>
                            <form action="{{ url('daftar-peminjam/tolak') }}" method="POST">
                                @csrf
                                @method('put')
                                <input type="hidden" name="status_id" value="{{ Crypt::encrypt(3) }}">
                                <input type="hidden" name="id" value="{{ Crypt::encrypt($data->id) }}">
                                <button type="submit">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
