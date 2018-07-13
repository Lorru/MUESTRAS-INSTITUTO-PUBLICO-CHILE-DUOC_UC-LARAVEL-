@extends('layout')
@section('contenido')
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Chile muestras</a></li>
            <li class="breadcrumb-item active">Recepción de muestras</li>
        </ol>
        <h1 class="page-header"><i class="fa fa-ellipsis-v"></i> Recepción de muestras</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        </div>
                        <h4 class="panel-title">Buscar por rut de cliente o codigo de muestra</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><b>Rut Ejemplo: 11.111.111-1</b></p>
                                <div class="form-inline">
                                    <input type="text" name="buscador" id="buscador" class="form-control" placeholder="Rut o Codigo..." style="margin-right:1%;">
                                    <button type="button" id="btnBuscar" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="divTabla" style="margin-top:2%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        </div>
                        <h4 class="panel-title">Muestras por recepcionar</h4>
                    </div>
                    <div class="panel-body">
                        @if($muestras->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Encargado recepción</th>
                                            <th>Encargado resolución</th>
                                            <th>Tipo de analisis</th>
                                            <th>Estado de muestra</th>
                                            <th>Temperatura</th>
                                            <th>Cantidad</th>
                                            <th width="1%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($muestras as $muestra)
                                            <tr>
                                                <td><a href="{{ route('muestras.show', $muestra->id_muestra) }}">{{$muestra->id_muestra}}</a></td>
                                                <td>{{ $muestra->recepcion == null ? "Por recepcionar" : $muestra->recepcion}}</td>
                                                <td>{{ $muestra->resolucion == null ? "Por resolucionar" : $muestra->resolucion}}</td>
                                                <td>{{$muestra->nombre_tipo_analisi}}</td>
                                                <td>{{$muestra->nombre_estado_muestra}}</td>
                                                <td>{{ $muestra->id_empleado_recepcion == null ? "Por recepcionar" : $muestra->temperatura_muestra}}</td>
                                                <td>{{ $muestra->id_empleado_recepcion == null ? "Por recepcionar" : $muestra->cantidad_muestra}}</td>
                                                <td class="with-btn" nowrap>
                                                    <a href="{{ route('muestras.edit', $muestra->id_muestra) }}" class="btn btn-sm btn-success width-100 m-r-2"><i class="fas fa-edit"></i> Recepcionar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {!! $muestras->render() !!}
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning">
                                        <p>No hay muestras por recepcionar</p>
                                    </div>
                                </div>
                            </div>
                        @endif                    
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        </div>
                        <h4 class="panel-title">Mis muestras recepcionadas</h4>
                    </div>
                    <div class="panel-body">
                        @if($muestrasRecepcionadas->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Encargado resolución</th>
                                            <th>Tipo de analisis</th>
                                            <th>Estado de muestra</th>
                                            <th>Temperatura</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($muestrasRecepcionadas as $muestra)
                                            <tr>
                                                <td><a href="{{ route('muestras.show', $muestra->id_muestra) }}">{{$muestra->id_muestra}}</a></td>
                                                <td>{{ $muestra->resolucion == null ? "Por resolucionar" : $muestra->resolucion}}</td>
                                                <td>{{$muestra->nombre_tipo_analisi}}</td>
                                                <td>{{$muestra->nombre_estado_muestra}}</td>
                                                <td>{{ $muestra->id_empleado_recepcion == null ? "Por recepcionar" : $muestra->temperatura_muestra}}</td>
                                                <td>{{ $muestra->id_empleado_recepcion == null ? "Por recepcionar" : $muestra->cantidad_muestra}}</td>
                                            </tr>
                                        @endforeach
                                        {!! $muestrasRecepcionadas->render() !!}
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning">
                                        <p>No tienes muestras recepcionadas</p>
                                    </div>
                                </div>
                            </div>
                        @endif                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop