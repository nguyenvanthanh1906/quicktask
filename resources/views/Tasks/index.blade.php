@extends('layouts.app')

@section('content')
  <div class="container">
      @include('common.notification')
      <h2>{{ trans('i18n.taskslist') }}</h2>
      <div class="form-group col-lg-2">
        <label for="sel1">{{ trans('i18n.languagelist')}}</label>
        <select class="form-control" id="sel1" onchange="handleSelect(this)">
          <option value="./i18n/vi" @if (session('language') == 'vi') selected @endif>{{ trans('i18n.vietnamese')}}</option>
          <option value="./i18n/en" @if (session('language') == 'en') selected @endif>{{ trans('i18n.english')}}</option>
          
        </select>
      </div>
      <a href="{{Route('tasks.create')}}" class="btn btn-primary float-right">{{ trans('i18n.newtask')}}</a>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>{{ trans('i18n.name') }}</th>
            <th>{{ trans('i18n.action') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tasks as $key=>$task)
          <tr>
            <td>{{$key + 1}}</td>
            <td>{{$task->name}}</td>
            <td>
              <a href="{{Route('tasks.edit', [$task->id])}}" class="btn btn-success">{{ trans('i18n.edit') }}</a>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$task->id}}">{{ trans('i18n.delete') }}</button>
              <div class="modal" id="myModal{{$task->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body">
                        {{ trans('i18n.suredelete') }}
                      </div>
                      <div class="modal-footer">
                          <form action="{{Route('tasks.destroy', [$task->id])}}" method="post">
                              {{ csrf_field() }}
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">{{ trans('i18n.delete') }}</button>
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
    <script type="text/javascript"> 
      function handleSelect(elm) 
      { 
      window.location = elm.value; 
      } 
    </script> 
@endsection
