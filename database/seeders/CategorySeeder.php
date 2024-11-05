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
    DB::table('categories')->insert([
        ['name' => 'Cloud Computing', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Blockchain', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Artificial Intelligence', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Machine Learning', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Internet of Things', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Augmented Reality', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Virtual Reality', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Big Data', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'DevOps', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Quantum Computing', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
