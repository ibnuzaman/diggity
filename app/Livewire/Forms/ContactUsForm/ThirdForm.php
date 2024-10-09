<?php

namespace App\Livewire\Forms\ContactUsForm;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ThirdForm extends Form
{
    #[Validate('required')]
    public string $companyName = '';
    #[Validate('required')]
    public string $position = '';
    #[Validate('required')]
    public string $employee = '';
    // #[Validate('required')]
    // public string $businessType = '';
    #[Validate('required')]
    public string $businessOperated = '';
    #[Validate('required')]
    public string $region = '';
    #[Validate('required')]
    public string $regency = '';
}
