<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};
use App\Models\Budget;
use App\Models\Collaboration;
use App\Models\Regency;
use App\Models\Region;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\Schedule;
use App\Livewire\Forms\ContactUsForm\FirstForm;
use App\Livewire\Forms\ContactUsForm\SecondForm;
use App\Livewire\Forms\ContactUsForm\ThirdForm;

new #[Title('Contact Us')] #[Layout('layouts.app')] class extends Component {
    public int $page = 1;
    public FirstForm $firstForm;
    public SecondForm $secondForm;
    public ThirdForm $thirdForm;

    public function with(): array
    {
        return [
            'services' => Service::all(),
            'collaborations' => Collaboration::all(),
            'regions' => Region::all(),
            'regencies' => Regency::all(),
            'schedules' => Schedule::all(),
            'budgets' => Budget::all(),
        ];
    }

    public function nextPage()
    {
        switch ($this->page) {
            case 1:
                $this->firstForm->validate();
                break;
            case 2:
                $this->secondForm->validate();
                break;
            default:
                break;
        }
        if ($this->page < 3) {
            ++$this->page;
        }
    }

    public function prevPage()
    {
        if ($this->page > 0) {
            --$this->page;
        }
    }
    public function store()
    {
        $this->thirdForm->validate();

        ServiceOrder::create([
            'name' => $this->firstForm->name,
            'phone_number' => $this->firstForm->phoneNumber,
            'email' => $this->firstForm->email,
            'service_id' => $this->secondForm->service,
            'collaboration_id' => $this->secondForm->collabType,
            'project_detail' => $this->secondForm->projectDetail,
            'schedule_id' => $this->secondForm->schedule,
            'budget_id' => $this->secondForm->budget,
            'company_name' => $this->thirdForm->companyName,
            'position' => $this->thirdForm->position,
            'employee' => $this->thirdForm->employee,
            'business_operated' => $this->thirdForm->businessOperated,
            'region_id' => $this->thirdForm->region,
            'regency_id' => $this->thirdForm->regency,
        ]);

        return redirect(route('contact-us'))->with('message', 'Berhasil Mengirim Pesan');
    }
};

?>

<div class="py-24 space-y-12">`
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
                {{-- First Form --}}
                @case(1)
                    {{-- Name --}}
                    <div class="flex flex-col gap-3">
                        <label for="name" class="self-start">Nama Lengkap</label>
                        <x-text-input id="name" class="w-full" placeholder="Nama Lengkap" wire:model="firstForm.name"
                            :error="$errors->get('firstForm.name')" />
                        <x-input-error :messages="$errors->get('firstForm.name')" />
                    </div>
                    {{-- Phone Number --}}
                    <div class="flex flex-col gap-3">
                        <label for="phoneNumber" class="self-start">Nomor Telepon</label>
                        <x-text-input id="phoneNumber" class="w-full" placeholder="Nomor Telepon"
                            wire:model='firstForm.phoneNumber' :error="$errors->get('firstForm.phoneNumber')" />
                        <x-input-error :messages="$errors->get('firstForm.phoneNumber')" />
                    </div>
                    {{-- Email --}}
                    <div class="flex flex-col gap-3">
                        <label for="email" class="self-start">Email</label>
                        <x-text-input id="email" class="w-full" placeholder="Email" wire:model='firstForm.email'
                            :error="$errors->get('firstForm.email')" />
                        <x-input-error :messages="$errors->get('firstForm.email')" />
                    </div>
                    <x-button class="flex ms-auto w-fit" wire:click="nextPage">Berikutnya</x-button>
                @break

                {{-- Second Form --}}
                @case(2)
                    {{-- Services --}}
                    <div class="flex flex-col gap-3">
                        <label for="layanan" class="self-start">Layanan yang Dibutuhkan</label>
                        <div class="grid grid-cols-3 font-normal gap-y-4">
                            @foreach ($services as $service)
                                <x-radio-button :name="$service->name" :id="$service->id" wire:model='secondForm.service' />
                            @endforeach
                        </div>
                        <x-input-error :messages="$errors->get('secondForm.service')" />
                    </div>
                    {{-- Collaboration Type --}}
                    <div class="flex flex-col gap-3">
                        <label for="collaborateType" class="self-start">Model Kerjasama yang Diinginkan</label>
                        <div class="flex flex-col font-normal gap-y-4">
                            @foreach ($collaborations as $collaboration)
                                <x-radio-button :name="$collaboration->type" :id="$collaboration->id" wire:model='secondForm.collabType' />
                            @endforeach
                        </div>
                        <x-input-error :messages="$errors->get('secondForm.collabType')" />
                    </div>
                    {{-- Project Detail --}}
                    <div class="flex flex-col gap-3">
                        <label for="detail" class="self-start">Detail Proyek</label>
                        <x-textarea-input id="detail" wire:model="secondForm.projectDetail" :error="$errors->get('secondForm.projectDetail')" />
                        <x-input-error :messages="$errors->get('secondForm.projectDetail')" />
                    </div>
                    {{-- Schedule --}}
                    <div class="flex flex-col gap-3">
                        <label for="schedule" class="self-start">Jadwal</label>
                        <x-select-input id="schedule" wire:model="secondForm.schedule" :error="$errors->get('secondForm.schedule')">
                            <x-slot:first>Pilih Jadwal</x-slot:first>
                            @foreach ($schedules as $schedule)
                                <option value="{{ $schedule->id }}">{{ $schedule->schedule }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('secondForm.schedule')" />
                    </div>
                    {{-- Budget --}}
                    <div class="flex flex-col gap-3">
                        <label for="budget" class="self-start">Anggaran</label>
                        <x-select-input id="budget" wire:model="secondForm.budget" :error="$errors->get('secondForm.budget')">
                            <x-slot:first>Tentukan Anggaran</x-slot:first>
                            @foreach ($budgets as $budget)
                                <option value="{{ $budget->id }}">{{ $budget->amount }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('secondForm.budget')" />
                    </div>
                    <div class="flex justify-between">
                        <x-outline-button class="bg-white" wire:click='prevPage'>Kembali</x-outline-button>
                        <x-button wire:click='nextPage'>Berikutnya</x-button>
                    </div>
                @break

                {{-- Third Form --}}
                @case(3)
                    {{-- Company Name --}}
                    <div class="flex flex-col gap-3">
                        <label for="companyName" class="self-start">Nama Perusahaan</label>
                        <x-text-input id="companyName" class="w-full" placeholder="Nama Perusahaan"
                            wire:model="thirdForm.companyName" :error="$errors->get('thirdForm.companyName')" />
                        <x-input-error :messages="$errors->get('thirdForm.companyName')" />
                    </div>
                    {{-- Position --}}
                    <div class="flex flex-col gap-3">
                        <label for="position" class="self-start">Posisi Anda</label>
                        <x-text-input id="position" class="w-full" placeholder="Posisi Anda" wire:model="thirdForm.position"
                            :error="$errors->get('thirdForm.position')" />
                        <x-input-error :messages="$errors->get('thirdForm.position')" />
                    </div>
                    {{-- Employee Count --}}
                    <div class="flex flex-col gap-3">
                        <label for="employee" class="self-start">Jumlah Karyawan</label>
                        <x-select-input id="employee" wire:model="thirdForm.employee" :error="$errors->get('thirdForm.employee')">
                            <x-slot:first>Jumlah Karyawan</x-slot:first>
                            <option value="< 50">&lt; 50</option>
                            <option value="50 - 100">50 - 100</option>
                            <option value="100 - 200">100 - 200</option>
                            <option value="> 200">&gt; 200</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('thirdForm.employee')" />
                    </div>
                    {{-- Business Type --}}
                    {{-- <div class="flex flex-col gap-3">
                        <label for="businessType" class="self-start">Jenis Usaha</label>
                        <select id="businessType"
                            class="bg-white border border-gray-300 font-normal text-gray-900 rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option rJenis Usaha</option>
                        </select>
                    </div> --}}
                    {{-- Business Operated --}}
                    <div class="flex flex-col gap-3">
                        <label for="businessOperated" class="self-start">Berapa Lama Usaha Berlangsung</label>
                        <x-select-input id="businessOperated" wire:model="thirdForm.businessOperated" :error="$errors->get('thirdForm.businessOperated')">
                            <x-slot:first>Pilih Lama Usaha</x-slot:first>
                            <option value="< 1 Tahun">&lt; 1 Tahun</option>
                            <option value="1 Tahun - 5 Tahun">1 Tahun - 5 Tahun</option>
                            <option value="5 Tahun - 10 Tahun">5 Tahun - 10 Tahun</option>
                            <option value="> 10 Tahun">&gt; 10 Tahun</option>
                        </x-select-input>
                        <x-input-error :messages="$errors->get('thirdForm.businessOperated')" />
                    </div>
                    {{-- Region --}}
                    <div class="flex flex-col gap-3">
                        <label for="region" class="self-start">Pilih Provinsi</label>
                        <x-select-input id="region" wire:model.live="thirdForm.region" :error="$errors->get('thirdForm.region')">
                            <x-slot:first>Pilih Provinsi</x-slot:first>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('thirdForm.region')" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="regency" class="self-start">Pilih Kabupaten/Kota</label>
                        <x-select-input id="regency" wire:model.live="thirdForm.regency"
                            wire:key="{{ $thirdForm->region }}" :error="$errors->get('thirdForm.regency')">
                            <x-slot:first>Pilih Kabupaten/Kota</x-slot:first>
                            @foreach (Region::find($thirdForm->region)->regencies ?? [] as $regency)
                                <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('thirdForm.regency')" />
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
