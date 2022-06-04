<nav class="w-full border-b">
    <div class="py-5 md:py-0 container mx-auto px-6 flex items-center justify-between">
        <div>
            <i class="fa-brands fa-atlassian text-4xl text-indigo-600"></i>
            <span class="text-4xl text-indigo-600 font-extrabold tracking-tight leading-7">FMIPA</span>
        </div>
        <div>
            <button onclick="toggleMenu(true)"
                class="dark:bg-white rounded sm:block md:hidden text-gray-500 hover:text-gray-700 dark:text-gray-200 focus:text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <svg aria-haspopup="true" aria-label="open Main Menu" xmlns="http://www.w3.org/2000/svg"
                    class="md:hidden icon icon-tabler icon-tabler-menu" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round">
                    <path stroke="none" d="M0 0h24v24H0z"></path>
                    <line x1="4" y1="8" x2="20" y2="8"></line>
                    <line x1="4" y1="16" x2="20" y2="16"></line>
                </svg>
            </button>
            <div id="menu" class="md:block lg:block hidden">
                <button onclick="toggleMenu(false)"
                    class="dark:bg-white rounded block md:hidden lg:hidden text-gray-500 hover:text-gray-700 dark:text-gray-200 focus:text-gray-700 dark:text-gray-200 fixed focus:outline-none focus:ring-2 focus:ring-gray-500 z-30 top-0 mt-6">
                    <svg aria-label="close main menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
                <ul
                    class="flex text-3xl md:text-base items-center py-14 md:flex flex-col md:flex-row justify-center fixed md:relative top-0 bottom-0 left-0 right-0 bg-white md:bg-transparent z-20">
                </ul>
            </div>
        </div>
        @auth
        <button
            class="focus:outline-none lg:text-lg lg:font-bold focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 hidden md:block bg-transparent transition duration-150 ease-in-out hover:bg-gray-200 rounded border border-indigo-700 text-indigo-700 px-4 sm:px-8 py-1 sm:py-3 text-sm"><a
                href="/dashboard">Dashboard</a>
        </button>
        @else
        <button
            class="focus:outline-none lg:text-lg lg:font-bold focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 hidden md:block bg-transparent transition duration-150 ease-in-out hover:bg-gray-200 rounded border border-indigo-700 text-indigo-700 px-4 sm:px-8 py-1 sm:py-3 text-sm"><a
                href="/register">Register</a>
        </button>
        @endauth
    </div>
</nav>
<div class="bg-gray-100 dark:bg-transparent">
    <div class="container mx-auto flex flex-col items-center py-12 sm:py-24">
        <div class="w-11/12 sm:w-2/3 lg:flex justify-center items-center flex-col  mb-5 sm:mb-10">
            <h1
                class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl text-center text-gray-800 dark:text-white font-black leading-7 md:leading-10">
                Selamat datang di website layanan lab terpadu <br>
                <span class="text-indigo-700">Fakultas MIPA UNS</span>
            </h1>
            <p class="mt-5 sm:mt-10 lg:w-10/12 text-gray-400 font-normal text-center text-sm sm:text-lg">Sekarang untuk melakukan peminjaman lab terpadu,
                pembuatan surat bebas lab, hingga pengujian data sampel bisa dilakukan di website ini
            </p>
        </div>
        <div class="flex justify-center items-center">
            <button
                class="ml-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 bg-transparent transition duration-150 ease-in-out hover:border-indigo-600 lg:text-xl lg:font-bold  hover:text-indigo-600 rounded border border-indigo-700 text-indigo-700 px-4 sm:px-10 py-2 sm:py-4 text-sm">
                Mulai</button>
        </div>
    </div>
</div>
