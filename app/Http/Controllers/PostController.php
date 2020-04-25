<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;
use Asana\Client;
use App\Notifications\TaskCompleted;
use App\Notifications\TaskEdited;
use App\Notifications\TaskPickedup;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $tasks = Posts::all();
        
        return view('post', [
            'tasks' => $tasks
        ]);
    }

    public function edit($id)
    {
        $task = Posts::findOrFail($id);
        $users = User::all();
        
        return view('task.edit', [
            'task' => $task,
            'users' => $users,
        ]);
    }

    public function update($id)
    {
        $updatedby = request('updated_by');
        $task = request('taskname');
        $user = request('user');
        $editor = request('editor');
        $site = request('site');
        $due = request('due');
        $priority = request('priority');
        $level = request('level');
        $type = request('type');
        $points = request('points');
        $project = request('project');
        $comment = request('comment');
        $folder = request('folder');
        $live = request('live');
        $archived = request('archived');

        $selectedTask = Posts::findOrFail($id);  
        $selectedTask->update(['task' => $task]);
        $selectedTask->update(['user' => $user]);
        $selectedTask->update(['editor' => $editor]);
        $selectedTask->update(['site' => $site]);
        $selectedTask->update(['due' => $due]);
        $selectedTask->update(['priority' => $priority]);
        $selectedTask->update(['level' => $level]);
        $selectedTask->update(['type' => $type]);
        $selectedTask->update(['points' => $points]);
        $selectedTask->update(['comment' => $comment]);
        $selectedTask->update(['folder' => $folder]);
        $selectedTask->update(['live' => $live]);
        $selectedTask->update(['archived' => $archived]);

        
        Session::flash('success', 'Task Info Updated.');

        return back();
    }

    // VIEW INDIVIDUAL POST
    public function view($id) {
        $client = Client::accessToken('1/898650441958819:ee9a906811ddb6d29c939372d5a8b91c');
        $postId = Posts::findOrFail($id);
        $users = User::all();

        return view('task', [
            'task'=>$postId,
            'users' => $users,
            'client' => $client
        ]);
    }

    // ADD USER TO TASK
    public function pickup() 
    {
        $user = request('user_id');
        $taskId = request('task_id');

        // Fill Post User
        $curTask = Posts::findOrFail($taskId);
        $curTask->update(['user' => $user]);
        $curTask->update(['progress' => 'WIP']);
        $curTask->notify(new TaskPickedup);

        // Create new Asana Task
        $name = "$curTask->type | $curTask->task";
        // $email = User::findOrFail($user)->email;
        $email = User::findOrFail($user)->email;
        $notes = "$curTask->site | $curTask->points Points | $curTask->comment";
        $due_on = $curTask->due;

        asana()->createTask([
            'name'      => $name, // Name of task
            'assignee'  => $email, 
            'notes'     => $notes,
            'due_on'    => $due_on,
         ]);

        //Success
        Session::flash('success', 'You picked up a new task.');
       
        return back();

    }

    // ADD EDITOR TO TASK
    public function editing() 
    {
        $user = request('user_id');
        $taskId = request('task_id');

        //Fill Post Editor
        $currentTask = Posts::findOrFail($taskId);
        $currentTask->update(['editor' => $user]);
        $currentTask->update(['progress' => 'Editing']);
        $currentTask->notify(new TaskEdited);

        //Success
        Session::flash('success', 'You are now the editor.');
       
        return back();
    }

    // COMPLETE TASK
    public function complete() 
    {   
        $taskId = request('task_id');

        // Date Processin doesn't work
        $date = date(Carbon::now());

        //Set Status to Complete
        $currentTask = Posts::findOrFail($taskId);
        $currentTask->update(['progress' => 'Complete']);
        $currentTask->update(['completed' => $date]);

        // Send Slack Notification to #content
        $currentTask->notify(new TaskCompleted);

        //Success
        Session::flash('success', 'You marked this task complete.');
       
        return back();
    }

    public function folder() 
    {
        $taskId = request('task_id');
        $folder = request('postfolder');

        //Set task folder
        $currentTask = Posts::findOrFail($taskId);
        $currentTask->update(['folder' => $folder]);

        //Success
        Session::flash('success', 'Folder Link Added.');
       
        return back();
    }

    public function livelink() 
    {
        $taskId = request('task_id');
        $livelink = request('livelink');

        //Set live link
        $currentTask = Posts::findOrFail($taskId);
        $currentTask->update(['live' => $livelink]);

        //Success
        Session::flash('success', 'Live link added.');
       
        return back();

    }

    public function archivepost() 
    {

        //Archive Task
        $currentTask = Posts::findOrFail(request('task_id'));
        $currentTask->update(['archived' => '1']);
        $currentTask->update(['priority' => '0']);

        //Success
        Session::flash('success', 'Post Archived.');
       
        return back();
    }   

    public function asana()
    {
        $token = env("ASANA_TOKEN");

        // Access Token Instructions:
        
        // 1. set your token environment variable to a Personal Access Token found in Asana Account Settings
        
        if ($token === false) {
            dd("Token Rejected");
        }
        
        // create a $client->with a Personal Access Token
        $client = Asana\Client::accessToken($token);
        $me = $client->users->me();
        dd($me);
    }

}
