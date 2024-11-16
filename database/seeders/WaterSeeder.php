<?php

namespace Database\Seeders;

use App\Models\water;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        water::create([
            'company_id' => 1,
            'company_person' => 'Ali Veli',
            'purpose' => 'Test',
            'coord_x' => 40.712776,
            'coord_y' => -74.005974,
            'specimen' => '12345',
            'type' => 'Sample Type',
            'weather' => 'Sunny',
            'temp' => '25',
            'extent' => 'Yer Üstü',
            'alinis_sekli' => json_encode(['Numune', 'Fiziksel']),
            'tip' => 'Sample Tip',
            'ph' => 7.5,
            'head' => 20.0,
            'eh' => 50.0,
            'ec' => 10.0,
            'tds' => 100.0,
            'salt' => 1.0,
            'resistance' => 200.0,
            'oxygen' => 5.0,
            'oxygenS' => 70.0,
            'flow' => 2.0,
            'water' => 10.0,
            'fountain' => 1.0,
            'notes' => 'Test notes',
            'image_path' => 'path/to/image.jpg',
            'user_id' => 1,
        ]);
    }
}
