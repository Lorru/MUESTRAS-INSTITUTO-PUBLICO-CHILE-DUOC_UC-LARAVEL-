<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\EstadoUsuario;
use App\DatosUsuarioCliente;
use App\Empresa;
use App\Empleado;
use App\Perfil;
use Hash;

class UsuariosController extends Controller
{
    function __construct()
    {
        $this->middleware('usuarios', ['except' => ['edit', 'update']]);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::join('perfil', 'perfil.id_perfil', 'usuario.id_perfil')
                           ->join('estado_usuario', 'estado_usuario.id_estado_usuario', 'usuario.id_estado_usuario')
                           ->paginate(5);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfiles = Perfil::where('id_perfil', '!=', 4)->get();
        return view('usuarios.create', compact('perfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $correo = $request->input('correo');
        $buscarUsuario = Usuario::where("correo_usuario", "=", $correo)->get();

        if($buscarUsuario->count() > 0)
        {
            return back()->with('errorRegistrarEmpleado', 'Usuario ya existe');
        }
        else
        {
            $empleado = new Empleado;
            $empleado->rut_empleado = $request->input('rut');
            $empleado->primer_nombre_empleado = strtoupper($request->input('primerNombre'));
            $empleado->segundo_nombre_empleado = strtoupper($request->input('segundoNombre'));
            $empleado->primer_apellido_empleado = strtoupper($request->input('primerApellido'));
            $empleado->segundo_apellido_empleado = strtoupper($request->input('segundoApellido'));
            $empleado->save();

            $nombreCompleto = $request->input('primerNombre') . " " . $request->input('segundoNombre') . " " . $request->input('primerApellido') . " " . $request->input('segundoApellido');
            $usuario = new Usuario;
            $usuario->id_estado_usuario = 1;
            $usuario->id_perfil = $request->input('perfil');
            $usuario->id_empleado = $empleado->id_empleado;
            $usuario->nombre_usuario = strtoupper($nombreCompleto);
            $usuario->correo_usuario = $request->input('correo');
            $usuario->clave_usuario = Hash::make($request->input('clave'));
            $usuario->save();

            return back()->with('registrarEmpleado', 'Se registro el empleado correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::join('perfil', 'perfil.id_perfil', 'usuario.id_perfil')
                          ->join('estado_usuario', 'estado_usuario.id_estado_usuario', 'usuario.id_estado_usuario')
                          ->leftJoin('datos_usuario_cliente', 'usuario.id_datos_usuario_cliente', 'datos_usuario_cliente.id_datos_usuario_cliente')
                          ->leftJoin('empleado', 'usuario.id_empleado', 'empleado.id_empleado')
                          ->leftJoin('empresa', 'empresa.id_datos_usuario_cliente',  'datos_usuario_cliente.id_datos_usuario_cliente')
                          ->where('usuario.id_usuario', '=', $id)
                          ->first();

        return view('usuarios.show', compact('usuario'));                          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::join('perfil', 'perfil.id_perfil', 'usuario.id_perfil')
                          ->join('estado_usuario', 'estado_usuario.id_estado_usuario', 'usuario.id_estado_usuario')
                          ->leftJoin('datos_usuario_cliente', 'usuario.id_datos_usuario_cliente', 'datos_usuario_cliente.id_datos_usuario_cliente')
                          ->leftJoin('empleado', 'usuario.id_empleado', 'empleado.id_empleado')
                          ->leftJoin('empresa', 'empresa.id_datos_usuario_cliente',  'datos_usuario_cliente.id_datos_usuario_cliente')
                          ->where('usuario.id_usuario', '=', $id)
                          ->first();

        $estadoUsuario = EstadoUsuario::all();                          

        return view('usuarios.edit', compact(['usuario', 'estadoUsuario']));                          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::where('id_usuario', '=', $id)
                          ->first();
        
        $validarUsuarioEmpresa = Usuario::leftJoin('empresa', 'empresa.id_datos_usuario_cliente',  'usuario.id_datos_usuario_cliente')
                          ->where('usuario.id_usuario', '=', $id)
                          ->first();                          
        
        if($usuario->id_perfil == 1 || $usuario->id_perfil == 2 || $usuario->id_perfil == 3)
        {

            $empleado = Empleado::where('id_empleado', '=', $usuario->id_empleado)->first();
            $empleado->rut_empleado = $request->input('rut');
            $empleado->primer_nombre_empleado = strtoupper($request->input('primerNombre'));
            $empleado->segundo_nombre_empleado = strtoupper($request->input('segundoNombre'));
            $empleado->primer_apellido_empleado = strtoupper($request->input('primerApellido'));
            $empleado->segundo_apellido_empleado = strtoupper($request->input('segundoApellido'));
            $empleado->update();
            
            $nombreCompleto = $request->input('primerNombre') . " " . $request->input('segundoNombre') . " " . $request->input('primerApellido') . " " . $request->input('segundoApellido');
            $usuario->id_estado_usuario = $request->input('estadoUsuario');
            $usuario->nombre_usuario = strtoupper($nombreCompleto);
            $usuario->correo_usuario = $request->input('correo');
            $usuario->clave_usuario = Hash::make($request->input('clave'));
            $usuario->update();

            return back()->with('actualizarUsuario', 'Se actualizo el usuario correctamente');
        }
        else
        {
            if($validarUsuarioEmpresa->nombre_empresa != "")
            {

                $datosUsuarioCliente = DatosUsuarioCliente::where('id_datos_usuario_cliente', '=', $usuario->id_datos_usuario_cliente)->first();
                $datosUsuarioCliente->rut_datos_usuario_cliente = $request->input('rut');
                $datosUsuarioCliente->primer_nombre_datos_usuario_cliente = strtoupper($request->input('primerNombre'));
                $datosUsuarioCliente->segundo_nombre_datos_usuario_cliente = strtoupper($request->input('segundoNombre'));
                $datosUsuarioCliente->primer_apellido_datos_usuario_cliente = strtoupper($request->input('primerApellido'));
                $datosUsuarioCliente->segundo_apellido_datos_usuario_cliente = strtoupper($request->input('segundoApellido'));
                $datosUsuarioCliente->correo_datos_usuario_cliente = $request->input('correo');
                $datosUsuarioCliente->telefono_datos_usuario_cliente = $request->input('telefono');
                $datosUsuarioCliente->update();

                $empresa = Empresa::where('id_datos_usuario_cliente', '=', $usuario->id_datos_usuario_cliente)->first();
                $empresa->id_datos_usuario_cliente = $datosUsuarioCliente->id_datos_usuario_cliente;
                $empresa->nombre_empresa = strtoupper($request->input('nombreEmpresa'));
                $empresa->rut_empresa = $request->input('rutEmpresa');
                $empresa->direccion_empresa = strtoupper($request->input('direccion'));
                $empresa->update();

                $nombreCompleto = $request->input('primerNombre') . " " . $request->input('segundoNombre') . " " . $request->input('primerApellido') . " " . $request->input('segundoApellido');
                $usuario->id_estado_usuario = $request->input('estadoUsuario');
                $usuario->nombre_usuario = strtoupper($nombreCompleto);
                $usuario->correo_usuario = $request->input('correo');
                $usuario->clave_usuario = Hash::make($request->input('clave'));
                $usuario->update();

                return back()->with('actualizarUsuario', 'Se actualizo el usuario correctamente');
            }
            else
            {

                $datosUsuarioCliente = DatosUsuarioCliente::where('id_datos_usuario_cliente', '=', $usuario->id_datos_usuario_cliente)->first();
                $datosUsuarioCliente->rut_datos_usuario_cliente = $request->input('rut');
                $datosUsuarioCliente->primer_nombre_datos_usuario_cliente = strtoupper($request->input('primerNombre'));
                $datosUsuarioCliente->segundo_nombre_datos_usuario_cliente = strtoupper($request->input('segundoNombre'));
                $datosUsuarioCliente->primer_apellido_datos_usuario_cliente = strtoupper($request->input('primerApellido'));
                $datosUsuarioCliente->segundo_apellido_datos_usuario_cliente = strtoupper($request->input('segundoApellido'));
                $datosUsuarioCliente->correo_datos_usuario_cliente = $request->input('correo');
                $datosUsuarioCliente->telefono_datos_usuario_cliente = $request->input('telefono');
                $datosUsuarioCliente->direccion_datos_usuario_cliente = strtoupper($request->input('direccion'));
                $datosUsuarioCliente->update();

                $nombreCompleto = $request->input('primerNombre') . " " . $request->input('segundoNombre') . " " . $request->input('primerApellido') . " " . $request->input('segundoApellido');
                $usuario->id_estado_usuario = $request->input('estadoUsuario');
                $usuario->nombre_usuario = strtoupper($nombreCompleto);
                $usuario->correo_usuario = $request->input('correo');
                $usuario->clave_usuario = Hash::make($request->input('clave'));
                $usuario->update();

                return back()->with('actualizarUsuario', 'Se actualizo el usuario correctamente');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::where('id_usuario', '=', $id)->first();
        if ($usuario->id_estado_usuario == 1) 
        {
            $usuario->id_estado_usuario = 2;
            $usuario->update();

            return back()->with('eliminarUsuario', 'Se deshabilito el usuario correctamente');
        }
        else
        {
            $usuario->id_estado_usuario = 1;
            $usuario->update();

            return back()->with('eliminarUsuario', 'Se habilito el usuario correctamente');
        }
    }
}
