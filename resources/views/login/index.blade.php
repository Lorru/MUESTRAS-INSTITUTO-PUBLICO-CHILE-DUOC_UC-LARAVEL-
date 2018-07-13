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
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <div class="login-content" style="margin-top:5px;">
                @if(Session::has('errorLogin') )
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                               <i class="fa fa-times"></i> {{ Session::get('errorLogin') }}
                            </div>
                        </div>
                    </div>
                @endif
                @if(Session::has('logout') )
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <i class="fa fa-check"></i> {{ Session::get('logout') }}
                            </div>
                        </div>
                    </div>
                @endif
                @if(Session::has('inicioSesion') )
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <i class="fa fa-times"></i> {{ Session::get('inicioSesion') }}
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST" id="formLogin" class="margin-bottom-0">
                    {!! csrf_field() !!}
                    <div class="form-group m-b-20">
                        <input type="text" name="correo" id="correo" class="form-control form-control-lg" placeholder="Correo..."/>
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" name="clave" id="clave" class="form-control form-control-lg" placeholder="Clave..."/>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg"><i class="fa fa-check"></i> Ingresar</button>
                    </div>
                    <div class="m-t-20">
                        ¿No eres miembro todavía? Haga clic <a href="{{ route('registro') }}">aquí </a>para registrarse.
                    </div>
                </form>
            </div>
        </div>
	</div>
</body>
</html>
