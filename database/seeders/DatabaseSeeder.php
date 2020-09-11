<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        User::factory()->times(5)->create();
        Project::factory()->times(5)->create();
        Task::factory()->times(20)->create();

        $wip = Task::all()->where('progress', '==', 'WIP');

        foreach($wip as $w) {
            $w->user = User::all()->random()->id;
            $w->save();
        };
    }
}
