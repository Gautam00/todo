<?php

namespace App\Http\Controllers;

use Auth;
use App\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $tasks = Todo::where('user_id', Auth::user()->id)->withTrashed()->get();
        return view('home', compact('tasks'));

    }


    public function addTask(Request $request) {

        // dd($request);

        $request->validate([

            'name' => 'required'

        ]);
            
        $task = Todo::create([

            'name' => request('name'),
            'user_id' => Auth::user()->id
            
        ]); 

        return redirect()->back()->with('message-success', 'Task has been added.');

    }

    public function editTask($id)
    {

        $task = Todo::findOrFail($id);

        return view('partials.editTask', compact('task'));
    }

    public function updateTask($id)
    {

        Todo::findOrFail($id)->update([
            'name' => request('name')
        ]);

        return redirect('/home')->with('message-success', 'Task has been updated'); 
    }

    public function deleteTask($id)
    {

        Todo::destroy($id);

        return redirect('/home')->with('message-success-delete', 'Task has been deleted'); 
    }


}
