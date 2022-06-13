<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Http\Controllers\users;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    //Lista
    public function listaEmpleados(Request $request)
    {
        $empleado = DB::table('registro_de_empleados')
            ->join('users','registro_de_empleados.users_id', '=', 'users.id')
            ->select('registro_de_empleados.*','users.name')
            ->paginate(5);//el numero de filas


        return view('Empleado.listaEmpleado', compact('empleado'));
    }

    //Formulario
    public function formEmpleado()
    {
        $Users=User::all();

        return view('Empleado.empleados', compact('Users'));

    }

    //Guardar
    public function saveEmpleado(Request $request)
    {
        $validator_l = $this->validate($request, [
            'codigo_empleado' => 'required',
            'nombre_empleado' => 'required',
            'numero_telefono' => 'required',
            'correo' => 'required',
            'direccion' => 'required',
            'departamento' => 'required',
            'users_id' => 'required',

        ]);

        //es "nombre"
        empleado::create([
            'codigo_empleado' => $validator_l['codigo_empleado'],
            'nombre_empleado' => $validator_l['nombre_empleado'],
            'numero_telefono' => $validator_l['numero_telefono'],
            'correo' => $validator_l['correo'],
            'direccion' => $validator_l['direccion'],
            'departamento' => $validator_l['departamento'],
            'users_id' => $validator_l ['users_id'],
        ]);


        return redirect('listaEmpleado')->with('RegistroGuardado', 'Guardado');

    }

    //Formulario Editar
    public function editformEmpleado($codigo_empleado)
    {

        $empleado = empleado::findOrFail($codigo_empleado);

        return view('Empleado.editEmpleado', compact('empleado'));
    }

    //Editar
    public function editEmpleado(Request $request, $codigo_empleado)
    {
        $datoEmpleado = request()->except((['_token', '_method']));
        empleado::where('codigo_empleado', '=', $codigo_empleado)->update($datoEmpleado);

        return redirect('/listaEmpleado')->with('RegistroModificado', 'Modificado');
    }

    //Eliminar
    public function destroy($codigo_empleado)
    {
        try {
            Empleado::destroy($codigo_empleado);

            return redirect('/listaEmpleado')->with('RegistroEliminado', 'Eliminado');

        } catch (\Exception $exception) {

            Log::debug($exception->getMessage());

            return redirect('/listaempleado')->with('alerta', 'ok');
        }
    }
    public function listaUsuarios(Request $request)
    {
        $users = DB::table('users')
            ->select('users.*')
            ->paginate(5);


        return view('Usuarios.listaUsuarios', compact('users'));
    }
}
