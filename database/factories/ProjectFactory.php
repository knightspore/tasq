<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {

    $niche = ['Travel', 'Fintech', 'Creative', 'Commerce','Academia','Entertainment'];

    return [
        'site' => $faker->domainName(),
        'sop' => 'https://drive.google.com',
        'name' => $faker->company(),
        'niche' => $niche[rand(0,5)],
        'email' => $faker->unique()->safeEmail,
        'logo' => 'https://source.unsplash.com/random/500x500?logo',
        'comment' => $faker->paragraph(),
    ];
});
