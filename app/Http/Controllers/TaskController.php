<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Task;

class TaskController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect(route('tasks.index'));
    }

    function index(Request $request) {
        $tasks = $request->user()->tasks()->get();
        
        return view('tasks.index',['tasks'=>$tasks]);
    }

    function create() {
        return view('tasks.create');
    }

    function show() {
        return view('tasks.show');
    }

    function edit() {
        return view('tasks.edit');
    }

    function update() {
        return redirect();
    }

    function destroy(Task $task, Request $request) {
         $this->authorize('destroy', $task);
        $task->delete();
        return redirect(route('tasks.index'));
    }

}
