@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ Route('tasks.update', ['task' => $task->id, 'locale' => Request::segment(1)])}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">{{ trans('localization.edittask')}}</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> {{ trans('localization.updatetask')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
