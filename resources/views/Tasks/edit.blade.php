@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="container">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
        <form action="{{ Route('tasks.update', [$task->id]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            @method('PUT')
            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Edit Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Update Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->
@endsection