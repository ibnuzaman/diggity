<?php

namespace App\Livewire\Forms\ContactUsForm;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FirstForm extends Form
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public string $phoneNumber = '';

    #[Validate('required')]
    public string $email = '';
}
