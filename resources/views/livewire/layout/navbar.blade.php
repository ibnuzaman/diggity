<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<nav class="border-gray-200 bg-ghost-white dark:border-gray-600 dark:bg-gray-900">
    <div class="bg-white">
        <div class="container flex items-center justify-between p-4 mx-auto">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('asset/logo.png') }}" class="size-14" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Diggity</span>
            </a>
            <button type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="items-center justify-between hidden w-full font-medium md:flex md:w-auto md:order-1">
                <ul
                    class="flex flex-col h-full gap-3 p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                    <li x-data="{ menu: false }" @mouseenter="menu = true">
                        <x-nav-link />
                        <div x-show="menu" x-transition @mouseleave="menu = false"
                            class="container absolute z-50 max-w-screen-lg mx-auto mt-1 border-gray-200 shadow-sm top-16 start-0 end-0 rounded-xl bg-gray-50 md:bg-white border-y dark:bg-gray-800 dark:border-gray-600">
                            <div class="flex gap-16 px-4 py-5 mx-auto text-gray-900 max-h-fit dark:text-white md:px-6">
                                <ul class="max-w-[290px]">
                                    <li x-data="{ submenu: false }" @mouseenter="submenu = true"
                                        @mouseleave="submenu = false">
                                        <a href="#"
                                            class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <div class="font-semibold">Layanan Utama</div>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                                Layanan terbaik yang diformulasikan untuk menjawab kebutuhan Anda
                                                akan
                                                teknologi dan
                                                digitalisasi produk.</span>
                                            <hr x-show="submenu" class="border-primary">
                                        </a>
                                    </li>
                                    <li x-data="{ submenu: false }" @mouseenter="submenu = true"
                                        @mouseleave="submenu = false">
                                        <a href="#"
                                            class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <div class="font-semibold">Model Kerja Sama</div>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                                Project model yang sesuai dengan kebutuhan Anda</span>
                                        </a>
                                        <hr x-show="submenu" class="border-primary">
                                    </li>
                                    <li x-data="{ submenu: false }" @mouseenter="submenu = true"
                                        @mouseleave="submenu = false">
                                        <a href="#"
                                            class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <div class="font-semibold">Portfolio</div>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                                Merupakan suatu kehormatan bagi kami untuk menampilkan karya terbaik
                                                kami</span>
                                        </a>
                                        <hr x-show="submenu" class="border-primary">
                                    </li>
                                </ul>
                                <div class="border-s border-grayish-blue"></div>
                            </div>
                        </div>
                    </li>
                    {{-- <li>
                        <x-nav-link @mouseenter="index = 1; open[index] = true; open[0] = false; open[2] = false" />

                    </li> --}}
                    {{-- <li>
                        <x-nav-link @mouseenter="index = 2; open[index] = true; open[0] = false; open[1] = false" />

                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</nav>
