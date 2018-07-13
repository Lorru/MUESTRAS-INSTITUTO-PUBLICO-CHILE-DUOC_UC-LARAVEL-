@extends('layout')
@section('contenido')
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Chile muestras</a></li>
            <li class="breadcrumb-item active">Registrar muestra</li>
        </ol>
        <h1 class="page-header"><i class="fas fa-pencil-alt"></i> Registrar muestra</h1>
        <div class="profile-content">
            <div class="table-responsive">
                @if(Session::has('registrarMuestra'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <i class="fa fa-check"></i> {{ Session::get('registrarMuestra') }}
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('muestras.store') }}" id="formRegistrarMuestra" method="POST">
                    {{ csrf_field() }}
                    <table class="table table-profile">
                        <tbody>
                            <tr class="divider">
                                <td colspan="2"></td>
                            </tr>
                            <tr class="highlight">
                                <td class="field">Datos requeridos</td>
                                <td></td>
                            </tr>
                            @if(Session::get('perfilUsuario') == 1)
                                <tr>
                                <td class="field">Tipo cliente<span class="text-danger">*</span></td> 
                                <td>
                                    <select class="form-control input-inline input-xs" name="tipoClienteCreate" id="tipoClienteCreate">
                                            @foreach($tipoCliente as $cliente)
                                                <option value="{{ $cliente->id_tipo_cliente }}">{{ $cliente->nombre_tipo_cliente }}</option>
                                            @endforeach
                                    </select>
                                </td>
                                </tr>
                                <tr>
                                    <td class="field">Cliente<span class="text-danger">*</span></td> 
                                    <td>
                                        <select class="form-control input-inline input-xs" name="clientes" id="clientes">
                                                @foreach($datosUsuarioCliente as $datosUsuario)
                                                    <option value="{{ $datosUsuario->id_datos_usuario_cliente }}">{{ $datosUsuario->primer_nombre_datos_usuario_cliente . " " . $datosUsuario->segundo_nombre_datos_usuario_cliente . " " . $datosUsuario->primer_apellido_datos_usuario_cliente . " " . $datosUsuario->segundo_apellido_datos_usuario_cliente  }}</option>
                                                @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endif                                
                            <tr>
                                <td class="field">Tipo de analisis <span class="text-danger">*</span></td>
                                <td>
                                    <select class="form-control input-inline input-xs" name="tipoAnalisis" id="tipoAnalisis">
                                            @foreach($tipoAnalisis as $analisis)
                                                <option value="{{ $analisis->id_tipo_analisi }}">{{ $analisis->nombre_tipo_analisi }}</option>
                                            @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr class="highlight">
                                <td class="field">&nbsp;</td>
                                <td class="p-t-10 p-b-10">
                                    <a href="{{ route('muestras.index') }}" class="btn btn-primary width-150"><i class="fa fa-angle-left"></i> Volver</a>
                                    @if(Session::get('perfilUsuario') == 1)
                                        <button type="submit" class="btn btn-success width-150" id="btnCrearReserva" {{ $datosUsuarioCliente->count() == 0 ? 'disabled' : '' }}><i class="fa fa-check"></i> Registrar</button>
                                    @else
                                        <button type="submit" class="btn btn-success width-150" id="btnCrearReserva"><i class="fa fa-check"></i> Registrar</button>
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