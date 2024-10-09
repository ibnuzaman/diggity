<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        if (empty($categoryIds)) {            
            return;
        }

        $courseCategories = [];

        for ($i = 1; $i <= 3; $i++) {
            $courseCategories[] = [
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'course_id' => rand(1, 3),
            ];
        }

        DB::table('course_categories')->insert($courseCategories);
    }
}
