@extends('layout')

@section('content')

    <h3>Crear nueva tarea: </h3>

    
    <form method="POST" action="{{ route('tasks.store') }}">
        {{ csrf_field()}}

        <label for="name"> Nombre de la nueva tarea : </label>
        <input type="text" name="title" placeholder="trabajar">
        <input type="hidden" name="user_id" value="{{ Request::route('user') }}">
        <button type="submit" class="btn btn-primary">Submit</button>
       
    </form>

   
@endsection