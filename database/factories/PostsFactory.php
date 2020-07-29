<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Posts;
use App\Project;
use App\User;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {

    $taskTitles = ['Things to do in ', 'How to Make ', 'Learning about ', 'How we created '];
    $prog = ['Not Picked Up', 'WIP'];

    return [
        'priority' => rand(4,10),
        'level' => rand(1,5),
        'due' => $faker->dateTimeThisYear(),
        'project' => 'Client',
        'progress' => $faker->randomElement($prog),
        'site' => Project::all()->random()->site,
        'type' => $faker->randomElement(array('List Post','Blog Post','General Content', 'Web Copy')),
        'task' => $faker->randomElement($taskTitles).$faker->city,
        'words' => $faker->randomDigitNot(0).'000',
        'comment' => $faker->paragraph(),
    ];

});
