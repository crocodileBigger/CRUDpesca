<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pescador;

class PescadorSeeder extends Seeder
{
    public function run(): void
    {
        // Cria 50 pescadores fake
        Pescador::factory()->count(50)->create();
    }
}
