@extends('layout')
@section('contenido')
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Chile muestras</a></li>
            <li class="breadcrumb-item active">Muestras registradas</li>
        </ol>
        <h1 class="page-header"><i class="fa fa-ellipsis-v"></i> Muestras registradas</h1>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title"> {{ Session::get('perfilUsuario') == 1 ? "Todas las muestras registradas" : "Todas tus muestras registradas" }}</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('muestras.create') }}" class="btn btn-link"><i class="fas fa-pencil-alt"></i> Registrar muestra</a>
                </div>
            </div>
            <div class="panel-body">
                @if(Session::has('eliminarMuestra'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <i class="fa fa-check"></i> {{ Session::get('eliminarMuestra') }}
                            </div>
                        </div>
                    </div>
                @endif
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
                                    @if(Session::get('perfilUsuario') == 1)
                                        <th width="1%"></th>
                                    @endif
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
                                        @if(Session::get('perfilUsuario') == 1)
                                            <td class="with-btn" nowrap>
                                                <a href="{{ route('muestras.edit', $muestra->id_muestra) }}" class="btn btn-sm btn-primary width-90 m-r-2"><i class="fas fa-edit"></i> Editar</a>
                                            </td>
                                            <td class="with-btn" nowrap>
                                                <form action="{{ route('muestras.destroy', $muestra->id_muestra) }}" method="POST">
                                                    {!! csrf_field() !!}
                                                    {!! method_field('DELETE') !!}
                                                    <button type="submit" class="btn btn-sm btn-danger width-90 m-r-2"><i class="fas fa-times"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        @endif
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
                                <p>{{ Session::get('perfilUsuario') == 1 ? "No hay muestras registradas" : "No tienes muestras registradas" }}</p>
                            </div>
                        </div>
                    </div>
                @endif                    
            </div>
        </div>
    </div>
@stop