<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        if(auth()->attempt(request(['email', 'password'])) == false){
            return back()->withErrors([
                'message' => 'El correo y clave son incorrectos, por favor verificar datos'
            ]);
        }
        return redirect()->to('/listaEmpleado');
    }
    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
    public function login(){
        return view('auth.login');
    }
}
