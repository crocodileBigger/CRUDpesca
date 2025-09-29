<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peixe;

class PeixeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        Peixe::factory()->count(50)->create();
    }
}
