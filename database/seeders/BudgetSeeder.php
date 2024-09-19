<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudgetSeeder extends Seeder
{
    private array $budgets = [
        ['amount' => '< Rp10.000.000'],
        ['amount' => 'Rp10.000.000 - Rp50.000.000'],
        ['amount' => 'Rp50.000.000 - Rp100.000.000'],
        ['amount' => '> Rp100.000.000'],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('budgets')->insert(
            array_map(
                fn (array $e) => [
                    'amount' => $e['amount'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                $this->budgets
            )
        );
    }
}
