<?php

namespace Database\Seeders;

use App\Models\ElectricToken;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectricTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ElectricToken::factory(10)->create();
    }
}
