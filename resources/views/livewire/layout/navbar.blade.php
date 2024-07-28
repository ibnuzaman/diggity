<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<nav x-data="{
    services: false,
    products: false,
    courses: false,
    guides: false,
    about: false,
    langs: false,
    isActive(navlink) { return navlink ? 'md:border-primary' : 'md:border-transparent'; },
}" class="border-gray-200 bg-ghost-white dark:border-gray-600 dark:bg-gray-900">
    <div class="bg-white">
        <div class="container flex items-center justify-between p-4 mx-auto">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('asset/logo.png') }}" class="size-14" alt="Diggity Logo" />
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
                    <li>
                        <x-nav-link x-on:click="services=!services" x-bind:class="isActive(services)">
                            Layanan
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link x-on:click="products=!products" x-bind:class="isActive(products)"
                            x-on:click.outside="products=false">
                            Produk
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link x-on:click="courses=!courses" x-bind:class="isActive(courses)"
                            x-on:click.outside="courses=false">
                            Kelas
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link x-on:click="guides=!guides" x-bind:class="isActive(guides)"
                            x-on:click.outside="guides=false">
                            Panduan
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link x-on:click="about=!about" x-bind:class="isActive(about)"
                            x-on:click.outside="about=false">
                            Tentang
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link x-on:click="langs=!langs" x-bind:class="isActive(langs)"
                            x-on:click.outside="langs=false">
                            <x-svgs.globe class="me-2" />
                            ID
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <x-mega-menu x-show="services" x-on:click.outside="services=false" x-data="{ active: 0 }">
        <x-slot:link>
            <li>
                <x-mega-menu-link @click="active = 0" num="0">
                    <x-slot:title>Layanan Utama</x-slot:title>
                    <x-slot:description>
                        Layanan terbaik yang diformulasikan untuk menjawab kebutuhan Anda akan
                        teknologi dan digitalisasi produk.
                    </x-slot:description>
                </x-mega-menu-link>
            </li>
            <li>
                <x-mega-menu-link @click="active = 1" num="1">
                    <x-slot:title>Model Kerja Sama</x-slot:title>
                    <x-slot:description>
                        Project model yang sesuai dengan kebutuhan Anda
                    </x-slot:description>
                </x-mega-menu-link>
            </li>
            <li>
                <x-mega-menu-link @click="active = 2" num="2">
                    <x-slot:title>Portfolio</x-slot:title>
                    <x-slot:description>
                        Merupakan suatu kehormatan bagi kami untuk menampilkan karya terbaik kami
                    </x-slot:description>
                </x-mega-menu-link>
            </li>
        </x-slot:link>
        <x-slot:content>
            <x-mega-menu-content x-show="active === 0">
                <x-slot:title>Layanan Utama</x-slot:title>
                <x-slot:items>
                    <x-mega-menu-content-item title="Website Development"
                        description="Bangun website yang cepat, efektif, dan mudah digunakan" />
                    <x-mega-menu-content-item title="Mobile App Development"
                        description="Tingkatkan mobilitas dan brand bisnis dengan membangun aplikasi mobile (Android & iOS)" />
                    <x-mega-menu-content-item title="MVP Development"
                        description="Ketahui peluang bisnis dari setiap ide dan gagasan dengan mengembangkan produk MVP" />
                    <x-mega-menu-content-item title="Custom Software Development"
                        description="Percepat laju bisnis dengan membangun platform digital yang tepat dan sesuai kebutuhan bisnis perusahaan." />
                    <x-mega-menu-content-item title="UI/UX Design"
                        description="Desain komunikasi visual merupakan satu hal penting" />
                    <x-mega-menu-content-item title="Digital Marketing"
                        description="Pemasaran digital untuk berbagai tahapan bisnis Anda" />
                </x-slot:items>
                <x-slot:more>
                    <x-mega-menu-content-more contentType="Layanan"></x-mega-menu-content-more>
                </x-slot:more>
            </x-mega-menu-content>
            <x-mega-menu-content x-show="active === 1">
                <x-slot:title>Model Kerja Sama</x-slot:title>
                <x-slot:items></x-slot:items>
                <x-slot:more>
                    <x-mega-menu-content-more contentType="Model Kerja Sama" />
                </x-slot:more>
            </x-mega-menu-content>
            <x-mega-menu-content x-show="active === 2">
                <x-slot:title>Portofolio</x-slot:title>
                <x-slot:items></x-slot:items>
                <x-slot:more>
                    <x-mega-menu-content-more :href="route('portfolio')" contentType="Portofolio" />
                </x-slot:more>
            </x-mega-menu-content>
        </x-slot:content>
    </x-mega-menu>
</nav>
