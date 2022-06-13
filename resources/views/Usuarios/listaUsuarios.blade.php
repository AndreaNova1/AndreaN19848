@extends('layoust.base') <!--para heredar de base-->
@section('title', 'Lista') <!--nombre pagina, nombre de seccion-->
@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container mt-7">
        <div class="row justify-content-center">
            <div class="cold-md-7">
                <h1 class="text-center mb-5">
                    <i class="fa fa-users"> Empleados Registrados</i>
                </h1>

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Registrado por:</th>

                    </tr>
                    </thead>

                    <tbody class="table-group-divider">

                    @foreach($users as $userss)
                        <tr>
                            <td>{{$userss->name}}</td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="row form-group">

                    <a class="btn btn-outline-secondary col-md-9 offset-2 text-dark" href="{{url('/listaEmpleado')}}" role="button">
                        <i class="far fa-hand-point-left"> Regresar</i>
                    </a>
                </div>
            </div>

            <!--paginas-->
            {{ $users->links() }}

        </div>
    </div>
    </div>

@endsection
