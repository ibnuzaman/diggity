<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        DB::table('Course')->insert([
            [
                'name' => 'Laravel 8',
                'slug' => 'laravel-8',
                'price' => 100000,
                'level' => 'Pemula',
                'discount' => 0,
            ],
            [
                'name' => 'Laravel 8',
                'slug' => 'laravel-8',
                'price' => 100000,
                'level' => 'Menengah',
                'discount' => 50000,
            ],
            [
                'name' => 'Laravel 8',
                'slug' => 'laravel-8',
                'price' => 100000,
                'level' => 'Ahli',
                'discount' => 0,
            ],
        ]);
    }
}
