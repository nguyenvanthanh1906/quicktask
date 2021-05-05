<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('Tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        $task = Task::create($data);
        if ($task) {
            return redirect()->route('tasks.index')->with('success', 'Create new task successfully');
        } else {
            return redirect()->route('tasks.index')->with('error', 'Can not create new task');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        
        if ($task) {
            return view('Tasks.edit', compact('task'));
        } else {
            return redirect()->route('tasks.index')->with('error', 'Task is not exis');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $task = Task::find($id);
        if ($task) {
            $task->name = $request->name;
            $task->save();
            return redirect()->route('tasks.index')->with('success', 'Update task successfully');
        } else {
            return redirect()->route('tasks.index')->with('success', 'Can not update task');

        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Delete task successfully');
        } else {
            return redirect()->route('tasks.index')->with('error', 'Task is not exits');
        }
    }
}
