<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TasksRequest;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(config('app.limit'));

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
    public function store(TasksRequest $request)
    {
        $data = $request->all();
        $task = Task::create($data);
        if ($task) {

            return redirect()->route('tasks.index', ['locale' => $request->segment(1)])->with('success', trans('localization.createsuccess'));
        } else {

            return redirect()->route('tasks.index', ['locale' => $request->segment(1)])->with('error', trans('localization.createfail'));
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
    public function edit(Request $request)
    {
        $task = Task::find($request->segment(3));
        if ($task) {

            return view('Tasks.edit', compact('task'));
        } else {

            return redirect()->route('tasks.index', ['locale' => $request->segment(1)])->with('error', trans('localization.noexittask'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TasksRequest $request)
    {
        $data = $request->all();
        $task = Task::find($request->task);
        if ($task) {
            $task->name = $data['name'];
            $task->save();

            return redirect()->route('tasks.index', ['locale' => $request->locale])->with('success', trans('localization.updatesuccess'));
        } else {

            return redirect()->route('tasks.index', ['locale' => $request->locale])->with('error', trans('localization.noexittask'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $task = Task::find($request->task);
        if($task) {
            $task->delete();

            return redirect()->route('tasks.index', ['locale' => $request->locale])->with('success', trans('localization.deletesuccess'));
        } else {
            
            return redirect()->route('tasks.index', ['locale' => $request->locale])->with('error', trans('localization.noexittask'));
        }
    }
}
