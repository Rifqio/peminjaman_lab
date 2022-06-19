<div class="flex items-center justify-center w-full h-full py-8 px-4">
    <div class="max-w-7xl py-6 px-4 sm:px-2 lg:px-8 bg-white dark:bg-gray-800">
        <div class="sm:flex items-center justify-between">
            <div class="sm:mb-0 mb-4 flex items-center">
                <a tabindex="0"
                    class="focus:text-gray-500 hover:text-gray-500 focus:underline focus:outline-none cursor-pointer  text-xl pl-4 font-semibold leading-5 text-gray-800 dark:text-gray-100">
                    {{ $data->keterangan }} </a>
            </div>
            <div class="sm:mb-0 mb-4 flex items-center">
                <a tabindex="0"
                    class="focus:text-gray-500 italic hover:text-gray-500 focus:underline focus:outline-none cursor-pointer  text-xs pl-4 font-semibold leading-5 text-gray-800 dark:text-gray-100">
                    No Surat: {{ $data->no_surat }} </a>
            </div>

        </div>
        <div class="sm:flex items-center justify-between w-full sm:px-24 pt-6">
            <div class="sm:block flex w-full items-center">
                <div
                    class="sm:w-full w-2 sm:h-2 h-64 bg-gray-100 flex sm:flex-row flex-col items-center justify-between">
                    <div
                        class="w-4 h-4 @if ($data->status_id >= 1) bg-indigo-700
                        @else bg-gray-800 @endif
                     dark:bg-gray-100 rounded flex items-center justify-center">

                        @if ($data->status_id >= 1)
                            <img class="dark:hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/card33-svg1.svg" alt="check" />

                            <img class="hidden dark:block"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/card33-svg2.svg" alt="check" />
                        @endif

                    </div>
                    <div
                        class="w-4 h-4 @if ($data->status_id >= 2) bg-indigo-700 @else bg-gray-800 @endif dark:bg-gray-100 rounded flex items-center justify-center md:ml-8 lg:ml-20">
                        @if ($data->status_id >= 2)
                            <img class="dark:hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/card33-svg1.svg" alt="check" />

                            <img class="hidden dark:block"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/card33-svg2.svg" alt="check" />
                        @endif

                    </div>
                    <div
                        class="w-4 h-4 @if ($data->status_id >= 3) bg-indigo-700 @else bg-gray-800 @endif rounded flex items-center justify-center md:ml-8 lg:ml-20">
                        @if ($data->status_id >= 3)
                            <img class="dark:hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/card33-svg1.svg" alt="check" />

                            <img class="hidden dark:block"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/card33-svg2.svg" alt="check" />
                        @endif
                    </div>
                    <div
                        class="w-4 h-4 @if ($data->status_id === 4) bg-indigo-700 @else bg-gray-800 @endif dark:bg-gray-400 rounded flex items-center justify-center md:ml-8 lg:ml-20">
                    </div>
                </div>
                <div class="flex flex-col sm:hidden items-center justify-between h-64 pl-5">
                    <div class="flex flex-col items-start">
                        <a class="text-sm font-medium leading-4 text-indigo-700 dark:text-gray-100">Pending</a>
                        <p class="text-xs leading-3 pt-2.5 text-gray-500 dark:text-gray-400">
                            @if ($data->status_id === 1)
                                ({{ $data->updated_at }})
                        </p>
                        @endif
                        </p>
                    </div>
                    <div class="flex flex-col items-start">
                        <p class="text-sm font-medium leading-4 text-indigo-800 dark:text-gray-100">Terverifikasi Dosen
                        </p>
                        <p class="text-xs leading-3 pt-2.5 text-gray-500 dark:text-gray-400">
                            @if ($data->status_id === 2)
                                ({{ $data->updated_at }})
                            @endif
                        </p>
                    </div>
                    <div class="flex flex-col items-start">
                        <p class="text-sm font-medium leading-4 text-indigo-700">Terverifikasi Petugas</p>
                        <p class="text-xs leading-3 pt-2.5 text-gray-500 dark:text-gray-400">
                            @if ($data->status_id === 3)
                                ({{ $data->updated_at }})
                            @endif
                        </p>
                    </div>
                    <div class="flex flex-col items-start">
                        <p class="text-sm font-medium leading-4 text-gray-500 dark:text-gray-400">Terverifikasi Kepala
                            Lab</p>
                        <p class="text-xs leading-3 pt-2.5 text-gray-500 dark:text-gray-400">
                            @if ($data->status_id === 4)
                                ({{ $data->updated_at }})
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
        <div class="pt-4 px-12 sm:block hidden">
            <div class="flex items-center justify-between">
                <div class="flex flex-col items-center">
                    <a tabindex="0"
                        class="focus:outline-none pb-4  cursor-pointer focus:underline focus:text-gray-500 hover:text-gray-400 text-sm font-medium leading-4  @if ($data->status_id === 1) text-gray-800
                        @else text-indigo-700 @endif  dark:text-gray-100">Pending</a>
                    <p class="text-xs leading-4 pt-2.5 text-gray-500 dark:text-gray-400">
                        @if ($data->status_id === 1)
                            {{ $data->updated_at }}
                        @endif
                    </p>
                    </p>
                </div>
                <div class="flex flex-col items-center pl-10 md:pl-8 lg:pl-20">
                    <a tabindex="0"
                        class="focus:outline-none pb-4 cursor-pointer focus:underline focus:text-gray-500 hover:text-gray-400 text-sm font-medium leading-4  @if ($data->status_id >= 2) text-indigo-800
                        @else text-gray-700 @endif dark:text-gray-100">Terverifikasi
                        Dosen</a>
                    <p class="text-xs leading-4 pt-2.5 text-gray-500 dark:text-gray-400">
                        @if ($data->status_id === 2)
                            {{ $data->updated_at }}
                        @endif
                    </p>
                </div>
                <div class="flex flex-col items-center pl-10 md:pl-8 lg:pl-20">
                    <a tabindex="0"
                        class="focus:outline-none pb-4 cursor-pointer focus:underline focus:text-gray-500 hover:text-gray-400 text-sm font-medium leading-4 @if ($data->status_id >= 3) text-indigo-800
                        @else text-gray-700 @endif ">Terverifikasi&nbsp;Petugas&nbsp;</a>
                    <p class="text-xs leading-4 text-gray-500 dark:text-gray-400">
                        @if ($data->status_id === 3)
                            {{ $data->updated_at }}
                        @endif
                    </p>
                </div>
                <div class="flex flex-col items-center pl-10 md:pl-8 lg:pl-20">
                    <a tabindex="0"
                        class="focus:outline-none  pb-4 cursor-pointer focus:underline focus:text-gray-500 hover:text-gray-400 text-sm font-medium leading-4 @if ($data->status_id === 4) text-indigo-800
                        @else text-gray-700 @endif dark:text-gray-400">Terverifikasi
                        Kepala Lab</a>
                    <p class="text-xs leading-4 pt-2.5 text-gray-500 dark:text-gray-400">
                        @if ($data->status_id === 4)
                            {{ $data->updated_at }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
