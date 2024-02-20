<nav class="bg-black border-gray-200 dark:bg-black text-white fixed w-full z-40 ">
    <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-5">
        <a href="/" class="flex items-center space-x-2 rtl:space-x-reverse">
            <img src="{{ asset('assets/img/logo-1.png') }}" class="h-8" alt="Flowbite Logo" />
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full me-auto mx-5 md:block md:w-auto" id="navbar-default">
            <ul
                class="font-normal flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-5 rtl:space-x-reverse md:mt-0 md:border-0 md: bg-transparent  dark:bg-gray-800 md:dark:bg-black dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-gray-300 md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Beranda</a>
                </li>
                <li>
                    <a href="/buat"
                        class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-gray-300 md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Buat</a>
                </li>

            </ul>
        </div>
        <div class="max-w-6xl me-auto w-full flex gap-4 mx-2">
            <form action="{{ route('search') }}" class="relative w-full" method="GET">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>

                    <input type="search"
                        class="bg-gray-50 border cursor-pointer border-gray-300 text-gray-900 text-sm rounded-full focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                        placeholder="Cari" autocomplete="off" name="search">
                </div>
            </form>
            <div>
                @if (Auth::check())
                    <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                        data-dropdown-placement="bottom-start"
                        class="inline-block h-9 mx-5 mt-0.5 w-9 rounded-full ring-2 cursor-pointer ring-white"
                        src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div id="userDropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                            <li>
                                <a href="/album"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Album
                                    Saya</a>
                            </li>

                        </ul>
                        <div class="py-1">
                            <a href="/logout"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keluar</a>
                        </div>
                    </div>
                @else
                    <button data-modal-target="login-modal" data-modal-toggle="login-modal"
                        class="bg-red-700 px-7 py-2 rounded-full hover:bg-red-800 hover:text-gray-300">Masuk</button>
                @endif
            </div>
        </div>
    </div>
</nav>

<x-model id="login-modal" size='max-w-xl' title="Masuk">

    @slot('content')
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="text-white">Email</label>
                <input type="email" id="email"
                    class="block w-full bg-gray-900 border-gray-600 mt-2 text-white rounded-2xl shadow-sm focus:ring-gray-700 focus:border-gray-700"
                    placeholder="user@example.com" autocomplete="off" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="text-white">Password</label>
                <input type="password" id="password"
                    class="block w-full bg-gray-900 border-gray-600 mt-2 text-white rounded-2xl shadow-sm focus:ring-gray-700 focus:border-gray-700"
                    placeholder="*******" name="password">
            </div>
        @endslot
        @slot('footer')
            <div class="grid items-center p-4 md:p-5 rounded-b dark:border-gray-600">
                <button data-modal-hide="login-modal" type="submit"
                    class="text-white border border-gray-700 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-2xl text-sm px-5 py-3 text-center dark:bg-gray-900 dark:hover:bg-gray-950 dark:focus:ring-gray-800">Masuk</button>
                <div class="mt-5">
                    <span class="text-gray-100">Belum punya akun ? <button data-modal-hide="login-modal" type="button"
                            data-modal-target="register-modal" data-modal-toggle="register-modal"
                            class="text-gray-400 hover:text-gray-200 hover:underline">Daftar</button></span>
                </div>
            </div>
        </form>
    @endslot

</x-model>
<x-model id="register-modal" size='max-w-xl' title="Daftar">

    @slot('content')
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="text-white">Username</label>
                <input type="text" id="name"
                    class="block w-full bg-gray-900 border-gray-600 mt-2 text-white rounded-2xl shadow-sm focus:ring-gray-700 focus:border-gray-700"
                    placeholder="user@example.com" autocomplete="off" name="username">
            </div>
            <div class="mb-3">
                <label for="email" class="text-white">Email</label>
                <input type="email" id="email"
                    class="block w-full bg-gray-900 border-gray-600 mt-2 text-white rounded-2xl shadow-sm focus:ring-gray-700 focus:border-gray-700"
                    placeholder="user@example.com" autocomplete="off" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="text-white">Password</label>
                <input type="password" id="password"
                    class="block w-full bg-gray-900 border-gray-600 mt-2 text-white rounded-2xl shadow-sm focus:ring-gray-700 focus:border-gray-700"
                    placeholder="*******" name="password">
            </div>
        @endslot
        @slot('footer')
            <div class="grid items-center p-4 md:p-5 rounded-b dark:border-gray-600">
                <button data-modal-hide="register-modal" type="submit"
                    class="text-white border border-gray-700 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-2xl text-sm px-5 py-3 text-center dark:bg-gray-900 dark:hover:bg-gray-950 dark:focus:ring-gray-800">Daftar</button>
                <div class="mt-5">
                    <span class="text-gray-100">Sudah punya akun ? <button data-modal-target="login-modal"
                            data-collapse-toggle="login-modal" data-modal-hide="register-modal"
                            class="text-gray-400 hover:text-gray-200 hover:underline">Masuk</button></span>
                </div>
            </div>
        </form>
    @endslot

</x-model>
