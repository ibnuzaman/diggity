<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\password;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory(3)->create();

        Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        // dd('Admins table seeded!', [
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
