@extends('layout')

@section('content')


    <h1>Tasks:</h1>

    <ul>
        @foreach ($tasks as $task)
            <li>
                {{$task->user->name }}{{ $task->title }} - {{ $task->is_completed ? 'Done' : 'Not yet' }} -
                @if($task->user->is(auth()->user()));
                    <a href="{{ route('tasks.edit', ['task' => $task]) }}">
                        Edit
                    </a>
                @endif
            </li>
        @endforeach 
    </ul>
@endsection