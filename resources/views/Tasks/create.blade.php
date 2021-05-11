@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ trans('localization.addtask') }}</h2>
        <form action="{{ Route('tasks.store', ['locale' => Request::segment(1)]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">{{ trans('localization.task')}}</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> {{ trans('localization.addtask')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
