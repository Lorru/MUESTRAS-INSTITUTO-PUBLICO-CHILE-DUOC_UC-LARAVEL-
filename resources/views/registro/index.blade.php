<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Chile | Muestras</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    @include('links.css')
    @include('links.js')
</head>
<body class="pace-top">
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	
	<div class="login-cover">
	    <div class="login-cover-image" style="background-image: url(/img/login-bg-17.jpg)" data-id="login-cover-image"></div>
	    <div class="login-cover-bg"></div>
	</div>
	<div id="page-container" class="fade">
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <div class="login-header">
                <div class="brand">
                    <b>Chile </b>salud pública
                </div>
                <div class="icon">
                    <i class="fa fa-pencil-alt"></i>
                </div>
            </div>
            <div class="login-content" style="margin-top:5px;">
                @if(Session::has('crearUsuario') )
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <i class="fa fa-check"></i> {{ Session::get('crearUsuario') }}
                            </div>
                        </div>
                    </div>
                @endif
                @if(Session::has('errorCrearUsuario') )
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <i class="fa fa-times"></i> {{ Session::get('errorCrearUsuario') }}
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('registrar') }}" method="POST" id="formRegistro" class="margin-bottom-0">
                    {!! csrf_field() !!}
                    <label class="control-label">Nombre completo <span class="text-danger">*</span></label>
                    <div class="row row-space-10">
                        <div class="col-md-6 m-b-15">
                            <input type="text" class="form-control" name="primerNombre" id="primerNombre" placeholder="Primer nombre..." />
                        </div>
                        <div class="col-md-6 m-b-15">
                            <input type="text" class="form-control" name="segundoNombre" id="segundoNombre" placeholder="Segundo nombre..." />
                        </div>
                    </div>
                    <div class="row row-space-10">
                        <div class="col-md-6 m-b-15">
                            <input type="text" class="form-control" name="primerApellido" id="primerApellido" placeholder="Primer apellido..." />
                        </div>
                        <div class="col-md-6 m-b-15">
                            <input type="text" class="form-control" name="segundoApellido" id="segundoApellido" placeholder="Segundo apellido..." />
                        </div>
                    </div>
                    <label class="control-label">Rut <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="rut" id="rut" placeholder="Rut..." />
                        </div>
                    </div>
                    <label class="control-label">Teléfono <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Teléfono..." />
                        </div>
                    </div>
                    <label class="control-label">Correo <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo..." />
                        </div>
                    </div>
                    <label class="control-label">Clave <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="clave" id="clave" placeholder="Clave..." />
                        </div>
                    </div>
                    <label class="control-label">Tipo cliente <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <select class="form-control" name="tipoCliente" id="tipoCliente">
                                @foreach($tipoCliente as $cliente)
                                    <option value="{{ $cliente->id_tipo_cliente }}">{{ $cliente->nombre_tipo_cliente }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="divEmpresa">
                        <label class='control-label'>Nombre empresa <span class='text-danger'>*</span></label>
                        <div class='row m-b-15'>
                            <div class='col-md-12'>
                                <input type='text' class='form-control' name='nombreEmpresa' id='nombreEmpresa' placeholder='Nombre empresa...'/>
                            </div>
                        </div>
                        <label class='control-label'>Rut empresa <span class='text-danger'>*</span></label>
                        <div class='row m-b-15'>
                            <div class='col-md-12'>
                                <input type='text' class='form-control' name='rutEmpresa' id='rutEmpresa' placeholder='Rut empresa...'/>
                            </div>
                        </div>
                    </div>
                    <label class="control-label" id="labelDireccion">Dirección empresa <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección..." />
                        </div>
                    </div>
                    <div class="register-buttons">
                        <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-check"></i> Registrarse</button>
                    </div>
                    <div class="m-t-20">
                        ¿Ya eres usuario? Haga clic <a href="{{ route('/') }}"> aquí </a> para iniciar sesión.
                    </div>
                </form>
            </div>
        </div>
	</div>
</body>
</html>
