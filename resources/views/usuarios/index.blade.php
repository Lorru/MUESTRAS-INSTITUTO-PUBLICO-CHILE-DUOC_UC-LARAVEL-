@extends('layout')
@section('contenido')
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Chile muestras</a></li>
            <li class="breadcrumb-item active">Usuarios registrados</li>
        </ol>
        <h1 class="page-header"><i class="fa fa-ellipsis-v"></i> Usuarios registrados</h1>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Todos los usuarios registrados en el sistema</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('usuarios.create') }}" class="btn btn-link"><i class="fas fa-user-plus"></i> Registrar empleado</a>
                </div>
            </div>
            <div class="panel-body">
                @if(Session::has('eliminarUsuario'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <i class="fa fa-check"></i> {{ Session::get('eliminarUsuario') }}
                            </div>
                        </div>
                    </div>
                @endif
                @if($usuarios->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped m-b-0">
                            <thead>
                                <tr>
                                    <th>Correo</th>
                                    <th>Nombre</th>
                                    <th>Tipo usuario</th>
                                    <th>Estado</th>
                                    <th width="1%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td><a href="{{ route('usuarios.show', $usuario->id_usuario) }}">{{$usuario->correo_usuario}}</a></td>
                                        <td>{{$usuario->nombre_usuario}}</td>
                                        <td>{{$usuario->nombre_perfil}}</td>
                                        <td>{{$usuario->nombre_estado_usuario}}</td>
                                        <td class="with-btn" nowrap>
                                            <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn btn-sm btn-primary width-90 m-r-2"><i class="fas fa-edit"></i> Editar</a>
                                        </td>
                                        <td class="with-btn" nowrap>
                                            <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}
                                                <button type="submit" class="{{ $usuario->id_estado_usuario == 1 ? "btn btn-sm btn-danger width-90 m-r-2" : "btn btn-sm btn-success width-90 m-r-2" }}" style="width: 100px!important;"><i class="{{$usuario->id_estado_usuario == 1 ? 'fas fa-user-times' : 'fas fa-user' }}"></i> {{ $usuario->id_estado_usuario == 1 ? 'Deshabilitar' : 'Habilitar' }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                {!! $usuarios->render() !!}
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <p>No hay usuarios registrados en el sistema</p>
                            </div>
                        </div>
                    </div>
                @endif                    
            </div>
        </div>
    </div>
@stop