@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="container">
        @include('common.notification')
        <h2>Tasks List</h2>
        <a href="{{Route('tasks.create')}}" class="btn btn-primary float-right">New Task</a>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tasks as $key=>$task)
            <tr>
              <td>{{$key + 1}}</td>
              <td>{{$task->name}}</td>
              <td>
                <a href="{{Route('tasks.edit', [$task->id])}}" class="btn btn-success">Edit</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$task->id}}">Delete</button>
                <div class="modal" id="myModal{{$task->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                          Are you sure delete this record ?
                        </div>
                        <div class="modal-footer">
                            <form action="{{Route('tasks.destroy', [$task->id])}}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
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
      </div>
    <!-- TODO: Current Tasks -->
@endsection