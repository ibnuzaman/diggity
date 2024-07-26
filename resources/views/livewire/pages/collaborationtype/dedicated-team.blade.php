<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {}; ?>

<div>
    {{-- Header --}}
    <header class="space-y-12 bg-secondary py-36">
        <div class="container flex mx-auto">
            <x-breadcumb>
                <x-breadcumb-link href="#">Dedicated Team</x-breadcumb-link>
            </x-breadcumb>
        </div>
        <x-hero-header src="{{ asset('asset/images/collaboration_type/header-dedicated-team.jpeg') }}">
            <x-slot:type>Dedicated Team</x-slot:type>
            <x-slot:description>
                Kami menawarkan akses mudah dan cepat ke talenta IT terbaik yang secara khusus didedikasikan untuk
                proyek digital Anda. Kami fleksibel dalam memenuhi setiap kebutuhan digitalisasi bisnis perusahaan Anda.
            </x-slot:description>
        </x-hero-header>
    </header>

    {{-- Benefit --}}
    <div class="container mx-auto my-24 space-y-12 text-center">
        <h1 class="text-4xl font-semibold">Benefit</h1>
        <p>Manfaat yang Anda Dapatkan</p>
        <div class="grid grid-cols-2 gap-x-8 gap-y-12">
            <x-item-benefit num="1" title="Kandidat Berkualitas Tinggi"
                description="Kami melakukan seleksi ketat untuk memastikan setiap kandidat yang kami rekrut memiliki kualitas yang tinggi dalam menyelesaikan tantangan digital Anda." />
            <x-item-benefit num="2" title="Interview Langsung"
                description="Anda memiliki kesempatan untuk melakukan wawancara langsung dengan calon karyawan kami, sehingga Anda dapat memastikan bahwa mereka sesuai dengan kebutuhan digital bisnis Anda." />
            <x-item-benefit num="3" title="Didedikasikan untuk Proyek Anda"
                description="Setiap sumber daya yang kami sediakan sepenuhnya didedikasikan untuk proyek Anda, memberi Anda fleksibilitas dalam mengatur prioritas digital bisnis Anda." />
            <x-item-benefit num="4" title="Profesionalisme yang Terbukti"
                description="Dengan pengalaman sejak tahun 2019, kami telah dipercaya oleh berbagai perusahaan di seluruh dunia, menunjukkan dedikasi kami dalam memenuhi kebutuhan digital dengan profesionalisme yang tinggi." />
            <x-item-benefit num="5" title="Transparansi dalam Pembayaran"
                description="Biaya yang Anda bayarkan sesuai dengan penggunaan sumber daya, dihitung berdasarkan jumlah hari kerja dan diberikan tagihan secara bulanan, sehingga Anda dapat melihat jelas apa yang Anda bayar." />
            <x-item-benefit num="6" title="Fleksibilitas Layanan"
                description="Layanan tim yang didedikasikan memberikan Anda kebebasan untuk memilih, menyesuaikan jumlah, dan mengelola sumber daya sesuai kebutuhan bisnis perusahaan Anda." />
        </div>
    </div>

    {{-- FAQ --}}
    <div class="py-24 bg-secondary">
        <div class="container mx-auto">
            <h3 class="text-xl font-semibold text-accent">Frequently Asked Question</h3>
            <h2 class="mt-6 mb-12 text-3xl font-semibold">Pelajari Lebih Lanjut</h2>
            <div class="flex flex-col gap-6">
                <x-item-faq>
                    <x-slot:question>Apa yang dimaksud dengan model kerjasama dedicated team?</x-slot:question>
                    Model kerjasama dedicated team adalah ketika tim pengembangan, yang terdiri dari satu atau beberapa
                    developer, ditugaskan secara eksklusif untuk bekerja pada satu proyek tertentu dalam periode waktu
                    yang telah ditentukan. Tim ini biasanya terdiri dari developer, tester, dan proyek manager yang
                    bekerja sama untuk menyelesaikan proyek tersebut.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Apakah Diggity menyediakan layanan outsourcing?</x-slot:question>
                    Ya, Diggity menyediakan layanan outsourcing TI dengan model kerjasama tim khusus. Untuk detail lebih
                    lanjut, hubungi tim penjualan & pemasaran Diggity melalui tombol WhatsApp di situs web kami.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>
                        Bagaimana mekanisme model kerjasama dedicated team di Diggity?
                    </x-slot:question>
                    Mekanisme model kerjasama dedicated team di Diggity meliputi:
                    <ol class="list-disc ps-5">
                        <li>Klien menyampaikan detail kebutuhan resource developer kepada Diggity.</li>
                        <li>Diggity memberikan rekomendasi teknologi yang cocok dengan kebutuhan klien.</li>
                        <li>Klien menentukan durasi atau masa kontrak tim yang didedikasikan sesuai kebutuhan.</li>
                        <li>Diggity menyediakan CV kandidat kepada klien.</li>
                        <li>Klien melakukan seleksi dan wawancara terhadap kandidat.</li>
                        <li>Jika kandidat disetujui, dilakukan kesepakatan kontrak.</li>
                    </ol>
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Berapa lama durasi kontrak untuk model kerjasama dedicated team?</x-slot:question>
                    Durasi kontrak minimum untuk model kerjasama dedicated team di Diggity adalah 3 bulan, namun dapat
                    diperpanjang sesuai kebutuhan klien.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>
                        Bagaimana metode pembayaran untuk model kerjasama dedicated team?
                    </x-slot:question>
                    Pembayaran untuk model kerjasama dedicated team dilakukan setiap bulan atau sesuai dengan termin
                    yang telah disepakati sebelumnya, sesuai dengan nilai kontrak.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Apakah klien bisa memilih kandidat sendiri?</x-slot:question>
                    Diggity menyediakan beberapa CV kandidat untuk seleksi klien. Klien dapat melakukan tes teknis,
                    wawancara, dan menolak kandidat yang tidak sesuai.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Bagaimana jika resource yang diinginkan klien tidak tersedia?</x-slot:question>
                    Diggity akan membantu klien dengan proses perekrutan yang memakan waktu sekitar 2-4 minggu untuk
                    mencari kandidat yang sesuai.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Apa keuntungan memilih model kerjasama dedicated team di Diggity?</x-slot:question>
                    Beberapa keuntungan memilih model kerjasama dedicated team di Diggity termasuk:
                    <ol class="list-disc ps-5">
                        <li>Fokus dan efisiensi tim dalam menyelesaikan proyek.</li>
                        <li>Klien memiliki kontrol penuh atas proyek.</li>
                        <li>Tidak ada biaya tambahan untuk menambah task selama periode kontrak.</li>
                        <li>Kemampuan untuk mengubah task dan prioritas sesuai kebutuhan selama periode kontrak.</li>
                    </ol>
                    Dengan model kerjasama dedicated team di Diggity, Anda mendapatkan akses ke tim yang fokus dan dapat
                    disesuaikan dengan kebutuhan proyek Anda.
                </x-item-faq>
            </div>
        </div>
    </div>

    {{-- Bottom Navigation --}}
    <div class="container mx-auto my-24">
        <x-bottom-navigation prev="Project Based" next="On Demand" />
    </div>

    {{-- Hubungi Kami --}}
    <div class="py-24 bg-secondary">
        <x-hero-header src="{{ asset('asset/images/header-contact-us.jpeg') }}">
            <x-slot:type>Hubungi Kami</x-slot:type>
            <x-slot:description>
                Jika Anda memiliki proyek yang ingin direalisasikan atau ingin berkolaborasi dengan kami
                dalam mengembangkan bisnis impian Anda, jangan ragu untuk menghubungi kami sekarang!
            </x-slot:description>
        </x-hero-header>
    </div>

    {{-- Bottom Breadcumb --}}
    <div class="container flex py-5 mx-auto">
        <x-breadcumb>
            <x-breadcumb-link href="#">Dedicated Team</x-breadcumb-link>
        </x-breadcumb>
    </div>

    <x-footer></x-footer>
</div>
