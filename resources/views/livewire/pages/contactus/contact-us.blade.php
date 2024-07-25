<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};

new #[Layout('layouts.app')] #[Title('Contact Us')] class extends Component {}; ?>

<div class="py-24">
    {{-- Breadcumb --}}
    <div class="container flex mx-auto">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="mx-1 text-gray-900 size-4 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#"
                        class="text-base font-semibold ms-1 hover:text-breadcumb-active md:ms-2 dark:text-gray-400 dark:hover:text-white text-breadcumb-active">Hubungi
                        Kami</a>
                </div>
            </li>
        </ol>
    </div>

    {{-- Body --}}
    <main class="container max-w-screen-md mx-auto space-y-12 font-semibold text-center">
        <div class="space-y-6">
            <h1 class="text-4xl">Hubungi Kami</h1>
            <p class="font-normal">Konsultasikan kebutuhan digitalisasi perusahaan Anda dengan Diggity.
                Segera bangun platform digital bisnis Anda bersama kami.</p>
        </div>
        <div class="space-y-6">
            <h3 class="text-2xl">Tahap 1 dari 3</h3>
            <p>Bagaimana cara kami menghubungi Anda?</p>
        </div>
        <div class="flex flex-col gap-3">
            <label for="name" class="self-start">Nama Lengkap</label>
            <x-text-input class="w-full" />
        </div>
        <div class="flex flex-col gap-3">
            <label for="phoneNumber" class="self-start">Nomor Telepon</label>
            <x-text-input class="w-full" />
        </div>
        <div class="flex flex-col gap-3">
            <label for="email" class="self-start">Email</label>
            <x-text-input class="w-full" />
        </div>
        <a href="{{ route('contact-us-2') }}" class="block" wire:navigate>
            <x-button class="flex ms-auto w-fit" color="primary">Berikutnya</x-button>
        </a>
    </main>
</div>
