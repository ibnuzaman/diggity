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

        DB::table('courses')->insert([
            [
                'slug' => 'course-1',
                'name' => 'Course 1',
                'image' => 'course1.jpg',
                'discounted_price' => 49.99,
                'starting_price' => 99.99,
                'final_price' => 79.99,
                'subscriber' => 100,
                'level' => 'Pemula',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'course-2',
                'name' => 'Course 2',
                'image' => 'course2.jpg',
                'discounted_price' => 59.99,
                'starting_price' => 119.99,
                'final_price' => 89.99,
                'subscriber' => 200,
                'level' => 'Menengah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'course-3',
                'name' => 'Course 3',
                'image' => 'course3.jpg',
                'discounted_price' => 0,
                'starting_price' => 149.99,
                'final_price' => 149.99,
                'subscriber' => 300,
                'level' => 'Ahli',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
