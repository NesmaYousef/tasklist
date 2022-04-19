
@extends('layouts.app')
@section('content')
<div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            New Task
        </div>

        <div class="panel-body">
            <!-- Display Validation Errors -->

    @if ($errors->any())
<   div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    @endif
@if (isset($task))
                <!-- Edit Task Form -->
                <form action="{{url('update/'.$task->id)}}" method="POST" class="form-horizontal">
                    @csrf
                    @method('PATCH')
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Update Task
                            </button>
                        </div>
                    </div>
                </form>

                @else
                <!-- New Task Form -->
                <form action="/task/store" method="POST" class="form-horizontal">
                    @csrf
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="">
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add Task
                            </button>
                        </div>
                    </div>
                </form>
                @endif

            </div>
        </div>

        <!-- Current Tasks -->
        <div class="card card-default">
            <div class="card-header">
                Current Tasks
            </div>

            <div class="card-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td class="table-text"><div>{{$task->name}}</div></td>

                            <!-- Task Delete Button -->
                            <td>
                                <form action="/task/destroy/{{$task->id}}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="/edit/{{$task->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-trash"></i>Edit
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>

@endsection
