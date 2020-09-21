@extends('layout')

@section('content')


    <h3>Crear usuario: </h3>

        @if($errors->any())
        <div class="alert alert-danger">
            <H6>Por favor corrija los siguientes errores : </H6>
            <ul>
                @foreach ($errors->all() as $error)

                    <li>{{$error}}</li>
                    
                @endforeach
            </ul>
        </div>

        @endif
    <form method="POST" action="{{route('users.store')}}">
        {{csrf_field()}}

        <label for="name"> Nombre : </label>
        <input type="text" name="name" placeholder="Juan">
        <br>
        <label for="email"> Correo electonico : </label>
        <input type="email" name="email" placeholder="juan@gmail.com">   
        <br>
        <label for="password"> Contraseña : </label>
        <input type="password" name="password" placeholder="Mayor a 6 Char">
        <br>
        <button type="submit">Cear usuario</button>

    </form>

    
@endsection