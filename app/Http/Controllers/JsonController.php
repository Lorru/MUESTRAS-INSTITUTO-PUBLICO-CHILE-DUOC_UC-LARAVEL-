<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatosUsuarioCliente;
use App\Muestra;
use DB;

class JsonController extends Controller
{
    public function getUsersAll(Request $request)
    {
        $idTipoCliente = $request->input('idTipoCliente');
        if($idTipoCliente == 1)
        {
            $datosUsuarioCliente = DatosUsuarioCliente::where('direccion_datos_usuario_cliente', '=', null)->get();
            return response()->json($datosUsuarioCliente);
        }
        else
        {
            $datosUsuarioCliente = DatosUsuarioCliente::where('direccion_datos_usuario_cliente', '!=', null)->get();
            return response()->json($datosUsuarioCliente);
        }
    }

    public function getSamplesByCodeOrRun(Request $request)
    {
        $buscador = $request->input('buscador');
        $muestras = Muestra::select('muestra.*',
                                    'estado_muestra.nombre_estado_muestra', 
                                    'tipo_analisi.nombre_tipo_analisi', 
                                    DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS recepcion'), 
                                    DB::raw('CONCAT(t2.primer_nombre_empleado, " ", t2.segundo_nombre_empleado, " ", t2.primer_apellido_empleado, " ", t2.segundo_apellido_empleado) AS resolucion'))
                                    ->join('estado_muestra', 'muestra.id_estado_muestra', 'estado_muestra.id_estado_muestra')
                                    ->join('tipo_analisi', 'muestra.id_tipo_analisi', 'tipo_analisi.id_tipo_analisi')
                                    ->leftJoin('empleado AS t1', 'muestra.id_empleado_recepcion', 't1.id_empleado')
                                    ->leftJoin('empleado AS t2', 'muestra.id_empleado_resolucion', 't2.id_empleado')
                                    ->join('datos_usuario_cliente', 'muestra.id_datos_usuario_cliente', 'datos_usuario_cliente.id_datos_usuario_cliente')
                                    ->where('muestra.id_empleado_recepcion', '=', null)
                                    ->where('datos_usuario_cliente.rut_datos_usuario_cliente', 'like', '%' . $buscador . '%')
                                    ->orWhere('muestra.id_muestra', 'like', '%' . $buscador . '%')
                                    ->get();
        
        return response()->json($muestras);                                    
    }

    public function getSamplesByCodeOrRunReceived(Request $request)
    {
        $buscador = $request->input('buscador');
        $muestras = Muestra::select('muestra.*',
                                    'estado_muestra.nombre_estado_muestra', 
                                    'tipo_analisi.nombre_tipo_analisi', 
                                    DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS recepcion'), 
                                    DB::raw('CONCAT(t2.primer_nombre_empleado, " ", t2.segundo_nombre_empleado, " ", t2.primer_apellido_empleado, " ", t2.segundo_apellido_empleado) AS resolucion'))
                                    ->join('estado_muestra', 'muestra.id_estado_muestra', 'estado_muestra.id_estado_muestra')
                                    ->join('tipo_analisi', 'muestra.id_tipo_analisi', 'tipo_analisi.id_tipo_analisi')
                                    ->leftJoin('empleado AS t1', 'muestra.id_empleado_recepcion', 't1.id_empleado')
                                    ->leftJoin('empleado AS t2', 'muestra.id_empleado_resolucion', 't2.id_empleado')
                                    ->join('datos_usuario_cliente', 'muestra.id_datos_usuario_cliente', 'datos_usuario_cliente.id_datos_usuario_cliente')
                                    ->where('muestra.id_empleado_resolucion', '=', null)
                                    ->where('datos_usuario_cliente.rut_datos_usuario_cliente', 'like', '%' . $buscador . '%')
                                    ->orWhere('muestra.id_muestra', 'like', '%' . $buscador . '%')
                                    ->get();
        
        return response()->json($muestras);                                    
    }
}
