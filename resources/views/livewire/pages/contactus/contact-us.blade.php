<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Collaboration;
use App\Models\Regency;
use App\Models\Region;
use App\Models\Service;

new #[Layout('layouts.app')] #[Title('Contact Us')] class extends Component {
    public int $page = 1;

    public string $name;
    public string $phoneNumber;
    public string $email;
    public string $service;
    public string $collabType;
    public string $selectedRegion;
    public string $selectedRegency;

    public function with(): array
    {
        return [
            'services' => Service::all(),
            'collaborations' => Collaboration::all(),
            'regions' => Region::all(),
            'regencies' => Regency::all(),
        ];
    }

    public function nextPage()
    {
        if ($this->page < 3) {
            ++$this->page;
        }
    }

    public function store(Request $request)
    {
        $arr = [$this->selectedRegion, $this->selectedRegency];
        dd($arr);
    }

    public function prevPage()
    {
        if ($this->page > 0) {
            --$this->page;
        }
    }
};
?>

<div class="py-24 space-y-12">
    {{-- Breadcumb --}}
    <div class="container mx-auto">
        <x-breadcumb>
            <x-breadcumb-link>Hubungi Kami</x-breadcumb-link>
        </x-breadcumb>
    </div>

    {{-- Body --}}
    <main class="container max-w-screen-md mx-auto space-y-12 font-semibold text-center">
        <div class="space-y-6">
            <h1 class="text-4xl">Hubungi Kami</h1>
            <p class="font-normal">Konsultasikan kebutuhan digitalisasi perusahaan Anda dengan Diggity.
                Segera bangun platform digital bisnis Anda bersama kami.</p>
        </div>
        <div class="space-y-6">
            <h3 class="text-2xl">Tahap {{ $page }} dari 3</h3>
            <p>Bagaimana cara kami menghubungi Anda?</p>
        </div>
        <form wire:submit="store" class="space-y-12">
            @switch($page)
                @case(1)
                    <div class="flex flex-col gap-3">
                        <label for="name" class="self-start">Nama Lengkap</label>
                        <x-text-input class="w-full" placeholder="Nama Lengkap" wire:model="name" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="phoneNumber" class="self-start">Nomor Telepon</label>
                        <x-text-input class="w-full" placeholder="Nomor Telepon" wire:model='phoneNumber' />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="email" class="self-start">Email</label>
                        <x-text-input class="w-full" placeholder="Email" wire:model='email' />
                    </div>
                    <x-button class="flex ms-auto w-fit" wire:click="nextPage">Berikutnya</x-button>
                @break

                @case(2)
                    <div class="flex flex-col gap-3">
                        <label for="layanan" class="self-start">Layanan yang Dibutuhkan</label>
                        <div class="grid grid-cols-3 font-normal gap-y-4">
                            @foreach ($services as $service)
                                <x-radio-button :labelName="$service->name" wire:model='service' />
                            @endforeach
                        </div>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="collaborateType" class="self-start">Model Kerjasama yang Diinginkan</label>
                        <div class="flex flex-col font-normal gap-y-4">
                            @foreach ($collaborations as $collaboration)
                                <x-radio-button :labelName="$collaboration->type" wire:model='collabType' />
                            @endforeach
                        </div>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="detail" class="self-start">Detail Proyek</label>
                        <textarea id="detail" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-md border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"></textarea>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="countries" class="self-start">Jadwal</label>
                        <select id="countries"
                            class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option selected>Pilih Jadwal</option>
                            <option value="1">Belum Tahu</option>
                            <option value="2">1 Bulan - 3 Bulan</option>
                            <option value="3">3 Bulan - 6 Bulan</option>
                            <option value="4">6 Bulan - 12 Bulan</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="countries" class="self-start">Anggaran</label>
                        <select id="countries"
                            class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option selected>Tentukan Anggaran</option>
                            <option value="1">&lt; Rp10.000.000</option>
                            <option value="2">Rp10.000.000 - Rp50.000.000</option>
                            <option value="3">Rp50.000.000 - Rp100.000.000</option>
                            <option value="4">&gt; Rp100.000.000</option>
                        </select>
                    </div>
                    <div class="flex justify-between">
                        <x-outline-button class="bg-white" wire:click='prevPage'>Kembali</x-outline-button>
                        <x-button wire:click='nextPage'>Berikutnya</x-button>
                    </div>
                @break

                @case(3)
                    <div class="flex flex-col gap-3">
                        <label for="companyName" class="self-start">Nama Perusahaan</label>
                        <x-text-input class="w-full" placeholder="Nama Perusahaan" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="position" class="self-start">Posisi Anda</label>
                        <x-text-input class="w-full" placeholder="Posisi Anda" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="employee" class="self-start">Jumlah Karyawan</label>
                        <select id="employee"
                            class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option selected>Jumlah Karyawan</option>
                            <option value="1">&lt; 50</option>
                            <option value="2">50 - 100</option>
                            <option value="3">100 - 200</option>
                            <option value="4">&gt; 200</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="businessType" class="self-start">Jenis Usaha</label>
                        <select id="businessType"
                            class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option selected>Jenis Usaha</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="businessOperated" class="self-start">Berapa Lama Usaha Berlangsung</label>
                        <select id="businessOperated"
                            class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option selected>Pilih Lama Usaha</option>
                            <option value="1">&lt; 1 Tahun</option>
                            <option value="2">1 Tahun - 5 Tahun</option>
                            <option value="3">5 Tahun - 10 Tahun</option>
                            <option value="4">&gt; 10 Tahun</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="region" class="self-start">Pilih Provinsi</label>
                        <select id="region"
                            class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            wire:model.live='selectedRegion'>
                            <option value="" selected>Pilih Provinsi</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="regency" class="self-start">Pilih Kabupaten/Kota</label>
                        <select id="regency"
                            class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            wire:model.live='selectedRegency' wire:key='{{ $selectedRegion }}'>
                            <option value="" selected>Pilih Kabupaten/Kota</option>
                            @foreach (Region::find($selectedRegion)->regencies ?? [] as $regency)
                                <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-between">
                        <x-outline-button class="bg-white" wire:click='prevPage'>Kembali</x-outline-button>
                        <x-button type="submit">Kirim</x-button>
                    </div>
                @break

                @default
            @endswitch
        </form>
    </main>
</div>
