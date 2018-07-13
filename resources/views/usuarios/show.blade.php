@extends('layout')
@section('contenido')
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Chile muestras</a></li>
            <li class="breadcrumb-item active">Información del usuario</li>
        </ol>
        <h1 class="page-header"><i class="fa fa-info"></i> Información del usuario</h1>
        <div class="profile-content">
            <div class="table-responsive">
                <table class="table table-profile">
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                <h4>{{ $usuario->nombre_usuario }} <small>{{ $usuario->correo_usuario }}</small></h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="highlight">
                            <td class="field">Datos del sistema</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="field">Estado usuario</td>
                            <td>{{ $usuario->nombre_estado_usuario }}</td>
                        </tr>
                        <tr>
                            <td class="field">Tipo de usuario</td>
                            <td>{{ $usuario->nombre_perfil }}</td>
                        </tr>
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        <tr class="highlight">
                            <td class="field">Datos generales</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="field">Nombre completo</td>
                            <td>{{ $usuario->nombre_usuario }}</td>
                        </tr>
                        <tr>
                            <td class="field">Rut</td>
                            <td>{{ $usuario->id_perfil == 4 ? $usuario->rut_datos_usuario_cliente : $usuario->rut_empleado }}</td>
                        </tr>
                        @if($usuario->id_perfil == 4)
                            <tr>
                                <td class="field">Teléfono</td>
                                <td>{{ $usuario->telefono_datos_usuario_cliente }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td class="field">Correo</td>
                            <td>{{ $usuario->correo_usuario }}</td>
                        </tr>
                        @if($usuario->id_perfil == 4)
                            @if($usuario->direccion_datos_usuario_cliente != "")
                                <tr>
                                    <td class="field">Dirección</td>
                                    <td>{{ $usuario->direccion_datos_usuario_cliente }}</td>
                                </tr>
                            @endif                            
                            @if($usuario->nombre_empresa != "")
                                <tr class="divider">
                                    <td colspan="2"></td>
                                </tr>
                                <tr class="highlight">
                                    <td class="field">Datos de la empresa</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="field">Nombre</td>
                                    <td>{{ $usuario->nombre_empresa }}</td>
                                </tr>
                                <tr>
                                    <td class="field">Rut</td>
                                    <td>{{ $usuario->rut_empresa }}</td>
                                </tr>
                                <tr>
                                    <td class="field">Dirección</td>
                                    <td>{{ $usuario->direccion_empresa }}</td>
                                </tr>
                            @endif
                        @endif
                        <tr class="highlight">
                            <td class="field">&nbsp;</td>
                            <td class="p-t-10 p-b-10">
                                <a href="{{ route('usuarios.index') }}" class="btn btn-primary width-150">Volver</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop