<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $reviews = [
            ['review' => 'Great course!', 'rating' => 5, 'user_id' => 1, 'course_id' => 1],
            ['review' => 'Very informative.', 'rating' => 4, 'user_id' => 2, 'course_id' => 2],
            ['review' => 'Well structured.', 'rating' => 5, 'user_id' => 3, 'course_id' => 3],
            ['review' => 'Could be better.', 'rating' => 3, 'user_id' => 1, 'course_id' => 1],
            ['review' => 'Excellent content.', 'rating' => 5, 'user_id' => 2, 'course_id' => 2],
            ['review' => 'Not bad.', 'rating' => 3, 'user_id' => 3, 'course_id' => 3],
            ['review' => 'Loved it!', 'rating' => 5, 'user_id' => 1, 'course_id' => 1],
            ['review' => 'Very helpful.', 'rating' => 4, 'user_id' => 2, 'course_id' => 2],
            ['review' => 'Good explanations.', 'rating' => 4, 'user_id' => 3, 'course_id' => 3],
            ['review' => 'Highly recommend.', 'rating' => 5, 'user_id' => 1, 'course_id' => 1],
        ];

        foreach ($reviews as $review) {
            DB::table('reviews')->insert($review);
        }
    }
}
