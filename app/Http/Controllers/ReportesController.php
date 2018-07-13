<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Muestra;
use DB;

class ReportesController extends Controller
{
    function __construct()
    {
        $this->middleware('reportes');
    } 

    public function index()
    {
        $muestrasPorFecha = Muestra::select( 
                            DB::raw('DATE_FORMAT(fecha_muestra, "%m") AS fecha'),
                            DB::raw('COUNT(*) AS total'))
                          ->groupBy('fecha')
                          ->get();
                                       
        $muestrasPorCliente = Muestra::select(
                                    DB::raw('CONCAT(t1.primer_nombre_datos_usuario_cliente, " ", t1.segundo_nombre_datos_usuario_cliente, " ", t1.primer_apellido_datos_usuario_cliente, " ", t1.segundo_apellido_datos_usuario_cliente) AS cliente'),
                                    DB::raw('COUNT(*) AS total'))
                                    ->join('datos_usuario_cliente AS t1', 'muestra.id_datos_usuario_cliente', 't1.id_datos_usuario_cliente')
                                    ->groupBy('muestra.id_datos_usuario_cliente')
                                    ->get();

        $muestrasPorRecepcion = Muestra::select(
                                        DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS recepcion'),
                                        DB::raw('COUNT(*) AS total'))
                                        ->join('empleado AS t1', 'muestra.id_empleado_recepcion', 't1.id_empleado')
                                        ->groupBy('muestra.id_empleado_recepcion')
                                        ->get(); 

        $muestrasPorResolucion = Muestra::select(
                                        DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS resolucion'),
                                        DB::raw('COUNT(*) AS total'))
                                        ->join('empleado AS t1', 'muestra.id_empleado_resolucion', 't1.id_empleado')
                                        ->groupBy('muestra.id_empleado_resolucion')
                                        ->get();                                         

        $muestrasPorEstado = Muestra::select( 
                            'estado_muestra.nombre_estado_muestra',
                            DB::raw('COUNT(*) AS total'))
                            ->join('estado_muestra', 'muestra.id_estado_muestra', 'estado_muestra.id_estado_muestra')
                            ->groupBy('muestra.id_estado_muestra')
                            ->get();

        $muestrasPorTipoAnalisi = Muestra::select( 
                            'tipo_analisi.nombre_tipo_analisi',
                            DB::raw('COUNT(*) AS total'))
                            ->join('tipo_analisi', 'muestra.id_tipo_analisi', 'tipo_analisi.id_tipo_analisi')
                            ->groupBy('muestra.id_tipo_analisi')
                            ->get();                            

        return view('reportes.index', compact(['muestrasPorFecha', 'muestrasPorCliente', 'muestrasPorRecepcion', 'muestrasPorResolucion', 'muestrasPorEstado', 'muestrasPorTipoAnalisi']));
    }
}
