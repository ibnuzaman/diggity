<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'UI/UX Designer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Website Development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mobile App', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Analysis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cyber Security', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Digital Marketing', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
