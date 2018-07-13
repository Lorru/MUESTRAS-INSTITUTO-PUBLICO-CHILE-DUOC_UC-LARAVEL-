@extends('layout')
@section('contenido')
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Chile muestras</a></li>
            <li class="breadcrumb-item active">Actualizar usuario</li>
        </ol>
        <h1 class="page-header"><i class="fas fa-edit"></i> Actualizar usuario</h1>
        <div class="profile-content">
            <div class="table-responsive">
                @if(Session::has('actualizarUsuario'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <i class="fa fa-check"></i> {{ Session::get('actualizarUsuario') }}
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" id="formActualizar" method="POST">
                    {{ csrf_field() }}
                    {!! method_field('PUT') !!}
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
                            @if(Session::get('perfilUsuario') == 1 || Session::get('perfilUsuario') == 4)
                                <tr class="highlight">
                                    <td class="field">Datos del sistema</td>
                                    <td></td>
                                </tr>
                                <tr>                                
                                    <td class="field">Estado usuario <span class="text-danger">*</span></td>
                                    <td>
                                        <select class="form-control input-inline input-xs" name="estadoUsuario" id="estadoUsuario">
                                                @foreach($estadoUsuario as $estado)
                                                    <option value="{{ $estado->id_estado_usuario }}" {{ $estado->id_estado_usuario == $usuario->id_estado_usuario ? 'selected' : '' }}>{{ $estado->nombre_estado_usuario }}</option>
                                                @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endif                                    
                            <tr class="divider">
                                <td colspan="2"></td>
                            </tr>
                            <tr class="highlight">
                                <td class="field">Datos generales</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="field">Primer nombre <span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control input-inline input-xs" name="primerNombre" id="primerNombre" value="{{ $usuario->id_perfil == 4 ? $usuario->primer_nombre_datos_usuario_cliente : $usuario->primer_nombre_empleado }}" placeholder="Primer nombre..." /></td>
                            </tr>
                            <tr>
                                <td class="field">Segundo nombre <span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control input-inline input-xs" name="segundoNombre" id="segundoNombre" value=" {{ $usuario->id_perfil == 4 ? $usuario->segundo_nombre_datos_usuario_cliente : $usuario->segundo_nombre_empleado }}" placeholder="Segundo nombre..." /></td>
                            </tr>
                            <tr>
                                <td class="field">Primer apellido <span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control input-inline input-xs" name="primerApellido" id="primerApellido" value="{{ $usuario->id_perfil == 4 ? $usuario->primer_apellido_datos_usuario_cliente : $usuario->primer_apellido_empleado }}" placeholder="Primer apellido..." /></td>
                            </tr>
                            <tr>
                                <td class="field">Segundo apellido <span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control input-inline input-xs" name="segundoApellido" id="segundoApellido" value="{{ $usuario->id_perfil == 4 ? $usuario->segundo_apellido_datos_usuario_cliente : $usuario->segundo_apellido_empleado }}" placeholder="Segundo apellido..." /></td>
                            </tr>
                            <tr>
                                <td class="field">Rut <span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control input-inline input-xs" name="rut" id="rut" value="{{ $usuario->id_perfil == 4 ?  $usuario->rut_datos_usuario_cliente : $usuario->rut_empleado }}" placeholder="Rut..." /></td>
                            </tr>
                            @if($usuario->id_perfil == 4)
                                <tr>
                                    <td class="field">Teléfono <span class="text-danger">*</span></td>
                                    <td><input type="number" class="form-control input-inline input-xs" name="telefono" id="telefono" value="{{ $usuario->telefono_datos_usuario_cliente }}" placeholder="Teléfono..." /></td>
                                </tr>
                            @endif
                            <tr>
                                <td class="field">Correo <span class="text-danger">*</span></td>
                                <td><input type="email" class="form-control input-inline input-xs" name="correo" id="correo" value="{{ $usuario->correo_usuario }}" placeholder="Correo..." /></td>
                            </tr>
                            <tr>
                                <td class="field">Clave <span class="text-danger">*</span></td>
                                <td><input type="password" class="form-control input-inline input-xs" name="clave" id="clave" placeholder="Clave..." /></td>
                            </tr>
                            @if($usuario->id_perfil == 4)
                                @if($usuario->direccion_datos_usuario_cliente != "")
                                    <tr>
                                        <td class="field">Dirección <span class="text-danger">*</span></td>
                                        <td><input type="text" class="form-control input-inline input-xs" name="direccion" id="direccion" value="{{ $usuario->direccion_datos_usuario_cliente }}" placeholder="Dirección..." /></td>
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
                                        <td class="field">Nombre <span class="text-danger">*</span></td>
                                        <td><input type='text' class='form-control input-inline input-xs' name='nombreEmpresa' id='nombreEmpresa' value="{{ $usuario->nombre_empresa }}" placeholder='Nombre empresa...'/></td>
                                    </tr>
                                    <tr>
                                        <td class="field">Rut <span class="text-danger">*</span></td>
                                        <td><input type='text' class='form-control input-inline input-xs' name='rutEmpresa' id='rutEmpresa' value="{{ $usuario->rut_empresa }}" placeholder='Rut empresa...'/></td>
                                    </tr>
                                    <tr>
                                        <td class="field">Dirección <span class="text-danger">*</span></td>
                                        <td><input type="text" class="form-control input-inline input-xs" name="direccion" id="direccion" value="{{ $usuario->direccion_empresa }}" placeholder="Dirección..." /></td>
                                    </tr>
                                @endif   
                            @endif
                            <tr class="highlight">
                                <td class="field">&nbsp;</td>
                                <td class="p-t-10 p-b-10">
                                    @if(Session::get('perfilUsuario') == 1)
                                        <a href="{{ route('usuarios.index') }}" class="btn btn-primary width-150"><i class="fa fa-angle-left"></i> Volver</a>
                                    @else
                                        <a href="{{ route('inicio') }}" class="btn btn-primary width-150"><i class="fa fa-angle-left"></i> Volver</a>
                                    @endif
                                    <button type="submit" class="btn btn-success width-150"><i class="fa fa-check"></i> Actualizar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>                
            </div>
        </div>
    </div>
@stop