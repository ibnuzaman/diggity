<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    private array $services = [
        ['name' => 'Website Development'],
        ['name' => 'Software Development'],
        ['name' => 'System Testing'],
        ['name' => 'Mobile App Development'],
        ['name' => 'UI/UX Design'],
        ['name' => 'Big Data Services'],
        ['name' => 'Product Development'],
        ['name' => 'DevOps Solutions'],
        ['name' => 'Digital Marketing']
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert(
            array_map(fn (array $e) => [
                'name' => $e['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ], $this->services),
        );
    }
}
