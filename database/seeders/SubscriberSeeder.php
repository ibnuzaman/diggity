<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subscribers = [];
        for ($i = 1; $i <= 10; $i++) {
            $subscribers[] = [
                'user_id' => rand(1, 10),
                'course_id' => rand(1, 10),
            ];
        }

        DB::table('subscribers')->insert($subscribers);
    }
}
