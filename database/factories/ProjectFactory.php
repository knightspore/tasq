<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site' => $this->faker->domainName(),
            'sop' => 'https://drive.google.com',
            'name' => $this->faker->company(),
            'niche' => $this->faker->randomElement(array('Travel', 'Fintech', 'Creative', 'Commerce','Academia','Entertainment')),
            'email' => $this->faker->unique()->safeEmail,
            'logo' => 'https://source.unsplash.com/random/500x500?logo',
            'comment' => $this->faker->paragraph(),
        ];
    }
}
