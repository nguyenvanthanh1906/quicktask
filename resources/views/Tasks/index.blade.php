@extends('layouts.app')

@section('content')
  <div class="container">
      @include('common.notification')
      <h2>{{ trans('localization.taskslist') }}</h2>
      <a href="{{ Route('tasks.create', ['locale' => Request::segment(1)]) }}" class="btn btn-primary float-right">{{ trans('localization.newtask')}}</a>
      <table class="table">
        <thead>
          <tr>
            <th>{{session('language')}}</th>
            <th>{{ trans('localization.name') }}</th>
            <th>{{ trans('localization.action') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tasks as $key=>$task)
          <tr>
            <td>{{$key + 1}}</td>
            <td>{{$task->name}}</td>
            <td>
              <a href="{{ Route('tasks.edit', ['task' => $task->id, 'locale' => Request::segment(1)])}}" class="btn btn-success">{{ trans('localization.edit') }}</a>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$task->id}}">{{ trans('localization.delete') }}</button>
              <div class="modal" id="myModal{{$task->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      {{ trans('localization.suredelete') }}
                    </div>
                    <div class="modal-footer">
                      <form action="./tasks/delete/{{$task->id}}" method="post">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ trans('localization.delete') }}</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$tasks->render('common.pagination')}}
    </div>
@endsection
