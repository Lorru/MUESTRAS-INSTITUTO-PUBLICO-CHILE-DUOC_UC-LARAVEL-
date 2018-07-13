<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Hash;
use Session;

class LoginController extends Controller
{
    //protected $guard = 'usuarios';

    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $correo = $request->input('correo');
        $clave = $request->input('clave');

        $usuario = Usuario::where('correo_usuario', '=', $correo)
                          ->where('id_estado_usuario', '=', 1)
                          ->first();
                         
        if($usuario && Hash::check($clave, $usuario->clave_usuario))
        {
            Session::put('correoUsuario', strtoupper($usuario->correo_usuario));
            Session::put('nombreUsuario', strtoupper($usuario->nombre_usuario));
            Session::put('perfilUsuario', $usuario->id_perfil);
            Session::put('idUsuario', $usuario->id_usuario);
            Session::put('estadoUsuario', $usuario->id_estado_usuario);

            return redirect()->route('inicio');
        }
        else
        {
            return back()->with('errorLogin', 'Correo o clave incorrecto');
        }
    }
    public function logout()
    {
        Session::flush();
        
        return redirect()->route('/')->with('logout', 'Se ha cerrado la sesión correctamente');
    }
}
