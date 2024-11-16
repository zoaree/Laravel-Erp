<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WaterCompany;

class waterCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WaterCompany::create([
            'companyName' => 'AquaTech Solutions',
            'user_id' => 1,
        ]);

        WaterCompany::create([
            'companyName' => 'BlueWave Water Co.',
            'user_id' => 1,
        ]);

        WaterCompany::create([
            'companyName' => 'ClearStream Services',
            'user_id' => 1,
        ]);

        WaterCompany::create([
            'companyName' => 'HydroPure Corp.',
            'user_id' => 1,
        ]);

        WaterCompany::create([
            'companyName' => 'PureFlow Industries',
            'user_id' => 1,
        ]);
    }
}
