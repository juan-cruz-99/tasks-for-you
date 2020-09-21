<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], [
            'name.requirid' => 'El campo nombre es obigaorio'
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return  redirect()->route('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function nick($nombre, $nick = null)
    {
        if ($nick) {
            return "Saludos {$nombre} , tu nick de usuario es {$nick} ";
        } else {
            return "Saludos {$nombre} , no tienes nick de usuario";
        }
    }

    public function destroy(User $user)
    {
        $user->tasks()->delete();
        $user->delete();

        return redirect()->back();
    }
}
