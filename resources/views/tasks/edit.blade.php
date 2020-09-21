@extends('layout')

@section('content')
    <div class="row">
        <div class="col-6">
            <h1>Tasks #{{ $task->id }}</h1>
            <hr>
            <form action="{{ route('tasks.update', ['task' => $task ])}}">
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" value="{{ $task->title }}" type="text" class="form-control" >
                </div>
                <div class="form-group form-check">
                    <input name="is_completed" type="checkbox" id="is_completed" >
                    <label for="is_completed" class="form-check-label">Done</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection