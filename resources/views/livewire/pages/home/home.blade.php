<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {}; ?>

<div>
    <x-wrapper>
        <x-carousel carouselNum="1" />
    </x-wrapper>

    {{-- Service --}}
    <x-wrapper bg="bg-secondary" class="text-center">
        <h2 class="heading-two">Layanan Kami</h2>
        <p class="paragraph">Kami memotivasi diri kami untuk mengaplikasikan kreativitas dalam setiap
            proyek, termasuk dalam
            optimalisasi
            penggunaan anggaran dan waktu</p>
        {{-- Card --}}
        <div class="grid grid-cols-3 gap-7">
            <x-item-service-card>
                <x-slot:title>Website Development</x-slot:title>
                <x-slot:description>
                    Dengan bantuan tim developer yang berpengalaman, kami selalu memperhitungkan
                    kesesuaian teknologi dengan kebutuhan masing-masing bisnis. Kami memastikan bahwa situs web yang
                    kami bangun tidak hanya cepat, tetapi juga ramah terhadap SEO dan user-friendly.
                </x-slot:description>
            </x-item-service-card>
            <x-item-service-card>
                <x-slot:title>Mobile App Development</x-slot:title>
                <x-slot:description>
                    Optimalkan mobilitas dan reputasi merek bisnis Anda melalui pengembangan aplikasi mobile
                    (Android & iOS). Capai lebih banyak pelanggan dan persiapkan bisnis Anda untuk bersaing di era
                    digital saat ini.
                </x-slot:description>
            </x-item-service-card>
            <x-item-service-card>
                <x-slot:title>Digital Marketing</x-slot:title>
                <x-slot:description>
                    Mendukung beragam jenis bisnis Anda, mulai dari skala kecil seperti bisnis rumahan dan UMKM,
                    hingga bisnis rintisan (startup) dan perusahaan besar, dalam menerapkan strategi pemasaran
                    digital yang efektif.
                </x-slot:description>
            </x-item-service-card>
        </div>
        <a href="#" class="block font-medium ms-auto w-fit text-primary hover:underline paragraph">
            Lihat Semua Layanan</a>
    </x-wrapper>

    {{-- Collab Type --}}
    <x-wrapper class="text-center">
        <h2 class="heading-two">Model Kerja Sama</h2>
        <p class="paragraph">
            Sesuaikanlah model proyek dengan kebutuhan yang Anda miliki untuk mencapai hasil yang optimal.</p>
        <div class="grid grid-cols-3 gap-7">
            <x-item-collaboration-type :href="route('project-based')" title="Project Based"
                description="Tenaga kerja yang dikhususkan untuk menangani proyek Anda." :benefits="[
                    'Tim eksklusif yang hanya bekerja untuk Anda.',
                    'Mengurangi biaya manajemen sumber daya manusia (SDM).',
                    'Menghilangkan kebutuhan untuk mengurus proses perekrutan.',
                    'Cocok untuk pengembangan platform digital yang dinamis.',
                ]"
                wire:navigate />

            <x-item-collaboration-type :href="route('dedicated-team')" title="Dedicated Team"
                description="Tim ahli untuk mengembangkan platform digital bisnis perusahaan Anda." :benefits="[
                    'Proyek disesuaikan dengan tujuan bisnis Anda.',
                    'Harga dan jadwal pengerjaan yang transparan.',
                    'Menawarkan garansi kualitas selama satu bulan.',
                    'Ideal untuk pengembangan platform digital baru.',
                ]" />
            <x-item-collaboration-type :href="route('on-demand')" title="On Demand"
                description="Tim yang siap untuk menangani segala permasalahan dan kebutuhan platform digital Anda."
                :benefits="[
                    'Lebih fleksibel dalam menanggapi kebutuhan Anda.',
                    'Pengerjaan didasarkan pada permintaan yang diajukan.',
                    'Menawarkan biaya yang lebih terjangkau.',
                    'Ideal untuk pengembangan fitur dan pemeliharaan platform.',
                ]" />
        </div>
    </x-wrapper>

    {{-- Portfolio --}}
    <x-wrapper bg="bg-secondary" class="text-center">
        <x-carousel carouselNum="2">
            <div class="lg:space-y-6 xl:space-y-12 xl:mb-24 lg:mb-12">
                <h2 class="font-semibold heading-two">Portofolio</h2>
                <p class="mx-72 paragraph">
                    Dalam beberapa tahun terakhir, pengalaman kami telah membantu klien memulai langkahnya
                    dalam dunia digital. Lihatlah beberapa karya terbaik yang telah kami hasilkan.
                </p>
            </div>
        </x-carousel>
    </x-wrapper>

    {{-- About Us --}}
    {{-- <div class="lg:py-24 xl:py-36">
        <div class="container grid grid-cols-2 mx-auto lg:gap-20 xl:gap-52">
            <div class="lg:space-y-6 xl:space-y-12">
                <h1 class="font-semibold lg:text-2xl xl:text-4xl">
                    Bergabunglah dengan Kami: Peluang Karier di Dunia IT
                </h1>
                <div class="xl:space-y-6 lg:space-y-3">
                    <p class="lg:text-sm xl:text-base">
                        Kami bukan hanya sekedar perusahaan perangkat lunak saja, tapi juga sebuah keluarga yang
                        saling mendukung dan menginspirasi. Berbasis di Yogyakarta, Indonesia, kami membangun lingkungan
                        kerja yang penuh semangat dan kolaboratif. Ini adalah kesempatan Anda untuk bergabung dengan tim
                        profesional kami. Kami mengundang Anda untuk berbagi keterampilan dan pengalaman Anda yang
                        berharga.
                    </p>
                    <p class="lg:text-sm xl:text-base">
                        Sekarang, saatnya untuk beraksi! Kirimkan lamaran Anda sekarang dan mulailah petualangan karier
                        Anda dengan Diggity. Ayo, mari jadikan mimpi Anda menjadi kenyataan bersama kami!
                    </p>
                </div>
                <x-outline-button>Pelajari Selengkapnya</x-outline-button>
            </div>
            <img src="{{ asset('asset/images/carousels/carousel1.jpeg') }}" alt="image"
                class="self-center rounded-xl">
        </div>
    </div> --}}

    {{-- Why Choose Us --}}
    <x-wrapper class="text-center">
        <h2 class="heading-two">Mengapa Memakai Layanan Diggity</h2>
        <p class="paragraph">Layanan Diggity Cocok untuk Memenuhi Kebutuhan Digitalisasi Bisnis Anda
            dengan Tepat</p>
        <div class="grid grid-cols-3 text-start lg:gap-x-4 xl:gap-x-7 lg:gap-y-6 xl:gap-y-12">
            <x-item-service-reason num="1">
                <x-slot:title>Inovasi Digital dengan Standar Internasional</x-slot:title>
                Kami berbasis di Yogyakarta, Indonesia, telah berpengalaman bekerja dengan klien dari berbagai
                negara, memastikan bahwa kami terlatih untuk memenuhi standar internasional dalam setiap proyek
                kami.
            </x-item-service-reason>
            <x-item-service-reason num="2">
                <x-slot:title>Keunggulan Tim Profesional</x-slot:title>
                Diggity memiliki lebih dari 100 staf ahli yang profesional di setiap bidangnya sejak tahun 2019.
                Dengan keahlian yang terbukti, kami siap untuk mengatasi segala kebutuhan digital bisnis Anda.
            </x-item-service-reason>
            <x-item-service-reason num="3">
                <x-slot:title>Beragam Layanan untuk Memenuhi Kebutuhan Anda</x-slot:title>
                Kami berbasis di Yogyakarta, Indonesia, telah berpengalaman bekerja dengan klien dari berbagai
                negara, memastikan bahwa kami terlatih untuk memenuhi standar internasional dalam setiap proyek
                kami.
            </x-item-service-reason>
            <x-item-service-reason num="4">
                <x-slot:title>Model Kerjasama yang Fleksibel</x-slot:title>
                Diggity memahami bahwa setiap bisnis memiliki kebutuhan digital yang berbeda. Oleh karena itu, kami
                menyediakan model kerjasama yang bervariasi agar dapat menawarkan solusi yang tepat untuk setiap
                tantangan digitalisasi perusahaan Anda.
            </x-item-service-reason>
            <x-item-service-reason num="5">
                <x-slot:title>Kepercayaan dari Perusahaan Terkemuka</x-slot:title>
                Dengan dedikasi, integritas, dan profesionalisme kami, banyak perusahaan besar di Indonesia telah
                mempercayakan proyek digital mereka kepada kami.
            </x-item-service-reason>
            <x-item-service-reason num="6">
                <x-slot:title>Pendekatan Personalisasi untuk Setiap Klien</x-slot:title>
                Kami berbasis di Yogyakarta, Indonesia, telah berpengalaman bekerja dengan klien dari berbagai
                negara, memastikan bahwa kami terlatih untuk memenuhi standar internasional dalam setiap proyek
                kami.
            </x-item-service-reason>
        </div>
    </x-wrapper>

    {{-- Footer --}}
    <x-footer />
</div>
