<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Muestra;
use App\TipoAnalisi;
use Session;
use App\Usuario;
use DB;
use App\TipoCliente;
use App\DatosUsuarioCliente;
use Carbon\Carbon;

class MuestrasController extends Controller
{
    function __construct()
    {
        $this->middleware('muestras', ['except' => ['edit', 'update']]);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        if (Session::get('perfilUsuario') == 1) 
        {
            $muestras = Muestra::select( 'muestra.*',
                                        'estado_muestra.nombre_estado_muestra', 
                                        'tipo_analisi.nombre_tipo_analisi', 
                                        DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS recepcion'), 
                                        DB::raw('CONCAT(t2.primer_nombre_empleado, " ", t2.segundo_nombre_empleado, " ", t2.primer_apellido_empleado, " ", t2.segundo_apellido_empleado) AS resolucion'))
                               ->join('estado_muestra', 'muestra.id_estado_muestra', 'estado_muestra.id_estado_muestra')
                               ->join('tipo_analisi', 'muestra.id_tipo_analisi', 'tipo_analisi.id_tipo_analisi')
                               ->leftJoin('empleado AS t1', 'muestra.id_empleado_recepcion', 't1.id_empleado')
                               ->leftJoin('empleado AS t2', 'muestra.id_empleado_resolucion', 't2.id_empleado')
                               ->paginate(5);
            return view('muestras.index', compact('muestras'));   
        }
        else if(Session::get('perfilUsuario') == 4)
        {
            $usuario = Usuario::where('id_usuario', '=', Session::get('idUsuario'))->first();

            $muestras = Muestra::select( 'muestra.*',
                                        'estado_muestra.nombre_estado_muestra', 
                                        'tipo_analisi.nombre_tipo_analisi', 
                                        DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS recepcion'), 
                                        DB::raw('CONCAT(t2.primer_nombre_empleado, " ", t2.segundo_nombre_empleado, " ", t2.primer_apellido_empleado, " ", t2.segundo_apellido_empleado) AS resolucion'))
                               ->join('estado_muestra', 'muestra.id_estado_muestra', 'estado_muestra.id_estado_muestra')
                               ->join('tipo_analisi', 'muestra.id_tipo_analisi', 'tipo_analisi.id_tipo_analisi')
                               ->leftJoin('empleado AS t1', 'muestra.id_empleado_recepcion', 't1.id_empleado')
                               ->leftJoin('empleado AS t2', 'muestra.id_empleado_resolucion', 't2.id_empleado')
                               ->where('muestra.id_datos_usuario_cliente', '=', $usuario->id_datos_usuario_cliente)
                               ->paginate(5);
              
            return view('muestras.index', compact('muestras'));   
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoAnalisis = TipoAnalisi::all();
        $tipoCliente = TipoCliente::all();
        $datosUsuarioCliente = DatosUsuarioCliente::where('direccion_datos_usuario_cliente', '=', null)->get();
        return view('muestras.create', compact(['tipoAnalisis', 'tipoCliente', 'datosUsuarioCliente']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Session::get('perfilUsuario') == 1)
        {
            $muestra = new Muestra;
            $muestra->id_datos_usuario_cliente = $request->input('clientes');
            $muestra->id_estado_muestra = 1;
            $muestra->fecha_muestra = Carbon::now()->toDateString();
            $muestra->id_tipo_analisi = $request->input('tipoAnalisis');
            $muestra->save();
    
            return back()->with('registrarMuestra', 'Se registro la muestra correctamente');
        }
        else
        {
            $usuario = Usuario::where('id_usuario', '=', Session::get('idUsuario'))->first();
            $muestra = new Muestra;
            $muestra->id_datos_usuario_cliente = $usuario->id_datos_usuario_cliente;
            $muestra->id_estado_muestra = 1;
            $muestra->fecha_muestra = Carbon::now()->toDateString();
            $muestra->id_tipo_analisi = $request->input('tipoAnalisis');
            $muestra->save();
    
            return back()->with('registrarMuestra', 'Se registro la muestra correctamente');   
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
        $muestra = Muestra::select('muestra.*',
                                    'estado_muestra.nombre_estado_muestra', 
                                    'tipo_analisi.nombre_tipo_analisi', 
                                    DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS recepcion'), 
                                    DB::raw('CONCAT(t2.primer_nombre_empleado, " ", t2.segundo_nombre_empleado, " ", t2.primer_apellido_empleado, " ", t2.segundo_apellido_empleado) AS resolucion'),
                                    'datos_usuario_cliente.*')
                                    ->join('estado_muestra', 'muestra.id_estado_muestra', 'estado_muestra.id_estado_muestra')
                                    ->join('tipo_analisi', 'muestra.id_tipo_analisi', 'tipo_analisi.id_tipo_analisi')
                                    ->leftJoin('empleado AS t1', 'muestra.id_empleado_recepcion', 't1.id_empleado')
                                    ->leftJoin('empleado AS t2', 'muestra.id_empleado_resolucion', 't2.id_empleado')
                                    ->join('datos_usuario_cliente', 'muestra.id_datos_usuario_cliente', 'datos_usuario_cliente.id_datos_usuario_cliente')
                                    ->where('muestra.id_muestra', '=', $id)
                                    ->first();

        return view('muestras.show', compact('muestra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoAnalisis = TipoAnalisi::all();

        $muestra = Muestra::select('muestra.*',
                                    'estado_muestra.nombre_estado_muestra', 
                                    'tipo_analisi.nombre_tipo_analisi', 
                                    DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS recepcion'), 
                                    DB::raw('CONCAT(t2.primer_nombre_empleado, " ", t2.segundo_nombre_empleado, " ", t2.primer_apellido_empleado, " ", t2.segundo_apellido_empleado) AS resolucion'),
                                    'datos_usuario_cliente.*')
                                    ->join('estado_muestra', 'muestra.id_estado_muestra', 'estado_muestra.id_estado_muestra')
                                    ->join('tipo_analisi', 'muestra.id_tipo_analisi', 'tipo_analisi.id_tipo_analisi')
                                    ->leftJoin('empleado AS t1', 'muestra.id_empleado_recepcion', 't1.id_empleado')
                                    ->leftJoin('empleado AS t2', 'muestra.id_empleado_resolucion', 't2.id_empleado')
                                    ->join('datos_usuario_cliente', 'muestra.id_datos_usuario_cliente', 'datos_usuario_cliente.id_datos_usuario_cliente')
                                    ->where('muestra.id_muestra', '=', $id)
                                    ->first();

        return view('muestras.edit', compact(['muestra', 'tipoAnalisis']));
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
        $muestra = Muestra::where('id_muestra', '=', $id)->first();

        if(Session::get('perfilUsuario') == 1)
        {
            $usuario = Usuario::where('id_usuario', '=', Session::get('idUsuario'))->first();

            $muestra->id_tipo_analisi = $request->input('tipoAnalisis');
            $muestra->temperatura_muestra = $request->input('temperatura');
            $muestra->cantidad_muestra = $request->input('cantidad');
            $muestra->descripcion_resultado_muestra = $request->input('descripcion');
            $muestra->fecha_recepcion_muestra = Carbon::now()->toDateString();
            $muestra->fecha_resultado_muestra = Carbon::now()->toDateString();
            $muestra->id_estado_muestra = 3;
            $muestra->id_empleado_recepcion = $usuario->id_empleado;
            $muestra->id_empleado_resolucion = $usuario->id_empleado;
            $muestra->update();

            return back()->with('actualizarMuestra', 'Se recepciono y resoluciono la muestra correctamente');
        }
        else if(Session::get('perfilUsuario') == 2)
        {
            $usuario = Usuario::where('id_usuario', '=', Session::get('idUsuario'))->first();

            $muestra->temperatura_muestra = $request->input('temperatura');
            $muestra->cantidad_muestra = $request->input('cantidad');
            $muestra->fecha_recepcion_muestra = Carbon::now()->toDateString();
            $muestra->id_estado_muestra = 2;
            $muestra->id_empleado_recepcion = $usuario->id_empleado;
            $muestra->update();

            return back()->with('actualizarMuestra', 'Se recepciono la muestra correctamente');
        }
        else if(Session::get('perfilUsuario') == 3)
        {
            $usuario = Usuario::where('id_usuario', '=', Session::get('idUsuario'))->first();

            $muestra->descripcion_resultado_muestra = $request->input('descripcion');
            $muestra->fecha_resultado_muestra = Carbon::now()->toDateString();
            $muestra->id_empleado_resolucion = $usuario->id_empleado;
            $muestra->id_estado_muestra = 3;
            $muestra->update();

            return back()->with('actualizarMuestra', 'Se resoluciono la muestra correctamente');
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
        $muestra = Muestra::where('id_muestra', '=', $id)->first();
        $muestra->delete();

        return back()->with('eliminarMuestra', 'Muestra eliminada correctamente');
    }

    public function getSamplesByReceiving()
    {
        $muestras = Muestra::select('muestra.*',
                                    'estado_muestra.nombre_estado_muestra', 
                                    'tipo_analisi.nombre_tipo_analisi', 
                                    DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS recepcion'), 
                                    DB::raw('CONCAT(t2.primer_nombre_empleado, " ", t2.segundo_nombre_empleado, " ", t2.primer_apellido_empleado, " ", t2.segundo_apellido_empleado) AS resolucion'))
                                    ->join('estado_muestra', 'muestra.id_estado_muestra', 'estado_muestra.id_estado_muestra')
                                    ->join('tipo_analisi', 'muestra.id_tipo_analisi', 'tipo_analisi.id_tipo_analisi')
                                    ->leftJoin('empleado AS t1', 'muestra.id_empleado_recepcion', 't1.id_empleado')
                                    ->leftJoin('empleado AS t2', 'muestra.id_empleado_resolucion', 't2.id_empleado')
                                    ->where('muestra.id_empleado_recepcion', '=', null)
                                    ->paginate(5);

        $usuario = Usuario::where('id_usuario', '=', Session::get('idUsuario'))->first();

        $muestrasRecepcionadas = Muestra::select('muestra.*',
                                    'estado_muestra.nombre_estado_muestra', 
                                    'tipo_analisi.nombre_tipo_analisi', 
                                    DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS recepcion'), 
                                    DB::raw('CONCAT(t2.primer_nombre_empleado, " ", t2.segundo_nombre_empleado, " ", t2.primer_apellido_empleado, " ", t2.segundo_apellido_empleado) AS resolucion'))
                                    ->join('estado_muestra', 'muestra.id_estado_muestra', 'estado_muestra.id_estado_muestra')
                                    ->join('tipo_analisi', 'muestra.id_tipo_analisi', 'tipo_analisi.id_tipo_analisi')
                                    ->leftJoin('empleado AS t1', 'muestra.id_empleado_recepcion', 't1.id_empleado')
                                    ->leftJoin('empleado AS t2', 'muestra.id_empleado_resolucion', 't2.id_empleado')
                                    ->where('muestra.id_empleado_recepcion', '=', $usuario->id_empleado)
                                    ->paginate(5);

        return view('muestras.samplesByReceiving', compact(['muestras', 'muestrasRecepcionadas']));
    }

    public function getSamplesToBeResolved()
    {
        $muestras = Muestra::select('muestra.*',
                                    'estado_muestra.nombre_estado_muestra', 
                                    'tipo_analisi.nombre_tipo_analisi', 
                                    DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS recepcion'), 
                                    DB::raw('CONCAT(t2.primer_nombre_empleado, " ", t2.segundo_nombre_empleado, " ", t2.primer_apellido_empleado, " ", t2.segundo_apellido_empleado) AS resolucion'))
                                    ->join('estado_muestra', 'muestra.id_estado_muestra', 'estado_muestra.id_estado_muestra')
                                    ->join('tipo_analisi', 'muestra.id_tipo_analisi', 'tipo_analisi.id_tipo_analisi')
                                    ->leftJoin('empleado AS t1', 'muestra.id_empleado_recepcion', 't1.id_empleado')
                                    ->leftJoin('empleado AS t2', 'muestra.id_empleado_resolucion', 't2.id_empleado')
                                    ->where('muestra.id_empleado_resolucion', '=', null)
                                    ->paginate(5);

        $usuario = Usuario::where('id_usuario', '=', Session::get('idUsuario'))->first();

        $muestrasResolucionadas = Muestra::select('muestra.*',
                                    'estado_muestra.nombre_estado_muestra', 
                                    'tipo_analisi.nombre_tipo_analisi', 
                                    DB::raw('CONCAT(t1.primer_nombre_empleado, " ", t1.segundo_nombre_empleado, " ", t1.primer_apellido_empleado, " ", t1.segundo_apellido_empleado) AS recepcion'), 
                                    DB::raw('CONCAT(t2.primer_nombre_empleado, " ", t2.segundo_nombre_empleado, " ", t2.primer_apellido_empleado, " ", t2.segundo_apellido_empleado) AS resolucion'))
                                    ->join('estado_muestra', 'muestra.id_estado_muestra', 'estado_muestra.id_estado_muestra')
                                    ->join('tipo_analisi', 'muestra.id_tipo_analisi', 'tipo_analisi.id_tipo_analisi')
                                    ->leftJoin('empleado AS t1', 'muestra.id_empleado_recepcion', 't1.id_empleado')
                                    ->leftJoin('empleado AS t2', 'muestra.id_empleado_resolucion', 't2.id_empleado')
                                    ->where('muestra.id_empleado_resolucion', '=', $usuario->id_empleado)
                                    ->paginate(5);

        return view('muestras.samplesToBeResolved', compact(['muestras', 'muestrasResolucionadas']));
    }
}
