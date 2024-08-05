<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollaborationSeeder extends Seeder
{
    private array $collabs = [
        ['type' => 'Dedicated Team'],
        ['type' => 'Project Based'],
        ['type' => 'On Demand'],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('collaborations')->insert(
            array_map(fn (array $e) => [
                'type' => $e['type'],
                'created_at' => now(),
                'updated_at' => now(),
            ], $this->collabs)
        );
    }
}
