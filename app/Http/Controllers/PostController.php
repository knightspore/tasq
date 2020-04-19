<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;
use Asana\Client;

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

        //Fill Post User
        $currentTask = Posts::findOrFail($taskId);
        $currentTask->update(['user' => $user]);
        $currentTask->update(['progress' => 'WIP']);
        
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

        //Success
        Session::flash('success', 'You are now the editor.');
       
        return back();
    }

    public function complete() 
    {   
        $taskId = request('task_id');

        //Set Status to Complete
        $currentTask = Posts::findOrFail($taskId);
        $currentTask->update(['progress' => 'Complete']);

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
        Session::flash('success', 'Live link added. Remember to Archive this Post.');
       
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
        $token = getenv('1/898650441958819:ee9a906811ddb6d29c939372d5a8b91c');

        // Access Token Instructions:
        
        // 1. set your token environment variable to a Personal Access Token found in Asana Account Settings
        
        if ($token === false) {
            dd("Please set the ASANA_ACCESS_TOKEN environment variable.");
        }
        
        // create a $client->with a Personal Access Token
        $client = Asana\Client::accessToken($token);
        $me = $client->users->me();
        dd($client->users->me());
    }

}
