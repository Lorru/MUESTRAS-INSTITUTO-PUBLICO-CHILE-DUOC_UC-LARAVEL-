<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoCliente;
use App\DatosUsuarioCliente;
use App\Usuario;
use App\Empresa;
use Hash;

class RegistroController extends Controller
{
    public function index()
    {
        $tipoCliente = TipoCliente::all();
        return view('registro.index', compact('tipoCliente'));
    }

    public function registro(Request $request)
    {
        $correo = $request->input('correo');
        $buscarUsuario = Usuario::where("correo_usuario", "=", $correo)->get();
        $tipoCliente = $request->input('tipoCliente');

        if($buscarUsuario->count() > 0)
        {
            return back()->with('errorCrearUsuario', 'El usuario ya Existe');
        }
        else
        {
            if($tipoCliente == 1)
            {
                $datosUsuarioCliente = new DatosUsuarioCliente;
                $datosUsuarioCliente->id_tipo_cliente = $request->input('tipoCliente');
                $datosUsuarioCliente->rut_datos_usuario_cliente = $request->input('rut');
                $datosUsuarioCliente->primer_nombre_datos_usuario_cliente = strtoupper($request->input('primerNombre'));
                $datosUsuarioCliente->segundo_nombre_datos_usuario_cliente = strtoupper($request->input('segundoNombre'));
                $datosUsuarioCliente->primer_apellido_datos_usuario_cliente = strtoupper($request->input('primerApellido'));
                $datosUsuarioCliente->segundo_apellido_datos_usuario_cliente = strtoupper($request->input('segundoApellido'));
                $datosUsuarioCliente->correo_datos_usuario_cliente = $request->input('correo');
                $datosUsuarioCliente->telefono_datos_usuario_cliente = $request->input('telefono');
                $datosUsuarioCliente->save();
        
                $empresa = new Empresa;
                $empresa->id_datos_usuario_cliente = $datosUsuarioCliente->id_datos_usuario_cliente;
                $empresa->nombre_empresa = strtoupper($request->input('nombreEmpresa'));
                $empresa->rut_empresa = $request->input('rutEmpresa');
                $empresa->direccion_empresa = strtoupper($request->input('direccion'));
                $empresa->save();

                $nombreCompleto = $request->input('primerNombre') . " " . $request->input('segundoNombre') . " " . $request->input('primerApellido') . " " . $request->input('segundoApellido');
                $usuario = new Usuario;
                $usuario->id_datos_usuario_cliente = $datosUsuarioCliente->id_datos_usuario_cliente;
                $usuario->id_estado_usuario = 1;
                $usuario->id_perfil = 4;
                $usuario->nombre_usuario = strtoupper($nombreCompleto);
                $usuario->correo_usuario = $request->input('correo');
                $usuario->clave_usuario = Hash::make($request->input('clave'));
                $usuario->save();
        
                return back()->with('crearUsuario', 'Se creo el usuario correctamente');
            }
            else
            {
                $datosUsuarioCliente = new DatosUsuarioCliente;
                $datosUsuarioCliente->id_tipo_cliente = $request->input('tipoCliente');
                $datosUsuarioCliente->rut_datos_usuario_cliente = $request->input('rut');
                $datosUsuarioCliente->primer_nombre_datos_usuario_cliente = strtoupper($request->input('primerNombre'));
                $datosUsuarioCliente->segundo_nombre_datos_usuario_cliente = strtoupper($request->input('segundoNombre'));
                $datosUsuarioCliente->primer_apellido_datos_usuario_cliente = strtoupper($request->input('primerApellido'));
                $datosUsuarioCliente->segundo_apellido_datos_usuario_cliente = strtoupper($request->input('segundoApellido'));
                $datosUsuarioCliente->correo_datos_usuario_cliente = $request->input('correo');
                $datosUsuarioCliente->telefono_datos_usuario_cliente = $request->input('telefono');
                $datosUsuarioCliente->direccion_datos_usuario_cliente = strtoupper($request->input('direccion'));
                $datosUsuarioCliente->save();
        
                $nombreCompleto = $request->input('primerNombre') . " " . $request->input('segundoNombre') . " " . $request->input('primerApellido') . " " . $request->input('segundoApellido');
                $usuario = new Usuario;
                $usuario->id_datos_usuario_cliente = $datosUsuarioCliente->id_datos_usuario_cliente;
                $usuario->id_estado_usuario = 1;
                $usuario->id_perfil = 4;
                $usuario->nombre_usuario = strtoupper($nombreCompleto);
                $usuario->correo_usuario = $request->input('correo');
                $usuario->clave_usuario = Hash::make($request->input('clave'));
                $usuario->save();
        
                return back()->with('crearUsuario', 'Se creo el usuario correctamente');
            }

        }
    }
}
