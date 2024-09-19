<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {}; ?>

<div>
    {{-- Top Breadcumb & Header --}}
    <x-wrapper bg="bg-secondary">
        <x-breadcumb>
            <x-breadcumb-link>
                Layanan
            </x-breadcumb-link>
            <x-breadcumb-link>
                Nama Layanan
            </x-breadcumb-link>
        </x-breadcumb>
        <h1 class="text-center heading-one">Website Development</h1>
        <p class="mx-auto text-center paragraph xl:w-3/4">
            Dengan bantuan tim developer yang berpengalaman, kami selalu memperhitungkan kesesuaian teknologi dengan
            kebutuhan masing-masing bisnis. Kami memastikan bahwa situs web yang kami bangun tidak hanya cepat, tetapi
            juga ramah terhadap SEO dan user-friendly.
        </p>
        <x-button class="mx-auto">Hubungi Kami</x-button>
    </x-wrapper>

    {{-- Service Details --}}
    <x-wrapper>
        <div class="grid grid-cols-2 xl:gap-24 lg:gap-12">
            <h1 class="my-auto heading-one">Layanan Website Development yang Kami Sediakan</h1>
            <div class="grid grid-cols-2 lg:gap-x-3.5 xl:gap-x-7 lg:gap-y-6 xl:gap-y-12">
                @for ($i = 0; $i < 4; $i++)
                    <div class="xl:space-y-6 lg:space-y-3.5">
                        <h2 class="heading-two">Website Development</h2>
                        <p class="paragraph">
                            Kami menciptakan kehadiran online yang kuat dan disesuaikan dengan kebutuhan industri Anda.
                            Situs web yang kami buat akan menonjol dan sesuai dengan tujuan bisnis Anda.
                        </p>
                    </div>
                @endfor
            </div>
        </div>
    </x-wrapper>

    {{-- Our Solutions --}}
    <x-wrapper bg="bg-secondary">
        <h2 class="heading-two">Layanan Website Development Kami Membantu Anda Membangun Berbagai Solusi</h2>
        <div class="grid grid-cols-3 lg:gap-x-3.5 xl:gap-x-7 lg:gap-y-6 xl:gap-y-12">
            @for ($i = 0; $i < 6; $i++)
                <div class="text-center">
                    <div class="mx-auto bg-gray-300 size-20 rounded-xl"></div>
                    <h6 class="font-semibold paragraph lg:mt-3 xl:mt-6 lg:mb-1.5 xl:mb-3">Perencanaan Sumber Daya
                        Perusahaan (ERP)</h6>
                    <p class="text-xs">Kami menyediakan pengembangan web untuk membantu Anda mengimplementasikan sistem
                        ERP
                        yang sesuai dengan kebutuhan bisnis Anda.</p>
                </div>
            @endfor
        </div>
    </x-wrapper>

    {{-- FAQs --}}
    <x-wrapper>
        <div class="grid grid-cols-2 xl:gap-24 lg:gap-12">
            <div class="lg:space-y-3 xl:space-y-6">
                <h3 class="heading-three text-accent">Frequently Asked Questions</h3>
                <h2 class="heading-two">Apa itu layanan Website Development?</h2>
                <p class="paragraph">
                    Layanan Website Development mencakup proses merancang, membangun, dan memelihara situs web.
                    Melibatkan penggunaan berbagai teknologi, bahasa pemrograman, dan kerangka kerja untuk membuat situs
                    web yang sesuai dengan kebutuhan dan tujuan bisnis Anda.
                </p>
            </div>
            <div class="flex flex-col lg:gap-3 xl:gap-6">
                @for ($i = 0; $i < 4; $i++)
                    <x-item-faq>
                        <x-slot:question>Apa jenis situs web yang menjadi spesialisasi Diggity?</x-slot:question>
                        Di Diggity, kami mengkhususkan diri dalam pengembangan berbagai jenis situs web, termasuk situs
                        web
                        perusahaan, platform e-commerce, sistem manajemen konten (CMS), dan aplikasi web kustom yang
                        disesuaikan dengan kebutuhan spesifik Anda.
                    </x-item-faq>
                @endfor
            </div>
        </div>
    </x-wrapper>

    {{-- Contact Us --}}
    <x-wrapper bg="bg-secondary">
        <x-hero-header-contact-us />
    </x-wrapper>

    {{-- Bottom Breadcumb --}}
    <x-wrapper :bottomBreadcumb="true">
        <x-breadcumb>
            <x-breadcumb-link>
                Layanan
            </x-breadcumb-link>
            <x-breadcumb-link>
                Nama Layanan
            </x-breadcumb-link>
        </x-breadcumb>
    </x-wrapper>

    {{-- Footer --}}
    <x-footer />
</div>


{{-- Pertanyaan: Apa jenis situs web yang menjadi spesialisasi Diggity?
Jawaban: Di Diggity, kami mengkhususkan diri dalam pengembangan berbagai jenis situs web, termasuk situs web perusahaan, platform e-commerce, sistem manajemen konten (CMS), dan aplikasi web kustom yang disesuaikan dengan kebutuhan spesifik Anda.

Pertanyaan: Bisakah Diggity mendesain ulang situs web yang sudah ada?
Jawaban: Tentu! Tim kami yang berpengalaman dapat mendesain ulang dan memperbarui situs web Anda untuk meningkatkan tampilan, fungsionalitas, dan pengalaman pengguna secara keseluruhan.

Pertanyaan: Teknologi apa yang digunakan oleh tim Diggity untuk pengembangan web?
Jawaban: Kami menggunakan berbagai teknologi dan kerangka kerja seperti HTML5, CSS3, JavaScript, React, Angular, Node.js, dan PHP. Kami memilih teknologi berdasarkan kebutuhan khusus proyek Anda.

Pertanyaan: Bisakah Diggity mengintegrasikan layanan pihak ketiga ke situs web saya?
Jawaban: Ya, kami memiliki pengalaman dalam mengintegrasikan berbagai layanan pihak ketiga, API, dan plugin untuk meningkatkan fungsionalitas situs web Anda, termasuk gateway pembayaran, integrasi media sosial, dan banyak lagi.

Pertanyaan: Bagaimana saya bisa memulai layanan pengembangan web dengan Diggity?
Jawaban: Sangat mudah! Anda dapat menghubungi kami melalui halaman kontak atau mengirimkan pesan melalui WhatsApp. Kami akan menjadwalkan konsultasi untuk membahas proyek Anda, memahami kebutuhan Anda, dan menyusun proposal yang sesuai dengan kebutuhan Anda. --}}
