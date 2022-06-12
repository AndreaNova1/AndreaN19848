@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <style>
        body {
            height: 700px;
            background-image: url("https://blog.ssd.com.py/wp-content/uploads/2022/04/servicio-al-cliente-estrategia-de-servicio-al-cliente-ssd-paraguay-jpg-2.jpg");
            background-size: cover;
            background-repeat:no-repeat;
            background-position: center center;
        }
        .m{
            width: 60%;
            height: auto;
        }
        .form {
            width: 300px;
            height: 300px;
            display: grid;
            place-content: center;

            /* Add a transparency to the background
               using rgba value */
            background: rgba(255, 255, 255, 0.1);

            /* Add a transparency to shadow */
            box-shadow: 0 26px 42px rgba(0, 0, 0, 0.1);
        }

    </style>

    <div  style="background: rgba(255, 255, 255, 0.6)"
          class="block mx-auto my-12 p-8  w-1/3 border border-gray-200
    round-lg shadow-lg" >
        <h1 class="text-3xl text-center font-bold">INICAR SESION</h1>
        <div class="ima" >
            <img class="m offset-2" src="https://thumbs.dreamstime.com/b/seminario-web-de-videoconferencia-el-concepto-reuniones-en-l%C3%ADnea-vector-estilo-plano-dibujos-animados-ilustraci%C3%B3n-pantalla-210767271.jpg">
        </div>

        <form class="mt-10 "  method="POST" action="">
            @csrf

            <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email" id="email" name="email">

            <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password" id="password" name="password">

            @error('message')

            <p class="border border-red-500 rounded-md bg-red-100 w-full
            text-red-600 p-2 my-2">El correo y la contraseña son requeridos</p>
            @enderror


            <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
            text-white font-semibold p-2 my-3 hover:bg-indigo-600">Registrar</button>
        </form>
    </div>

@endsection
