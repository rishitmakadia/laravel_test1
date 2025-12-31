<?php

namespace Database\Factories;

use App\Models\DbTable;
use Illuminate\Database\Eloquent\Factories\Factory;


class DbTableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = DbTable::class;
    public function definition(): array
    {
        return [
            'name'     => $this->faker->name,
            'email'    => $this->faker->unique()->safeEmail,
            'age'      => $this->faker->numberBetween(18, 60),
            'position' => $this->faker->jobTitle,
            'company'  => $this->faker->company,
        ];
    }
}
