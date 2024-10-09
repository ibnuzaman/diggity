<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {}; ?>

<div>
    {{-- Header --}}
    <x-wrapper bg="bg-secondary">
        <x-breadcumb>
            <x-breadcumb-link>
                Portofolio
            </x-breadcumb-link>
        </x-breadcumb>
        <x-hero-header :src="asset('asset/images/portfolio/header-portfolio.jpeg')">
            <x-slot:type>Portofolio</x-slot:type>
            <x-slot:description>
                Sebagai perusahaan pengembang perangkat lunak yang beroperasi sejak tahun 2019, kami
                telah membangun reputasi yang kuat dalam merancang dan mengembangkan aplikasi web, aplikasi seluler,
                dan strategi pemasaran digital. Merupakan suatu kehormatan bagi kami untuk menampilkan karya terbaik
                kami.
            </x-slot:description>
        </x-hero-header>
    </x-wrapper>

    {{-- Portfolios --}}
    <x-wrapper>
        <div class="grid grid-cols-3 lg:gap-x-3.5 xl:gap-x-7 lg:gap-y-8 xl:gap-y-12">
            @for ($i = 1; $i <= 6; $i++)
                <x-item-portfolio :num="$i" :href="route('detail-portfolio', ['id' => $i])" />
            @endfor
        </div>
    </x-wrapper>

    {{-- Contact Us --}}
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
        </x-breadcumb>
    </div>

    <x-footer />
</div>
