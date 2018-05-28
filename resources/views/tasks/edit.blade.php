@extends('layouts.app')

@section('content')
<div class="container">
    @include('common.errors')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(!empty($task))
                    <!-- Форма новой задачи -->
                    <form action="{{ url(route('tasks.store')) }}" method="POST" class="form-horizontal" >
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{$task->id}}">

                        <!-- Имя задачи -->
                        <div class="form-group">
                            <label for="task" class="col-sm-3 control-label">Редактировать</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
                            </div>
                        </div>

                        <!-- Кнопка добавления задачи -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-save"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                    <p>no task for edit<a href="{{ url('/tasks') }}">to all tasks</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
