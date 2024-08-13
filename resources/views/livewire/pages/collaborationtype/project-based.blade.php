<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {}; ?>

<div>
    {{-- Header --}}
    <header class="lg:space-y-6 xl:space-y-12 bg-secondary lg:py-12 xl:py-24">
        <div class="container flex mx-auto">
            <x-breadcumb>
                <x-breadcumb-link href="#">Project Based</x-breadcumb-link>
            </x-breadcumb>
        </div>
        <x-hero-header :src="asset('asset/images/collaboration_type/header-project-based.jpeg')">
            <x-slot:type>Project Based</x-slot:type>
            <x-slot:description>
                Dengan tim profesional lebih dari 100 anggota dan kepercayaan yang telah diberikan
                oleh sejumlah
                perusahaan di Indonesia, Diggity hadir untuk memberikan bantuan dalam merancang, mendesain, dan
                mengembangkan platform digital yang cocok dengan kebutuhan bisnis perusahaan Anda.
            </x-slot:description>
        </x-hero-header>
    </header>

    {{-- Benefit --}}
    <div class="container mx-auto text-center lg:space-y-6 xl:space-y-12 lg:my-24 xl:my-36">
        <h1 class="font-semibold lg:text-2xl xl:text-4xl">Benefit</h1>
        <p class="lg:text-sm xl:text-base">Manfaat yang Anda Dapatkan</p>
        <div class="grid grid-cols-3 gap-7">
            <x-item-benefit num="1" title="Garansi 30 Hari"
                description="Anda mendapatkan jaminan 30 hari untuk layanan perbaikan, penanganan bug, dan dukungan IT lainnya setelah platform digital Anda diluncurkan bersama kami." />
            <x-item-benefit num="2" title="Harga Konsisten"
                description="Harga layanan kami tetap stabil sepanjang proses pengembangan platform digital Anda, kecuali jika terjadi perubahan signifikan dalam alur kerja atau fitur yang telah disetujui sebelumnya." />
            <x-item-benefit num="3" title="Tim Professional"
                description="Tim berpengalaman dari Diggity, yang terdiri dari manajer proyek, pengembang, desainer UI/UX, ahli devops, dan quality assurance, bahkan digital marketer, akan mendampingi Anda dalam mengembangkan platform digital Anda." />
        </div>
    </div>

    {{-- FAQ --}}
    <div class="lg:py-12 xl:py-24 bg-secondary">
        <div class="container mx-auto">
            <h3 class="font-semibold lg:text-base xl:text-xl text-accent">Frequently Asked Question</h3>
            <h2 class="font-semibold xl:mb-12 lg:mb-6 lg:mt-3 xl:mt-6 lg:text-xl xl:text-3xl">Pelajari Lebih Lanjut</h2>
            <div class="flex flex-col lg:gap-4 xl:gap-6">
                <x-item-faq>
                    <x-slot:question>Apa itu model kerjasama project-based?</x-slot:question>
                    Model kerjasama project-based adalah ketika perusahaan mengerjakan proyek yang
                    ditugaskan oleh
                    klien, dengan tanggung jawab menyelesaikan proyek sesuai dengan kualitas dan waktu yang telah
                    disepakati bersama.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Bagaimana mekanisme model kerjasama project-based di Diggity?</x-slot:question>
                    Beberapa mekanisme model kerjasama project-based di Diggity meliputi:
                    <ol class="list-disc ps-5">
                        <li>Klien memberikan detail flow bisnis sistem dan referensi teknologi.
                        </li>
                        <li>Diggity memberikan saran teknologi jika diperlukan.</li>
                        <li>Tim Diggity melakukan project quotation untuk menentukan durasi dan biaya proyek.</li>
                        <li>
                            Setelah kesepakatan harga dan timeline, tim Diggity mulai mengerjakan proyek sesuai
                            specification document.</li>
                    </ol>
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>
                        Siapa yang akan terlibat dalam pengerjaan proyek menggunakan model kerjasamaproject-based?
                    </x-slot:question>
                    Klien akan mendapatkan full team untuk pengembangan proyek sesuai dengan proposal kerjasama,
                    termasuk developer, devops, designer, quality assurance, dan project manager.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Bagaimana metode pembayaran untuk model kerjasama project-based?</x-slot:question>
                    Pembayaran proyek dibagi menjadi termin sesuai kesepakatan. Jika pembayaran tidak tepat waktu,
                    pengerjaan proyek dapat dihentikan sementara.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>
                        Apakah ada garansi yang diberikan Diggity untuk model kerjasama
                        project-based?
                    </x-slot:question>
                    Ya, klien mendapatkan garansi bug fixing dan maintenance selama 1 bulan setelah proyek dirilis.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Bagaimana jika ada perubahan workflow di tengah pengerjaan proyek?</x-slot:question>
                    Perubahan workflow di luar specification document akan dikenakan biaya tambahan yang dijelaskan
                    dalam proposal change request.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Bagaimana klien dapat mengontrol pengerjaan proyek?</x-slot:question>
                    Klien dan Diggity menetapkan jadwal komunikasi dan menerima progress report secara teratur untuk
                    memastikan klien selalu terinformasi mengenai kemajuan proyek.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Apa keuntungan memilih model kerjasama project-based di Diggity?</x-slot:question>
                    Beberapa keuntungan memilih model kerjasama project-based di Diggity termasuk:
                    <ol class="list-disc ps-5">
                        <li>Mendapatkan full team untuk pengembangan proyek.</li>
                        <li>Timeline yang jelas dan disesuaikan dengan target bisnis klien.</li>
                        <li>Harga proyek yang tetap, kecuali ada perubahan workflow.</li>
                        <li>Garansi bug fixing dan maintenance selama 1 bulan setelah proyek dirilis.</li>
                    </ol>
                </x-item-faq>
            </div>
        </div>
    </div>

    {{-- Bottom Navigation --}}
    <div class="container mx-auto lg:my-24 xl:my-36">
        <x-bottom-navigation prev="On Demand" next="Dedicated Team" />
    </div>

    {{-- Hubungi Kami --}}
    <div class="lg:py-12 xl:py-24 bg-secondary">
        <x-hero-header :src="asset('asset/images/header-contact-us.jpeg')">
            <x-slot:type>Hubungi Kami</x-slot:type>
            <x-slot:description>
                Jika Anda memiliki proyek yang ingin direalisasikan atau ingin berkolaborasi dengan kami
                dalam mengembangkan bisnis impian Anda, jangan ragu untuk menghubungi kami sekarang!
            </x-slot:description>
        </x-hero-header>
    </div>

    {{-- Bottom Breadcumb --}}
    <div class="container mx-auto lg:py-3 xl:py-5">
        <x-breadcumb>
            <x-breadcumb-link href="#">Project Based</x-breadcumb-link>
        </x-breadcumb>
    </div>

    <x-footer />
</div>
