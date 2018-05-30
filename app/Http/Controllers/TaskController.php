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
        return view('tasks.index', ['tasks' => $tasks]);
    }

    function create() {
        return view('tasks.create');
    }

    function show() {
        return view('tasks.show');
    }

    function edit(Task $task) {
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    function update(Task $task, Request $request) {
        //var_dump($request);
        $task = Task::find($request->id);
        $task->name = $request->name;
        $task->save();
        return redirect();
    }

    function destroy($id) {
        //$this->authorize('destroy', $task);
        $this->authorize('destroy', $this->tasks->find($id));
        $this->tasks->destroy($id);
        return redirect(route('tasks.index'));
    }

}
