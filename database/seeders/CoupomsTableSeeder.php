<?php

namespace Database\Seeders;

use App\Models\Coupom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoupomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupom::create([
            'code' => 'ABC123',
            'type' => 'fixed',
            'value' => 30,
        ]);
        Coupom::create([
            'code' => 'DEF456',
            'type' => 'percent',
            'percent_off' => 50,
        ]);
    }
}
