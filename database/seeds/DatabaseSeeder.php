<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Ciaran',
        //     'role' => 'Head Developer',
        //     'location' => 'Cape Town, South Africa',
        //     'email' => 'test@test.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('testtest'),
        //     'remember_token' => Str::random(10),
        //     ]);

        factory(\App\User::class, 5)->create();
        factory(\App\Project::class, 5)->create();
        factory(\App\Task::class, 20)->create();

        $wip = Task::all()->where('progress', '==', 'WIP');

        foreach($wip as $w) {
            $w->user = User::all()->random()->id;
            $w->save();
        };
    }
}
