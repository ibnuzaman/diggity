<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {
    public string $id;
}; ?>

<div>
    {{-- Top Breadcumb & Portfolio --}}
    <x-wrapper>
        <x-breadcumb>
            <x-breadcumb-link>
                Portofolio
            </x-breadcumb-link>
            <x-breadcumb-link>
                Judul Proyek {{ $id }}
            </x-breadcumb-link>
        </x-breadcumb>

        <h1 class="text-center heading-one">Portofolio</h1>
        <div class="w-full bg-gray-300 h-96 rounded-2xl"></div>
        <div class="lg:p-3.5 xl:p-6 bg-white rounded-md shadow-card">
            <div class="flex">
                <x-item-portfolio-data>
                    <x-slot:header>Klien</x-slot:header>
                    <x-slot:content>Lorem Ipsum</x-slot:content>
                </x-item-portfolio-data>
                <x-item-portfolio-data>
                    <x-slot:header>Tahun</x-slot:header>
                    <x-slot:content>Lorem Ipsum</x-slot:content>
                </x-item-portfolio-data>
                <x-item-portfolio-data>
                    <x-slot:header>Layanan</x-slot:header>
                    <x-slot:content>Lorem Ipsum</x-slot:content>
                </x-item-portfolio-data>
                <x-item-portfolio-data>
                    <x-slot:header>Lokasi</x-slot:header>
                    <x-slot:content>Lorem Ipsum</x-slot:content>
                </x-item-portfolio-data>
                <x-item-portfolio-data>
                    <x-slot:header>Link</x-slot:header>
                    <x-slot:content>Lorem Ipsum</x-slot:content>
                </x-item-portfolio-data>
                <x-item-portfolio-data>
                    <x-slot:header>Device</x-slot:header>
                    <x-slot:content>Lorem Ipsum</x-slot:content>
                </x-item-portfolio-data>
            </div>
        </div>
    </x-wrapper>

    {{-- Project Detail --}}
    <x-wrapper bg="bg-secondary">
        <x-hero-header :src="asset('asset/images/portfolio/header-portfolio.jpeg')">
            <x-slot:type>Detail Proyek</x-slot:type>
            <x-slot:description>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis augue imperdiet, volutpat augue sed,
                mollis arcu. Suspendisse libero ante,
                viverra quis sapien nec, aliquet semper tortor.
                Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</x-slot:description>
        </x-hero-header>
    </x-wrapper>

    {{-- Our Responsibility --}}
    <x-wrapper>
        <h1 class="heading-one">Tanggung Jawab Kami</h1>
        <p class="paragraph">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis augue imperdiet, volutpat augue
            sed,
            mollis arcu. Suspendisse libero ante, viverra quis sapien nec, aliquet semper tortor. Orci varius
            natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In accumsan, sapien a
            scelerisque auctor, risus ligula efficitur libero, ac tincidunt metus nunc at dui.
        </p>
        <div class="w-3/4 mx-auto bg-gray-300 h-96 rounded-2xl"></div>
    </x-wrapper>

    {{-- Project Responsibility --}}
    <x-wrapper bg="bg-secondary">
        <h1 class="heading-one">Tanggung Jawab Proyek</h1>
        <div class="grid grid-cols-5 xl:mt-24 lg:mt-12 xl:mx-24 lg:mx-12 lg:gap-x-4 xl:gap-x-7 lg:gap-y-8 xl:gap-y-12">
            @for ($i = 0; $i < 10; $i++)
                <div class="p-4 font-semibold text-center text-white rounded-full bg-primary paragraph">
                    Lorem Ipsum
                </div>
            @endfor
        </div>
    </x-wrapper>

    {{-- Technology and Gallery --}}
    <x-wrapper>
        <h1 class="heading-one">Teknologi yang Kami Gunakan</h1>
        <div class="grid grid-cols-5 lg:gap-4 xl:gap-7 lg:mx-12 xl:mx-24">
            @for ($i = 0; $i < 5; $i++)
                <div class="bg-gray-300 h-44 rounded-2xl"></div>
            @endfor
        </div>
        <h1 class="heading-one">Galeri</h1>
        <div class="grid grid-cols-3 lg:gap-x-4 xl:gap-x-7 lg:gap-y-8 xl:gap-y-12">
            @for ($i = 0; $i < 9; $i++)
                <div class="bg-gray-300 h-60 rounded-2xl"></div>
            @endfor
        </div>
    </x-wrapper>

    {{-- Hubungi Kami --}}
    <x-wrapper bg="bg-secondary">
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
    </x-wrapper>

    {{-- Bottom Breadcumb --}}
    <div class="container mx-auto lg:py-3 xl:py-5">
        <x-breadcumb>
            <x-breadcumb-link>
                Portofolio
            </x-breadcumb-link>
            <x-breadcumb-link>
                Judul Proyek {{ $id }}
            </x-breadcumb-link>
        </x-breadcumb>
    </div>

    <x-footer />
</div>
