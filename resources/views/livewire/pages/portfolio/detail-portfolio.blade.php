<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {
    public string $id;
}; ?>

<div>
    {{-- Top Breadcumb --}}
    <div class="container mx-auto lg:mt-12 xl:mt-24">
        <x-breadcumb>
            <x-breadcumb-link>
                Portofolio
            </x-breadcumb-link>
            <x-breadcumb-link>
                Judul Proyek 1
            </x-breadcumb-link>
        </x-breadcumb>
    </div>

    {{-- Portfolio --}}
    <div class="container mx-auto lg:mt-8 xl:mt-12">
        <h1 class="font-semibold text-center lg:text-2xl xl:text-4xl">Portofolio</h1>
        <div class="w-full bg-gray-300 h-96 lg:mt-8 xl:mt-12 rounded-2xl"></div>
        <div class="lg:p-3.5 xl:p-6 bg-white rounded-md shadow-card lg:mt-12 xl:mt-24">
            <div class="flex">
                <div
                    class="flex flex-col lg:gap-4 xl:gap-6 grow xl:text-lg lg:text-sm border-e last:border-0 first:p-0 lg:ps-3.5 xl:ps-6">
                    <h5 class="font-semibold text-accent">Klien</h5>
                    <p class="xl:text-sm lg:text-xs">Lorem Ipsum</p>
                </div>
                <div
                    class="flex flex-col lg:gap-4 xl:gap-6 grow xl:text-lg lg:text-sm border-e last:border-0 first:p-0 lg:ps-3.5 xl:ps-6">
                    <h5 class="font-semibold text-accent">Tahun</h5>
                    <p class="xl:text-sm lg:text-xs">Lorem Ipsum</p>
                </div>
                <div
                    class="flex flex-col lg:gap-4 xl:gap-6 grow xl:text-lg lg:text-sm border-e last:border-0 first:p-0 lg:ps-3.5 xl:ps-6">
                    <h5 class="font-semibold text-accent">Layanan</h5>
                    <p class="xl:text-sm lg:text-xs">Lorem Ipsum</p>
                </div>
                <div
                    class="flex flex-col lg:gap-4 xl:gap-6 grow xl:text-lg lg:text-sm border-e last:border-0 first:p-0 lg:ps-3.5 xl:ps-6">
                    <h5 class="font-semibold text-accent">Lokasi</h5>
                    <p class="xl:text-sm lg:text-xs">Lorem Ipsum</p>
                </div>
                <div
                    class="flex flex-col lg:gap-4 xl:gap-6 grow xl:text-lg lg:text-sm border-e last:border-0 first:p-0 lg:ps-3.5 xl:ps-6">
                    <h5 class="font-semibold text-accent">Link</h5>
                    <p class="xl:text-sm lg:text-xs">Lorem Ipsum</p>
                </div>
                <div
                    class="flex flex-col lg:gap-4 xl:gap-6 grow xl:text-lg lg:text-sm border-e last:border-0 first:p-0 lg:ps-3.5 xl:ps-6">
                    <h5 class="font-semibold text-accent">Device</h5>
                    <p class="xl:text-sm lg:text-xs">Lorem Ipsum</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Detail Proyek --}}
    <section class="lg:py-12 xl:py-24 bg-secondary lg:mt-24 xl:mt-36">
        <div class="container mx-auto">
            <x-hero-header :src="asset('asset/images/portfolio/header-portfolio.jpeg')">
                <x-slot:type>Detail Proyek</x-slot:type>
                <x-slot:description>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis augue imperdiet, volutpat
                    augue sed, mollis arcu. Suspendisse libero ante, viverra quis sapien nec, aliquet semper tortor.
                    Orci
                    varius
                    natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</x-slot:description>
            </x-hero-header>
        </div>
    </section>

    {{-- Our Responsibility --}}
    <section class="lg:mt-24 xl:mt-36">
        <div class="container mx-auto">
            <h1 class="font-semibold lg:text-2xl xl:text-4xl">Tanggung Jawab Kami</h1>
            <p class="lg:mt-8 xl:mt-12 lg:text-sm xl:text-base">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis augue imperdiet, volutpat augue
                sed,
                mollis arcu. Suspendisse libero ante, viverra quis sapien nec, aliquet semper tortor. Orci varius
                natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In accumsan, sapien a
                scelerisque auctor, risus ligula efficitur libero, ac tincidunt metus nunc at dui.
            </p>
            <div class="w-3/4 mx-auto bg-gray-300 h-96 rounded-2xl lg:mt-12 xl:mt-24"></div>
        </div>
    </section>

    {{-- Project Responsibility --}}
    <section class="bg-secondary lg:mt-24 xl:mt-36">
        <div class="container mx-auto xl:py-24 lg:py-12">
            <h1 class="font-semibold lg:text-2xl xl:text-4xl">Tanggung Jawab Proyek</h1>
            <div
                class="grid grid-cols-5 xl:mt-24 lg:mt-12 xl:mx-24 lg:mx-12 lg:gap-x-4 xl:gap-x-7 lg:gap-y-8 xl:gap-y-12">
                @for ($i = 0; $i < 10; $i++)
                    <div
                        class="p-4 font-semibold text-center text-white rounded-full bg-primary lg:text-sm xl:text-base">
                        Lorem Ipsum
                    </div>
                @endfor
            </div>
        </div>
    </section>

    {{-- Technology and Gallery --}}
    <section class="lg:mt-24 xl:mt-36">
        <div class="container mx-auto lg:space-y-12 xl:space-y-24">
            <h1 class="font-semibold lg:text-2xl xl:text-4xl">Teknologi yang Kami Gunakan</h1>
            <div class="grid grid-cols-5 lg:gap-4 xl:gap-7 lg:mx-12 xl:mx-24">
                @for ($i = 0; $i < 5; $i++)
                    <div class="bg-gray-300 h-44 rounded-2xl"></div>
                @endfor
            </div>
            <h1 class="font-semibold lg:text-2xl xl:text-4xl">Galeri</h1>
            <div class="grid grid-cols-3 lg:gap-x-4 xl:gap-x-7 lg:gap-y-8 xl:gap-y-12">
                @for ($i = 0; $i < 9; $i++)
                    <div class="bg-gray-300 h-60 rounded-2xl"></div>
                @endfor
            </div>
        </div>
    </section>

    {{-- Hubungi Kami --}}
    <div class="lg:py-12 xl:py-24 bg-secondary xl:mt-36 lg:mt-24">
        <div class="container mx-auto">
            <x-hero-header :src="asset('asset/images/header-contact-us.jpeg')">
                <x-slot:type>
                    Konsultasi Gratis Mengenai Bagaimana Solusi Kami dapat Membantu Perkembangan Bisnis Anda!
                </x-slot:type>
                <x-slot:description>
                    Jika Anda memiliki proyek yang ingin direalisasikan atau ingin berkolaborasi dengan kami dalam
                    mengembangkan
                    bisnis impian Anda, jangan ragu untuk menghubungi kami sekarang!
                </x-slot:description>
            </x-hero-header>
        </div>
    </div>

    {{-- Bottom Breadcumb --}}
    <div class="container mx-auto lg:py-3 xl:py-5">
        <x-breadcumb>
            <x-breadcumb-link>
                Portofolio
            </x-breadcumb-link>
            <x-breadcumb-link>
                Judul Proyek 1
            </x-breadcumb-link>
        </x-breadcumb>
    </div>

    <x-footer />
</div>
