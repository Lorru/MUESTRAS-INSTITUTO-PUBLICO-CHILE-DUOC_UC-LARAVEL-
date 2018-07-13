@extends('layout')
@section('contenido')
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Chile muestras</a></li>
            <li class="breadcrumb-item active">Registrar empleado</li>
        </ol>
        <h1 class="page-header"><i class="fas fa-user-plus"></i> Registrar empleado</h1>
        <div class="profile-content">
            <div class="table-responsive">
                @if(Session::has('registrarEmpleado'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <i class="fa fa-check"></i> {{ Session::get('registrarEmpleado') }}
                            </div>
                        </div>
                    </div>
                @endif
                @if(Session::has('errorRegistrarEmpleado'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <i class="fa fa-times"></i> {{ Session::get('errorRegistrarEmpleado') }}
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('usuarios.store') }}" id="formRegistrarEmpleados" method="POST">
                    {{ csrf_field() }}
                    <table class="table table-profile">
                        <tbody>
                            <tr class="divider">
                                <td colspan="2"></td>
                            </tr>
                            <tr class="highlight">
                                <td class="field">Datos del sistema</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="field">Perfil <span class="text-danger">*</span></td>
                                <td>
                                    <select class="form-control input-inline input-xs" name="perfil" id="perfil">
                                            @foreach($perfiles as $perfil)
                                                <option value="{{ $perfil->id_perfil }}">{{ $perfil->nombre_perfil }}</option>
                                            @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr class="highlight">
                                <td class="field">Datos generales</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="field">Primer nombre <span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control input-inline input-xs" name="primerNombre" id="primerNombre" placeholder="Primer nombre..." /></td>
                            </tr>
                            <tr>
                                <td class="field">Segundo nombre <span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control input-inline input-xs" name="segundoNombre" id="segundoNombre" placeholder="Segundo nombre..." /></td>
                            </tr>
                            <tr>
                                <td class="field">Primer apellido <span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control input-inline input-xs" name="primerApellido" id="primerApellido" placeholder="Primer apellido..." /></td>
                            </tr>
                            <tr>
                                <td class="field">Segundo apellido <span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control input-inline input-xs" name="segundoApellido" id="segundoApellido" placeholder="Segundo apellido..." /></td>
                            </tr>
                            <tr>
                                <td class="field">Rut <span class="text-danger">*</span></td>
                                <td><input type="text" class="form-control input-inline input-xs" name="rut" id="rut" placeholder="Rut..." /></td>
                            </tr>  
                            <tr>
                                <td class="field">Correo <span class="text-danger">*</span></td>
                                <td><input type="email" class="form-control input-inline input-xs" name="correo" id="correo" placeholder="Correo..." /></td>
                            </tr>
                            <tr>
                                <td class="field">Clave <span class="text-danger">*</span></td>
                                <td><input type="password" class="form-control input-inline input-xs" name="clave" id="clave" placeholder="Clave..." /></td>
                            </tr>                          
                            <tr class="highlight">
                                <td class="field">&nbsp;</td>
                                <td class="p-t-10 p-b-10">
                                    <a href="{{ route('usuarios.index') }}" class="btn btn-primary width-150"><i class="fa fa-angle-left"></i> Volver</a>
                                    <button type="submit" class="btn btn-success width-150"><i class="fa fa-check"></i> Registrar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>                
            </div>
        </div>
    </div>
@stop