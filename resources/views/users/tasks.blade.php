@extends('layout')

@section('content')

<h1>{{$user->name}}  </h1>

<div class="row">
    <div class="col-md-12 my-3">
        @if(Auth::id() == $user->id)
            <a class="btn btn-sm btn-link float-right" href="{{ route('tasks.create',['user' => $user])}}">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> Crear tarea
            </a>
         @endif
    
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tasks</th>
                <th scope="col">Status</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>    
                <td>{{$task->id}}</td>
                <td>{{$task->title}}</td>
        
                <td>@if(Auth::id() == $task->user_id)
                        <form method="POST" action="{{ route('tasks.update', ['task' => $task]) }}">
                            {{csrf_field()}}
                            @method('PUT')
                            <input type="hidden" name='is_completed' value="{{ $task->is_completed ? '0' : '1' }}">
                            <button type="submit" class="btn btn-{{ $task->is_completed ? 'warning' : 'success' }}">{{ $task->is_completed ? 'Incomplete' : 'Complete' }}</button>
                        </form>
                    @endif
                </td>
        
                <td>@if(Auth::id() == $task->user_id)
                        <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
                            {{csrf_field()}}
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"> Delete <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-dash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5-.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                            </svg> </button>
                        </form>
                    @endif
                </td>
                
                </tr>  
        
                @endforeach
        
            </tbody>
        
          </table>
    </div>
</div>
    

  
  
    


    <!--<ul> 
        @foreach ($tasks as $task)
            <li>
                <p class="{{ $task->is_completed ? 'completed' : '' }}">{{ $task->title }}</p>
            </li>  
                @if(Auth::id() == $task->user_id)
                    <form method="POST" action="{{ route('tasks.update', ['task' => $task]) }}">
                        {{csrf_field()}}
                        @method('PUT')
                        <input type="hidden" name='is_completed' value="{{ $task->is_completed ? '0' : '1' }}">
                        <button type="submit" class="btn btn-{{ $task->is_completed ? 'warning' : 'success' }}">{{ $task->is_completed ? 'Incomplete' : 'Complete' }}</button>
                    </form>

            
                    <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
                        {{csrf_field()}}
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> Delete <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-dash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5-.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                        </svg> </button>
                    </form>
                  @endif

        @endforeach

  
  -- !> </ul>

@endsection