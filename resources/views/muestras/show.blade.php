@extends('layout')
@section('contenido')
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Chile muestras</a></li>
            <li class="breadcrumb-item active">Información de la muestra</li>
        </ol>
        <h1 class="page-header"><i class="fa fa-info"></i> Información de la muestra</h1>
        <div class="profile-content">
            <div class="table-responsive">
                <table class="table table-profile">
                    <tbody>
                        <tr class="highlight">
                            <td class="field">Datos generales</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="field">Codigo</td>
                            <td>{{ $muestra->id_muestra }}</td>
                        </tr>
                        @if(Session::get('perfilUsuario') != 4)
                            <tr>
                                <td class="field">Cliente</td>
                                <td>{{ $muestra->primer_nombre_datos_usuario_cliente . " " . $muestra->segundo_nombre_datos_usuario_cliente . " " . $muestra->primer_apellido_datos_usuario_cliente . " " . $muestra->segundo_apellido_datos_usuario_cliente }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td class="field">Tipo analisis</td>
                            <td>{{ $muestra->nombre_tipo_analisi }}</td>
                        </tr>
                        <tr>
                            <td class="field">Estado</td>
                            <td>{{ $muestra->nombre_estado_muestra }}</td>
                        </tr>
                        <tr class="highlight">
                            <td class="field">Datos recepción</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="field">Encargado</td>
                            <td>{{ $muestra->recepcion == null ? "Por recepcionar" : $muestra->recepcion }}</td>
                        </tr>
                        <tr>
                            <td class="field">Fecha</td>
                            <td>{{ $muestra->fecha_recepcion_muestra == null ? "Por recepcionar" : $muestra->fecha_recepcion_muestra }}</td>
                        </tr>
                        <tr>
                            <td class="field">Temperatura</td>
                            <td>{{ $muestra->temperatura_muestra == null ? "Por recepcionar" : $muestra->temperatura_muestra }}</td>
                        </tr>
                        <tr>
                            <td class="field">Cantidad</td>
                            <td>{{ $muestra->cantidad_muestra == null ? "Por recepcionar" : $muestra->cantidad_muestra }}</td>
                        </tr>
                        <tr class="highlight">
                            <td class="field">Datos resolución</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="field">Encargado</td>
                            <td>{{ $muestra->resolucion == null ? "Por resolucionar" : $muestra->resolucion }}</td>
                        </tr>
                        <tr>
                            <td class="field">Fecha</td>
                            <td>{{ $muestra->fecha_resultado_muestra == null ? "Por resolucionar" : $muestra->fecha_resultado_muestra }}</td>
                        </tr>
                        <tr>
                            <td class="field">Descripción</td>
                            <td>{{ $muestra->descripcion_resultado_muestra == null ? "Por resolucionar" : $muestra->descripcion_resultado_muestra }}</td>
                        </tr>
                        <tr class="highlight">
                            <td class="field">&nbsp;</td>
                            <td class="p-t-10 p-b-10">
                            @if(Session::get('perfilUsuario') == 1 || Session::get('perfilUsuario') == 4)
                                <a href="{{ route('muestras.index') }}" class="btn btn-primary width-150">Volver</a>
                            @elseif(Session::get('perfilUsuario') == 2)
                                <a href="{{ route('muestras-recepcionadas') }}" class="btn btn-primary width-150">Volver</a>
                            @elseif(Session::get('perfilUsuario') == 4)                                
                                <a href="{{ route('muestras-recepcionadas') }}" class="btn btn-primary width-150">Volver</a>
                            @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop