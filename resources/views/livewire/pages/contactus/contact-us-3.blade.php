<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {}; ?>

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
            <h3 class="text-2xl">Tahap 3 dari 3</h3>
            <p>Bagaimana cara kami menghubungi Anda?</p>
        </div>
        <div class="flex flex-col gap-3">
            <label for="companyName" class="self-start">Nama Perusahaan</label>
            <x-text-input class="w-full" />
        </div>
        <div class="flex flex-col gap-3">
            <label for="position" class="self-start">Posisi Anda</label>
            <x-text-input class="w-full" />
        </div>
        <div class="flex flex-col gap-3">
            <label for="employee" class="self-start">Jumlah Karyawan</label>
            <select id="employee"
                class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Jumlah Karyawan</option>
                <option value="1">Belum Tahu</option>
                <option value="2">1 Bulan - 3 Bulan</option>
                <option value="3">3 Bulan - 6 Bulan</option>
                <option value="4">6 Bulan - 12 Bulan</option>
            </select>
        </div>
        <div class="flex flex-col gap-3">
            <label for="type" class="self-start">Jenis Usaha</label>
            <select id="type"
                class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Jenis Usaha</option>
                <option value="1">&lt; Rp10.000.000</option>
                <option value="2">Rp10.000.000 - Rp50.000.000</option>
                <option value="3">Rp50.000.000 - Rp100.000.000</option>
                <option value="4">&gt; Rp100.000.000</option>
            </select>
        </div>
        <div class="flex flex-col gap-3">
            <label for="type" class="self-start">Berapa Lama Usaha Berlangsung</label>
            <select id="type"
                class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Pilih Lama Usaha</option>
                <option value="1">&lt; Rp10.000.000</option>
                <option value="2">Rp10.000.000 - Rp50.000.000</option>
                <option value="3">Rp50.000.000 - Rp100.000.000</option>
                <option value="4">&gt; Rp100.000.000</option>
            </select>
        </div>
        <div class="flex flex-col gap-3">
            <label for="type" class="self-start">Pilih Provinsi</label>
            <select id="type"
                class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Pilih Provinsi</option>
                <option value="1">&lt; Rp10.000.000</option>
                <option value="2">Rp10.000.000 - Rp50.000.000</option>
                <option value="3">Rp50.000.000 - Rp100.000.000</option>
                <option value="4">&gt; Rp100.000.000</option>
            </select>
        </div>
        <div class="flex flex-col gap-3">
            <label for="type" class="self-start">Pilih Kota</label>
            <select id="type"
                class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Pilih Kota</option>
                <option value="1">&lt; Rp10.000.000</option>
                <option value="2">Rp10.000.000 - Rp50.000.000</option>
                <option value="3">Rp50.000.000 - Rp100.000.000</option>
                <option value="4">&gt; Rp100.000.000</option>
            </select>
        </div>
        <div class="flex justify-between">
            <a href="{{ route('contact-us-2') }}" wire:navigate>
                <x-outline-button class="bg-white">Kembali</x-outline-button>
            </a>
            <a href="#" wire:navigate>
                <x-button color="primary">Kirim</x-button>
            </a>
        </div>
    </main>
</div>
