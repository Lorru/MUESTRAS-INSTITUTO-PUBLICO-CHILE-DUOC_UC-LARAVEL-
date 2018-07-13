@extends('layout')
@section('contenido')
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Chile muestras</a></li>
            <li class="breadcrumb-item active">
                @if(Session::get('perfilUsuario') != 3)
                    Recepcionar muestra
                @elseif(Session::get('perfilUsuario') != 2)
                    Resolucionar muestra
                @endif                    
            </li>
        </ol>
        <h1 class="page-header"><i class="fa fa-edit"></i>
            @if(Session::get('perfilUsuario') != 3)
                Recepcionar muestra
            @elseif(Session::get('perfilUsuario') != 2)
                Resolucionar muestra
            @endif
        </h1>
        <div class="profile-content">
            <div class="table-responsive">
                @if(Session::has('actualizarMuestra'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <i class="fa fa-check"></i> {{ Session::get('actualizarMuestra') }}
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('muestras.update', $muestra->id_muestra) }}" method="POST" id="formActualizarMuestra">
                    {{ csrf_field() }}
                    {!! method_field('PUT') !!}
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
                            @if(Session::get('perfilUsuario') == 1)
                            <tr>
                                <td class="field">Tipo analisis</td>
                                <td>
                                    <select class="form-control input-inline input-xs" name="tipoAnalisis" id="tipoAnalisis">
                                            @foreach($tipoAnalisis as $analisis)
                                                <option value="{{ $analisis->id_tipo_analisi }}" {{ $muestra->id_tipo_analisi == $analisis->id_tipo_analisi ? 'selected' : '' }}>{{ $analisis->nombre_tipo_analisi }}</option>
                                            @endforeach
                                    </select>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td class="field">Estado</td>
                                <td>{{ $muestra->nombre_estado_muestra }}</td>
                            </tr>
                            @if(Session::get('perfilUsuario') != 3)
                                <tr class="highlight">
                                    <td class="field">Datos recepción</td>
                                    <td></td>
                                </tr>                            
                                <tr>
                                    <td class="field">Temperatura <span class="text-danger">*</span></td>
                                    <td><input type="number" name="temperatura" id="temperatura" class="form-control input-inline input-xs" placeholder="Temperatura..." value="{{ $muestra->temperatura_muestra == null ? '' : $muestra->temperatura_muestra }}"></td>
                                </tr>
                                <tr>
                                    <td class="field">Cantidad <span class="text-danger">*</span></td>
                                    <td><input type="number" name="cantidad" id="cantidad" class="form-control input-inline input-xs" placeholder="Cantidad..." value="{{ $muestra->cantidad_muestra == null ? '' : $muestra->cantidad_muestra }}"></td>
                                </tr>
                            @endif
                            @if(Session::get('perfilUsuario') != 2)
                                <tr class="highlight">
                                    <td class="field">Datos resolución <span class="text-danger">*</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="field">Descripción <span class="text-danger">*</span></td>
                                    <td><textarea name="descripcion" id="descripcion" class="form-control input-inline input-xs" cols="30" rows="10">{{ $muestra->descripcion_resultado_muestra == null ? "Por resolucionar" : $muestra->descripcion_resultado_muestra }}</textarea></td>
                                </tr>
                            @endif
                            <tr class="highlight">
                                <td class="field">&nbsp;</td>
                                <td class="p-t-10 p-b-10">
                                    @if(Session::get('perfilUsuario') == 1 || Session::get('perfilUsuario') == 4)
                                        <a href="{{ route('muestras.index') }}" class="btn btn-primary width-150">Volver</a>
                                    @elseif(Session::get('perfilUsuario') == 2)
                                        <a href="{{ route('muestras-recepcionadas') }}" class="btn btn-primary width-150">Volver</a>
                                    @elseif(Session::get('perfilUsuario') == 3)                                
                                        <a href="{{ route('muestras-resolucionadas') }}" class="btn btn-primary width-150">Volver</a>
                                    @endif
                                    @if(Session::get('perfilUsuario') == 2)
                                        <button type="submit" class="btn btn-success width-150"><i class="fa fa-check"></i> Recepcionar</button>
                                    @elseif(Session::get('perfilUsuario') == 3)
                                        <button type="submit" class="btn btn-success width-150"><i class="fa fa-check"></i> Resolucionar</button>                                        
                                    @else                                        
                                        <button type="submit" class="btn btn-success width-200"><i class="fa fa-check"></i> Recepcionar y resolucionar</button>                                        
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@stop