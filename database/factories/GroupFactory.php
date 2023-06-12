<?php

namespace Database\Factories;

use App\Models\Group;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $groupNumber = 1;
        $groupName = 'Group ' . $groupNumber;
        $groupNumber++; 

        return [
            'name' => $groupName
        ];
    }
}
