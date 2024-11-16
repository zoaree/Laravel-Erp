<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\eisenhower;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class eisenhowerSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Eisenhower::create([
                'todo' => $faker->sentence,
                'comment' => $faker->sentence,
                'endDate' => $faker->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d'),
                'color' => $faker->numberBetween(1, 4),
                'status' => fake()->randomElement(['0', '1']),
                'user_id' => $faker->numberBetween(1, 1),
            ]);
        }
    }
}
