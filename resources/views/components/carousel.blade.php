@props(['bg' => 'bg-transparent'])

<div id="default-carousel-{{ $carouselNum }}" {{ $attributes->merge(['class' => "relative w-full $bg"]) }}>
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-screen">
        <div id="c-item-1-{{ $carouselNum }}" class="hidden duration-700 ease-in-out">
            <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 h-96 top-1/2 left-1/2">
                <div class="container grid grid-cols-2 mx-auto gap-52">
                    <div class="flex flex-col gap-12">
                        <h1 class="text-4xl font-semibold">Siapkah Anda untuk Mendigitalisasi Bisnis?</h1>
                        <p class="text-base">Bergabunglah dengan Diggity untuk mengembangkan platform digital khusus
                            untuk bisnis Anda.
                            Dengan layanan kami, Anda dapat membuat situs web, aplikasi mobile, dan sistem internal yang
                            sesuai dengan kebutuhan bisnis Anda sendiri.</p>
                        <a href="{{ route('contact-us') }}" class="w-fit" wire:navigate>
                            <x-button>Hubungi Kami</x-button>
                        </a>
                    </div>

                    <img src="{{ asset('asset/images/carousels/carousel1.jpeg') }}" alt="carousel image 1"
                        class="w-full h-full rounded-xl">

                </div>
            </div>
        </div>
        <div id="c-item-2-{{ $carouselNum }}" class="hidden duration-700 ease-in-out">
            <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 h-96 top-1/2 left-1/2">
                <div class="container grid grid-cols-2 mx-auto gap-52">
                    <div class="flex flex-col gap-12">
                        <h1 class="text-4xl font-semibold">Siapkan Anda untuk Mendigitalisasi Bisnis?</h1>
                        <p class="text-base">Bergabunglah dengan Diggity untuk mengembangkan platform digital khusus
                            untuk bisnis Anda.
                            Dengan layanan kami, Anda dapat membuat situs web, aplikasi mobile, dan sistem internal yang
                            sesuai dengan kebutuhan bisnis Anda sendiri.</p>
                        <x-button class="w-fit" color="primary">Hubungi Kami</x-button>
                    </div>

                    <img src="{{ asset('asset/images/carousels/carousel1.jpeg') }}" alt="carousel image 1"
                        class="w-full h-full rounded-xl">

                </div>
            </div>
        </div>
        <div id="c-item-3-{{ $carouselNum }}" class="hidden duration-700 ease-in-out">
            <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 h-96 top-1/2 left-1/2">
                <div class="container grid grid-cols-2 mx-auto gap-52">
                    <div class="flex flex-col gap-12">
                        <h1 class="text-4xl font-semibold">Siapkan Anda untuk Mendigitalisasi Bisnis?</h1>
                        <p class="text-base">Bergabunglah dengan Diggity untuk mengembangkan platform digital khusus
                            untuk bisnis Anda.
                            Dengan layanan kami, Anda dapat membuat situs web, aplikasi mobile, dan sistem internal yang
                            sesuai dengan kebutuhan bisnis Anda sendiri.</p>
                        <x-button class="w-fit" color="primary">Hubungi Kami</x-button>
                    </div>

                    <img src="{{ asset('asset/images/carousels/carousel1.jpeg') }}" alt="carousel image 1"
                        class="w-full h-full rounded-xl">

                </div>
            </div>
        </div>
        <div id="c-item-4-{{ $carouselNum }}" class="hidden duration-700 ease-in-out">
            <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 h-96 top-1/2 left-1/2">
                <div class="container grid grid-cols-2 mx-auto gap-52">
                    <div class="flex flex-col gap-12">
                        <h1 class="text-4xl font-semibold">Siapkan Anda untuk Mendigitalisasi Bisnis?</h1>
                        <p class="text-base">Bergabunglah dengan Diggity untuk mengembangkan platform digital khusus
                            untuk bisnis Anda.
                            Dengan layanan kami, Anda dapat membuat situs web, aplikasi mobile, dan sistem internal yang
                            sesuai dengan kebutuhan bisnis Anda sendiri.</p>
                        <x-button class="w-fit" color="primary">Hubungi Kami</x-button>
                    </div>

                    <img src="{{ asset('asset/images/carousels/carousel1.jpeg') }}" alt="carousel image 1"
                        class="w-full h-full rounded-xl">

                </div>
            </div>
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex items-center space-x-3 -translate-x-1/2 bottom-5 left-1/2 rtl:space-x-reverse">
        <button id="c-prev-{{ $carouselNum }}" type="button"
            class="flex items-center justify-center rounded-full shadow-xl cursor-pointer group">
            <span
                class="inline-flex items-center justify-center w-10 h-10 bg-white rounded-full dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                <svg class="w-4 h-4 text-gray-900 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button id="c-indicator-1-{{ $carouselNum }}" type="button" class="w-3 h-3 rounded-full"
            aria-label="Slide 1"></button>
        <button id="c-indicator-2-{{ $carouselNum }}" type="button" class="w-3 h-3 rounded-full"
            aria-label="Slide 2"></button>
        <button id="c-indicator-3-{{ $carouselNum }}" type="button" class="w-3 h-3 rounded-full"
            aria-label="Slide 3"></button>
        <button id="c-indicator-4-{{ $carouselNum }}" type="button" class="w-3 h-3 rounded-full"
            aria-label="Slide 4"></button>
        <button id="c-next-{{ $carouselNum }}" type="button"
            class="flex items-center justify-center rounded-full shadow-xl cursor-pointer group">
            <span
                class="inline-flex items-center justify-center w-10 h-10 bg-white rounded-full dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                <svg class="w-4 h-4 text-gray-900 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    <!-- Slider controls -->
</div>
