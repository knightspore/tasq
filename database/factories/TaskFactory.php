<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\Project;
use App\User;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {

    $taskTitles = ['Things to do in ', 'How to Make ', 'Learning about ', 'How we created '];
    $prog = ['Not Picked Up', 'WIP'];

    return [
        'priority' => rand(4,10),
        'due' => $faker->dateTimeThisYear(),
        'is_client' => 1,
        'progress' => $faker->randomElement($prog),
        'site' => Project::all()->random()->site,
        'type' => $faker->randomElement(array('List Post','Blog Post','General Content', 'Web Copy')),
        'name' => $faker->randomElement($taskTitles).$faker->city,
        'words' => $faker->randomDigitNot(0).'000',
        'comment' => $faker->paragraph(),
    ];
});
