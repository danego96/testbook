<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'birth_date' => $this->faker->date('Y-m-d', '2004-01-01'),
            'group_id' => Group::get()->random()->id

        ];
    }
}
