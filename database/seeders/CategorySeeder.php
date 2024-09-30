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
            ['name' => 'UI/UX Designer', 'slug' => 'ui-ux-designer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Website Development', 'slug' => 'website-development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mobile App', 'slug' => 'mobile-app', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Analysis', 'slug' => 'data-analysis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cyber Security', 'slug' => 'cyber-security', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Digital Marketing', 'slug' => 'digital-marketing', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
