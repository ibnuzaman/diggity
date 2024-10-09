<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    private array $schedules = [
        ['schedule' => 'Belum Tahu'],
        ['schedule' => '1 Bulan - 3 Bulan'],
        ['schedule' => '3 Bulan - 6 Bulan'],
        ['schedule' => '6 Bulan - 12 Bulan'],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert(
            array_map(
                fn (array $e) => [
                    'schedule' => $e['schedule'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                $this->schedules
            )
        );
    }
}
