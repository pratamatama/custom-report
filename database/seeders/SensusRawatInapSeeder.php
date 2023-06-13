<?php

namespace Database\Seeders;

use App\Models\SensusRawatInap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensusRawatInapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SensusRawatInap::factory()->count(100)->create();
    }
}
