<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(3)->create();      

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),            
        ]);
    }

    

}
for ($i = 0; $i < 10; $i++) {
    DB::table('users')->insert([
        'name' => Str::random(10),
        'email' => Str::random(10) . '@example.com',
        'password' => bcrypt('password'),
    ]);
}
