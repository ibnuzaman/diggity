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
        $courses = [
            ['slug' => 'web-development', 'name' => 'Web Development', 'price' => 5000, 'level' => 'beginner'],
            ['slug' => 'data-science', 'name' => 'Data Science', 'price' => 40000, 'level' => 'intermediate'],
            ['slug' => 'machine-learning', 'name' => 'Machine Learning', 'price' => 100000, 'level' => 'advanced'],
            ['slug' => 'mobile-app-development', 'name' => 'Mobile App Development', 'price' => 5000, 'level' => 'beginner'],
            ['slug' => 'cloud-computing', 'name' => 'Cloud Computing', 'price' => 5000, 'level' => 'intermediate'],
            ['slug' => 'cyber-security', 'name' => 'Cyber Security', 'price' => 150000, 'level' => 'advanced'],
            ['slug' => 'game-development', 'name' => 'Game Development', 'price' => 0, 'level' => 'beginner'],
            ['slug' => 'database-management', 'name' => 'Database Management', 'price' => 70000, 'level' => 'intermediate'],
            ['slug' => 'networking', 'name' => 'Networking', 'price' => 500000, 'level' => 'advanced'],
            ['slug' => 'ui-ux-design', 'name' => 'UI/UX Design', 'price' => 10000, 'level' => 'beginner'],
        ];

        foreach ($courses as $course) {
            DB::table('courses')->insert($course);
        }
    }
}
