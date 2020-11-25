<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Project;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $taskTitles = ['Things to do in ', 'How to Make ', 'Learning about ', 'How we created '];
        $prog = ['Not Picked Up', 'WIP'];

        return [
            'due' => $this->faker->dateTimeThisYear(),
            'progress' => $this->faker->randomElement($prog),
            'project' => Project::all()->random()->id,
            'type' => $this->faker->randomElement(array('List Post','Blog Post','General Content', 'Web Copy')),
            'name' => $this->faker->randomElement($taskTitles).$this->faker->city,
            'words' => $this->faker->randomDigitNot(0).'000',
            'comment' => $this->faker->paragraph(),
        ];
    }
}
