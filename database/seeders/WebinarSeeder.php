<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
    for ($i = 0; $i < 5; $i++) {
        DB::table('webinars')->insert([
        'id' => Str::uuid(),
        'title' => 'Webinar ' . ($i + 1),
        'link_image' => 'https://example.com/image' . ($i + 1) . '.jpg',
        'webinar_date' => now()->addDays($i)->toDateString(),
        'start_time' => '10:00:00',
        'end_time' => '12:00:00',
        'meeting_room' => 'Room ' . (101 + $i),
        'starting_price' => 100.00 + ($i * 10),
        'discounted_price' => 80.00 + ($i * 8),
        'final_price' => 75.00 + ($i * 7.5),
        'description' => 'Description for Webinar ' . ($i + 1),
        'category_id' => rand(1, 3),
        'created_at' => now(),
        'updated_at' => now(),
        ]);
    }
    }
}
