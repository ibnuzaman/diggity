<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {}; ?>

<div>
    <x-carousel carouselNum="1" />

    {{-- Layanan --}}
    <div class="py-24 bg-azureish-white">
        <div class="container mx-auto space-y-12 text-center">
            <h2 class="text-3xl font-semibold">Layanan Kami</h2>
            <p>Kami memotivasi diri kami untuk mengaplikasikan kreativitas dalam setiap proyek, termasuk dalam
                optimalisasi
                penggunaan anggaran dan waktu</p>
            {{-- Card --}}
            <div class="grid grid-cols-3">
                <div class="p-5 space-y-6 bg-white rounded-lg shadow text-start">
                    <h3 class="text-2xl font-semibold">Card Title</h3>
                    <img src="{{ asset('asset/images/carousels/carousel1.jpeg') }}" alt="card image"
                        class="object-cover w-full rounded-lg h-44">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ex minus aspernatur alias ipsum,
                        nemo
                        saepe facere qui blanditiis eius voluptatibus nulla magnam atque fuga, suscipit possimus et
                        placeat
                        itaque.</p>
                    <x-outline-button>
                        Pelajari Selengkapnya</x-outline-button>
                </div>
            </div>
            <p class="font-medium text-primary text-end">Lihat Semua Layanan</p>
        </div>
    </div>

    {{-- Model Kerja Sama --}}
    <div class="py-36">
        <div class="container mx-auto space-y-12 text-center">
            <h2 class="text-3xl font-semibold">Model Kerja Sama</h2>
            <p>Sesuaikanlah model proyek dengan kebutuhan yang Anda miliki untuk mencapai hasil yang optimal.</p>
            <div class="grid grid-cols-3 gap-7">
                <x-item-collaboration-type title="Project Based"
                    description="Tenaga kerja yang dikhususkan untuk menangani proyek Anda." :benefits="[
                        'Tim eksklusif yang hanya bekerja untuk Anda.',
                        'Mengurangi biaya manajemen sumber daya manusia (SDM).',
                        'Menghilangkan kebutuhan untuk mengurus proses perekrutan.',
                        'Cocok untuk pengembangan platform digital yang dinamis.',
                    ]" />

                <x-item-collaboration-type title="Dedicated Team"
                    description="Tim ahli untuk mengembangkan platform digital bisnis perusahaan Anda."
                    :benefits="[
                        'Proyek disesuaikan dengan tujuan bisnis Anda.',
                        'Harga dan jadwal pengerjaan yang transparan.',
                        'Menawarkan garansi kualitas selama satu bulan.',
                        'Ideal untuk pengembangan platform digital baru.',
                    ]" />
                <x-item-collaboration-type title="On Demand"
                    description="Tim yang siap untuk menangani segala permasalahan dan kebutuhan platform digital Anda."
                    :benefits="[
                        'Lebih fleksibel dalam menanggapi kebutuhan Anda.',
                        'Pengerjaan didasarkan pada permintaan yang diajukan.',
                        'Menawarkan biaya yang lebih terjangkau.',
                        'Ideal untuk pengembangan fitur dan pemeliharaan platform.',
                    ]" />
                {{-- <div class="p-5 space-y-6 bg-white rounded-lg shadow-[0_2px_16px_0_rgba(25,40,57,0.09)] text-start">
                    <img src="{{ asset('asset/collaboration_type/dedicated_team.png') }}" alt="dedicated team"
                        class="size-20">
                    <h3 class="pb-3 text-2xl font-semibold border-b">Dedicated Team</h3>
                    <p>Tim ahli untuk mengembangkan platform digital bisnis perusahaan Anda.</p>
                    <div class="flex items-center gap-2">
                        <x-svgs.check-circle />
                        <p>Proyek disesuaikan dengan tujuan bisnis Anda.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-svgs.check-circle />
                        <p>Harga dan jadwal pengerjaan yang transparan.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-svgs.check-circle />
                        <p>Menawarkan garansi kualitas selama satu bulan.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-svgs.check-circle />
                        <p>Ideal untuk pengembangan platform digital baru.</p>
                    </div>
                </div>
                <div class="p-5 space-y-6 bg-white rounded-lg shadow-[0_2px_16px_0_rgba(25,40,57,0.09)] text-start">
                    <img src="{{ asset('asset/collaboration_type/on_demand.png') }}" alt="on demand" class="size-20">
                    <h3 class="pb-3 text-2xl font-semibold border-b">On Demand</h3>
                    <p>Tim yang siap untuk menangani segala permasalahan dan kebutuhan platform digital Anda.</p>
                    <div class="flex items-center gap-2">
                        <x-svgs.check-circle />
                        <p>Lebih fleksibel dalam menanggapi kebutuhan Anda.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-svgs.check-circle />
                        <p>Pengerjaan didasarkan pada permintaan yang diajukan.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-svgs.check-circle />
                        <p>Menawarkan biaya yang lebih terjangkau.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-svgs.check-circle />
                        <p>Ideal untuk pengembangan fitur dan pemeliharaan platform.</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- Portfolio --}}
    <x-carousel carouselNum="2" bg="bg-azureish-white" />

    {{-- Tentang Kami --}}
    <div class="py-24">
        <div class="container grid grid-cols-2 mx-auto gap-52">
            <div class="space-y-12">
                <h1 class="text-4xl font-semibold">Bergabunglah dengan Kami: Peluang Karier di Dunia IT</h1>
                <div class="space-y-6">
                    <p> Kami bukan hanya sekedar perusahaan perangkat lunak saja, tapi juga sebuah keluarga yang
                        saling
                        mendukung
                        dan
                        menginspirasi. Berbasis di Yogyakarta, Indonesia, kami membangun lingkungan kerja yang penuh
                        semangat
                        dan
                        kolaboratif. Ini adalah kesempatan Anda untuk bergabung dengan tim profesional kami. Kami
                        mengundang
                        Anda
                        untuk berbagi keterampilan dan pengalaman Anda yang berharga.</p>
                    <p>
                        Sekarang, saatnya untuk beraksi! Kirimkan lamaran Anda sekarang dan mulailah petualangan karier
                        Anda
                        dengan
                        Diggity. Ayo, mari jadikan mimpi Anda menjadi kenyataan bersama kami!
                    </p>
                </div>
                <x-outline-button>Pelajari Selengkapnya</x-outline-button>
            </div>
            <img src="{{ asset('asset/images/carousels/carousel1.jpeg') }}" alt="image" class="rounded-xl">
        </div>
    </div>

    {{-- Tentang Kami Carousel --}}
    <x-carousel carouselNum="3" bg="bg-azureish-white" class="container px-8 mx-auto rounded-3xl" />

    {{-- Alasan Memakai Layanan --}}
    <div class="py-36">
        <div class="container mx-auto space-y-12 text-center">
            <h2 class="text-3xl font-semibold">Mengapa Memakai Layanan Diggity</h2>
            <p>Layanan Diggity Cocok untuk Memenuhi Kebutuhan Digitalisasi Bisnis Anda dengan Tepat</p>
            <div class="grid grid-cols-3 text-start">
                <div class="p-6 rounded shadow-lg bg-azureish-white">
                    <img src="{{ asset('asset/images/carousels/carousel1.jpeg') }}" alt="card image" class="w-20 h-20">
                    <h3 class="mt-3 text-2xl font-semibold">Card Title</h3>
                    <p class="mt-6">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio sapiente illum,
                        nam sed
                        dignissimos soluta praesentium provident neque laudantium ipsa voluptatum ducimus, harum
                        doloremque ipsam? Qui iure dolores debitis rem!</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="flex p-24 text-white bg-catalina-blue gap-36">
        <div class="flex flex-col gap-12 w-96">
            <div class="flex items-center gap-6">
                <img src="{{ asset('asset/logo.png') }}" alt="logo" class="w-24 h-24">
                <div class="space-y-3">
                    <h1 class="text-4xl font-bold">Diggity</h1>
                    <p class="text-lg">Craft Your Digital Dream</p>
                </div>
            </div>
            <div class="space-y-6 text-lg font-medium">
                <p>Minggiran, Sendangtirto, Kec. Berbah, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55573</p>
                <p>+62 878-4305-2780</p>
                <p>info@diggity.co.id</p>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-y-12">
            <div class="space-y-6 text-lg font-medium">
                <h2 class="text-3xl">Layanan</h2>
                <p>Layanan Utama</p>
                <p>Model Kerja Sama</p>
                <p>Portofolio</p>
            </div>
            <div class="space-y-6 text-lg font-medium">
                <h2 class="text-3xl">Produk</h2>
                <p>Produk Utama</p>
                <p>Harga</p>
            </div>
            <div class="space-y-6 text-lg font-medium">
                <h2 class="text-3xl">Kelas</h2>
                <p>Kelas Utama</p>
                <p>Alur Belajar</p>
                <p>Bootcamp</p>
                <p>Webinar</p>
                <p>Universitas dan Perusahaan</p>
            </div>
            <div class="space-y-6 text-lg font-medium">
                <h2 class="text-3xl">Panduan</h2>
                <p>Panduan</p>
                <p>Kolaborasi</p>
                <p>Partner Komersial</p>
            </div>
            <div class="space-y-6 text-lg font-medium">
                <h2 class="text-3xl">Tentang</h2>
                <p>Tentang Diggity</p>
                <p>Mengapa Diggity</p>
                <p>Karir</p>
            </div>
        </div>
    </div>
    <div class="flex justify-between px-24 py-12 text-lg font-semibold text-white bg-oxford-blue">
        <div class="flex gap-6">
            <p>&copy;</p>
            <p>Copyright 2024 CV Sinergi Cita Digital</p>
        </div>
        <div class="flex items-center gap-6">
            <p>Ketentuan Pengguna</p>
            <div class="w-3 h-3 bg-white rounded-full"></div>
            <p>Kebijakan Privasi</p>
        </div>
    </div>
</div>
