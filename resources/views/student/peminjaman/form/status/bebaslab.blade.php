@extends('student.home.layouts.layout')
@section('container')
<!-- component -->
<div class="sm:px-6 w-full">
    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
    <div class="px-4 md:px-10 py-4 md:py-7">
        <div class="flex items-center justify-between">
            <p tabindex="0"
                class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                Daftar Status Peminjaman</p>

        </div>
    </div>
    <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">

        <div class="mt-7 overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tbody>
                    @foreach ($data as $data)
                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td>
                            <div class="ml-5">
                            </div>
                        </td>
                        {{-- Title --}}
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                    {{ $data->keterangan }}</p>
                            </div>
                        </td>

                        {{-- Keterangan --}}
                        <td class="pl-24">
                            <div class="flex items-center">

                            </div>
                        </td>

                        <td class="pl-5">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path d="M7.5 5H16.6667" stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
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
                                    {{ \Carbon\Carbon::parse($data->created_at)->format('j F, Y') }}
                                </p>
                            </div>
                        </td>

                        <td class="pl-2">
                            @if ($data->status_id == 1)
                            <button
                                class="py-3 px-3 text-sm focus:outline-none leading-none text-gray-700 bg-gray-100 rounded">{{
                                $data->status }}</button>
                            @elseif ($data->status_id == 2)
                            <button
                                class="py-3 px-3 text-sm focus:outline-none leading-none text-yellow-700 bg-yellow-100 rounded">{{
                                $data->status }}</button>
                            @elseif ($data->status_id == 3)
                            <button
                                class="py-3 px-3 text-sm focus:outline-none leading-none text-yellow-700 bg-yellow-100 rounded">{{
                                $data->status }}</button>
                            @elseif ($data->status_id == 4)
                            <button
                                class="py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">{{
                                $data->status }}</button>
                            @endif
                        </td>
                        <td class="pl-4">
                            <div class="flex justify-end pr-2">
                                @if ($data->status_id == 4)
                                <button
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-green-300 text-sm leading-none text-green-600 py-3 px-5 bg-green-100 rounded hover:bg-green-200 focus:outline-none"><a
                                        href="/peminjaman/cetak/{{ $data->id }}" target="_blank">Cetak</a></button>
                                @else
                                <button
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop{{ $data->id }}">Detail</button>


                                <!-- Modal -->

                                <div class="modal fade" id="staticBackdrop{{ $data->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>



                                            <div class="modal-body">
                                                @include('student.peminjaman.form.components.progress-bar')
                                            </div>


                                            <div class="modal-footer">
                                                <button type="button"
                                                    class="px-4 py-2 text-red-500 bg-red-200 rounded hover:bg-red-50"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
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
</script>
@endsection
