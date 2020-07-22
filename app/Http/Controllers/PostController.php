<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;
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

    // View Task Cards

    public function index()
    {
        $tasks = Posts::all();

        return view('post', [
            'tasks' => $tasks
        ]);
    }

    // Edit Post

    public function edit($id)
    {
        $task = Posts::findOrFail($id);
        $users = User::all();

        return view('task.edit', [
            'task' => $task,
            'users' => $users,
        ]);
    }

    // Save Edited Changes

    public function save($id)
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

        $t = Posts::findOrFail($id);
        $t->update(['task' => $task]);
        $t->update(['user' => $user]);
        $t->update(['editor' => $editor]);
        $t->update(['site' => $site]);
        $t->update(['due' => $due]);
        $t->update(['priority' => $priority]);
        $t->update(['level' => $level]);
        $t->update(['type' => $type]);
        $t->update(['points' => $points]);
        $t->update(['comment' => $comment]);
        $t->update(['folder' => $folder]);
        $t->update(['live' => $live]);
        $t->update(['archived' => $archived]);


        Session::flash('success', 'Task Info Updated.');

        $users = User::all();

        return view('task', [
            'task'=>$t,
            'users' => $users,
        ]);

    }

    // Create New Post

    public function new() {

        $users = User::all();

        return view('new', [
            'users' => $users,
        ]);
    }

    // VIEW INDIVIDUAL POST
    public function view($id) {
        $post = Posts::findOrFail($id);
        $users = User::all();

        return view('task', [
            'task'=>$post,
            'users' => $users,
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

        //Success
        Session::flash('success', 'You picked up a new task.');

        $users = User::all();

        return view('home', [
            'task'=>$curTask,
            'users' => $users,
        ]);

    }

    // ADD EDITOR TO TASK
    public function editing()
    {
        $user = request('user_id');
        $taskId = request('task_id');

        //Fill Post Editor
        $curTask = Posts::findOrFail($taskId);
        $curTask->update(['editor' => $user]);
        $curTask->update(['progress' => 'Editing']);
        $curTask->notify(new TaskEdited);

        //Success
        Session::flash('success', 'You are now the editor.');

        $users = User::all();

        return view('task', [
            'task'=>$curTask,
            'users' => $users,
        ]);
    }

    // COMPLETE TASK
    public function complete()
    {
        $taskId = request('task_id');

        // Date Processin doesn't work
        $date = date(Carbon::now());

        //Set Status to Complete
        $curTask = Posts::findOrFail($taskId);
        $curTask->update(['progress' => 'Complete']);
        $curTask->update(['completed' => $date]);

        // Send Slack Notification to #content
        $curTask->notify(new TaskCompleted);

        //Success
        Session::flash('success', 'You marked this task complete.');

        $users = User::all();

        return view('task', [
            'task'=>$curTask,
            'users' => $users,
        ]);
    }

    public function folder()
    {
        $taskId = request('task_id');
        $folder = request('postfolder');

        //Set task folder
        $curTask = Posts::findOrFail($taskId);
        $curTask->update(['folder' => $folder]);

        //Success
        Session::flash('success', 'Folder Link Added.');

        $users = User::all();

        return view('task', [
            'task'=>$curTask,
            'users' => $users,
        ]);
    }

    public function livelink()
    {
        $taskId = request('task_id');
        $livelink = request('livelink');

        //Set live link
        $curTask = Posts::findOrFail($taskId);
        $curTask->update(['live' => $livelink]);

        //Success
        Session::flash('success', 'Live link added.');

        $users = User::all();

        return view('task', [
            'task'=>$curTask,
            'users' => $users,
        ]);

    }

    // Archive Task
    public function archivepost()
    {
        //Archive Task
        $task = Posts::findOrFail(request('task_id'));
        $task->update(['archived' => '1']);
        $task->update(['priority' => '0']);

        //Success
        Session::flash('success', 'Post Archived.');

        $users = User::all();

        return view('task', [
            'task'=>$task,
            'users' => $users,
        ]);
    }

}
