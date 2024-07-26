<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {}; ?>

<div>
    {{-- Header --}}
    <header class="space-y-12 bg-secondary py-36">
        <div class="container flex mx-auto">
            <x-breadcumb>
                <x-breadcumb-link href="#">On Demand</x-breadcumb-link>
            </x-breadcumb>
        </div>
        <x-hero-header src="{{ asset('asset/images/collaboration_type/header-on-demand.jpeg') }}">
            <x-slot:type>On Demand</x-slot:type>
            <x-slot:description>
                Tidak ada platform digital yang benar-benar sempurna. Itulah mengapa Diggity hadir sebagai solusi cepat
                untuk meningkatkan performa platform digital perusahaan Anda. Kami siap membantu dalam menangani
                perbaikan bug dan penyesuaian fitur agar platform Anda dapat berjalan lebih optimal.
            </x-slot:description>
        </x-hero-header>
    </header>

    {{-- Benefit --}}
    <div class="container mx-auto my-24 space-y-12 text-center">
        <h1 class="text-4xl font-semibold">Benefit</h1>
        <p>Manfaat yang Anda Dapatkan</p>
        <div class="grid grid-cols-2 gap-x-8 gap-y-12">
            <x-item-benefit num="1" title="Pelayanan Utama untuk Klien yang Sudah Ada"
                description="Kami mengutamakan pelayanan bagi klien yang telah menjadi bagian dari  kami, untuk memastikan setiap kebutuhan dan tantangan yang muncul pada platform digital mereka diperhatikan dengan seksama. Mencakup perbaikan bug serta pengembangan fitur yang sesuai dengan kebutuhan." />
            <x-item-benefit num="2" title="Sumber Daya yang Disesuaikan"
                description="Dengan beragam sumber daya yang tersedia, Diggity dapat menyesuaikan tim yang tepat untuk menangani setiap masalah yang dihadapi pada platform digital Anda. Kami memastikan bahwa penanganan masalah tersebut dilakukan oleh tenaga ahli yang kompeten." />
            <x-item-benefit num="3" title="Biaya yang Terjangkau"
                description="Kami menawarkan opsi biaya yang bersahabat dengan menghitung penggunaan sumber daya sesuai dengan perkiraan waktu pengerjaan. Pembayaran dilakukan secara bulanan, memberikan keterbukaan dan kejelasan dalam pengeluaran." />
            <x-item-benefit num="4" title="Pengerjaan yang Fleksibel"
                description="Kami memberikan kebebasan kepada Anda untuk memprioritaskan proyek berdasarkan kebutuhan bisnis Anda. Ini memastikan fleksibilitas dan efisiensi dalam penyelesaian proyek Anda sesuai dengan waktu dan prioritas yang ditetapkan." />
        </div>
    </div>

    {{-- FAQ --}}
    <div class="py-24 bg-secondary">
        <div class="container mx-auto">
            <h3 class="text-xl font-semibold text-accent">Frequently Asked Question</h3>
            <h2 class="mt-6 mb-12 text-3xl font-semibold">Pelajari Lebih Lanjut</h2>
            <div class="flex flex-col gap-6">
                <x-item-faq>
                    <x-slot:question>Apa itu model kerjasama on-demand?</x-slot:question>
                    Model kerjasama on-demand adalah ketika Diggity menyediakan jasa pengembangan perangkat lunak sesuai
                    dengan kebutuhan klien. Dalam model ini, klien dapat memesan jasa pengembangan sesuai kebutuhan
                    tanpa harus menentukan jangka waktu atau volume proyek tertentu.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Bagaimana mekanisme model kerjasama on-demand di Diggity?</x-slot:question>
                    Beberapa mekanisme model kerjasama on-demand di Diggity adalah sebagai berikut:
                    <ol class="list-disc ps-5">
                        <li>Klien memberikan detail tentang flow bisnis sistem atau platform yang akan dikembangkan,
                            termasuk fitur dan maintenance.</li>
                        <li>Diggity melakukan estimasi kebutuhan, termasuk timeline dan biaya.</li>
                        <li>Setelah kesepakatan harga dan timeline, tim Diggity mulai mengerjakan proyek sesuai dengan
                            specification document yang disepakati.</li>
                    </ol>
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>
                        Siapa yang akan terlibat dalam pengerjaan proyek menggunakan model kerjasama on-demand?
                    </x-slot:question>
                    Proyek on-demand umumnya melibatkan project-manager untuk memantau pengembangan proyek, serta
                    developer atau staf IT lainnya yang mengerjakan proyek tersebut.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>
                        Berapa biaya pengerjaan proyek menggunakan model kerjasama on-demand?
                    </x-slot:question>
                    Biaya pengerjaan proyek hanya berdasarkan waktu yang dibutuhkan oleh tim untuk menyelesaikannya,
                    biasanya dihitung berdasarkan jam pengerjaan.
                </x-item-faq>
                <x-item-faq>
                    <x-slot:question>Apa keuntungan memilih model kerjasama on-demand di Diggity?</x-slot:question>
                    Beberapa keuntungan memilih model kerjasama on-demand di Diggity meliputi:
                    <ol class="list-disc ps-5">
                        <li>Biaya yang lebih murah karena dibayar berdasarkan waktu pengerjaan proyek saja.</li>
                        <li>Fleksibilitas karena pengerjaan proyek disesuaikan dengan tiket yang diberikan oleh klien.
                        </li>
                        <li>Dapat disesuaikan dengan kebutuhan dan prioritas bisnis klien.</li>
                        <li>Cocok untuk kebutuhan maintenance maupun pengembangan fitur platform digital.</li>
                    </ol>
                </x-item-faq>
            </div>
        </div>
    </div>

    {{-- Bottom Navigation --}}
    <div class="container mx-auto my-24">
        <x-bottom-navigation prev="Dedicated Team" next="Project Based" />
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
            <x-breadcumb-link href="#">On Demand</x-breadcumb-link>
        </x-breadcumb>
    </div>

    <x-footer></x-footer>
</div>
