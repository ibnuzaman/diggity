<?php

namespace App\Livewire\Forms\ContactUsForm;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SecondForm extends Form
{
    #[Validate('required')]
    public string $service = '';

    #[Validate('required')]
    public string $collabType = '';

    #[Validate('required')]
    public string $projectDetail = '';
    #[Validate('required')]
    public string $schedule = '';
    #[Validate('required')]
    public string $budget = '';
}
