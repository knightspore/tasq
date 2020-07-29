<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    $p = Hash::make('testtest');

    return [
        'name' => 'Ciaran',
        'role' => 'Head Developer',
        'location' => 'Cape Town, South Africa',
        'email' => 'test@test.com',
        'email_verified_at' => now(),
        'password' => $p,
        'remember_token' => Str::random(10),
    ];
});
