@extends('layoust.base') <!--para heredar de base-->
@section('title', 'Lista') <!--nombre pagina, nombre de seccion-->
@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="cold-md-11">
                <h1 class="text-center mb-5">
                    <i class="fa fa-users"> Empleados Registrados</i>
                </h1>

                <a class="btn btn-success mb-4" href="{{url('/formEmpleado')}}">
                    <i class="fas fa-user-plus"> AGREGAR</i>
                </a>

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Télefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Registrado por:</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>

                    <tbody class="table-group-divider">

                    @foreach($empleado as $empleados)
                        <tr>
                            <td>{{$empleados->codigo_empleado}}</td>
                            <td>{{$empleados->nombre_empleado}}</td>
                            <td>{{$empleados->numero_telefono}}</td>
                            <td>{{$empleados->correo}}</td>
                            <td>{{$empleados->direccion}}</td>
                            <td>{{$empleados->departamento}}</td>
                            <td>{{$empleados->name}}</td>

                            <td>

                                <div class="btn-group">

                                    <a href="{{ route('editformEmpleado', $empleados->codigo_empleado) }}" class="btn btn-primary mb-3 mr-2">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('deleteEmpleado', $empleados->codigo_empleado)}}"method="POST" class="Alert-eliminar">
                                        @csrf @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt">Eliminar</i>
                                        </button>

                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

            <!--paginas-->
            {{ $empleado->links() }}

        </div>
    </div>
    </div>

@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Mensaje de Modificacion-->
    @if(session('empleadosModificado')=='Modificado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registro Modificado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <!--Mensaje de Guardado-->
    @if(session('RegistroGuardado')=='Guardado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registro Guardado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif


    <!--Mensaje de Eliminado-->
    @if(session('RegistroEliminado')=='Eliminado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'se elimino el registro exitosamente',
                'success'
            )
        </script>
    @endif
    <script>
        $('.Alert-eliminar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: '¿Esta seguro que desea eliminar el registro?',
                text: "Si presiona si se eliminara definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

    @if(session('alerta')=='ok')

        <script>
            Swal.fire({
                title: 'No se puede eliminar el registro',
                text:'Este registro puede no ser seguro',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif
@endsection
