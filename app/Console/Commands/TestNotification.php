<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Posts;
use App\Notifications\TaskCompleted;
use App\Notifications\TaskEdited;
use App\Notifications\TaskPickedup;
use Asana\Client;

class TestNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:slack';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test slack notifications';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Posts::findOrFail(44)->notify(new TaskCompleted());

        

        // $assignee = User::first()->asana_id;
        // $workspace_id = 476947142694091;

        // $tasks = asana()->getUserInfo('matt@traveltractions.com')->data;

        
    }
}
