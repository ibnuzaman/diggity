<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++){        
            DB::table('speakers')->insert([
                'id' => Str::uuid(),
                'speaker_name' => 'Speaker ' . $i,
                'speaker_job' => 'Job for Speaker ' . $i,
                'speaker_summary' => 'Summary for Speaker ' . $i,
                'company_speaker' => 'Company for Speaker ' . $i,
                'speaker_image' => 'https://example.com/speaker' . $i . '.jpg',                
                'webinar_id' => rand(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
