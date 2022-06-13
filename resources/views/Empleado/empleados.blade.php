@extends('layoust.base') <!--para heredar de base-->
@section('title', 'Formulario') <!--nombre pagina, nombre de seccion-->
@section('content')

    <style>
        body {
            height: 100%;
            margin: 0;
            font-family: Lato, sans-serif;
            background-color:     #E1E2E1;
        }
        header{
            background: #1488CC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2B32B2, #1488CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .card-header{
            background: #1488CC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2B32B2, #1488CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color:white;
        }
    </style>



    <!--Validacion de errores-->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif
    <div style="height: 20px;"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-lg p-3 mb-5 bg-white ">
                    <div class="card-header">Registrar Empleados</div>
                    <div class="card-body">


                        <form action="{{ route('Empleado.save')}}" method="POST" enctype="multipart/form-data" class="alerta" class="needs-validation">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-5 mb-4">
                                    <label for="codigo" >Codigo</label>
                                    <input type="text" name="codigo_empleado" class="form-control" placeholder="001-01"  required>
                                </div>

                                <div class="col-md-5 mb-4">
                                    <label for="nombre" >Nombre</label>
                                    <input type="text" name="nombre_empleado" class="form-control" placeholder="Primer Nombre"  required >
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-2 mb-4">
                                    <label for="telefono">Télefono</label>
                                    <input type="number" name="numero_telefono" class="form-control" placeholder="0000-0000"  required>
                                </div>

                                <div class="col-md-5 mb-4 offset-3">
                                    <label for="correo" >Correo</label>
                                    <input type="email" name="correo" class="form-control" placeholder="ejemplo@prograII"  required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-5 mb-4">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" name="direccion" class="form-control" placeholder="Colonia"  required>
                                </div>
                                <div class="col-md-5 mb-4">
                                    <label for="departamento">Departamento</label>
                                    <input type="text" name="departamento" class="form-control" placeholder="Puerto Barrios"  required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <input type="hidden" name="users_id"  value="{{auth()->user()->id}}">
                            </div>



                            <button type="submit" class="btn btn-primary "  >
                                <i class="fas fa-plus">  Guardar</i>
                            </button>
                            <a class="btn btn-primary  offset-2" href="{{url('/listaEmpleado')}}" role="button">
                                <i  class="fas fa-arrow-left"> Regresar</i>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('alerta')=='ok')

        <script>
            Swal.fire({
                title: 'No se pudo agregar la Inscripcion',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif

    @if(session('alertaQery')=='murio')

        <script>
            Swal.fire({
                title: 'No se pudo agregar la Inscripcion',
                text:'Es un error de Base de datos',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif
@endsection
