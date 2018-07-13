<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Chile | Muestras</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    @include('links.css')
    @include('links.js')
</head>
<body>
	@php
		function activeMenu($url)
		{
			return request()->is($url) ? 'active' : '';
		}
	@endphp
	<div class="page-cover"></div>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<div id="header" class="header navbar-default">
			<div class="navbar-header">
				<a href="route('inicio')" class="navbar-brand"><b>Chile</b> salud pública</a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<ul class="navbar-nav navbar-right">
				<li class="dropdown navbar-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="d-none d-md-inline">{{ Session::get('nombreUsuario') }}</span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{ route('usuarios.edit', Session::get('idUsuario')) }}" class="dropdown-item"><i class="fas fa-edit"></i> Editar Perfil</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
							<button type="submit" class="dropdown-item"><i class="fas fa-power-off"></i> Cerrar sesión</button>
                        </form>
					</div>
				</li>
			</ul>
		</div>
		
		<div id="sidebar" class="sidebar">
			<div data-scrollbar="true" data-height="100%">
				<ul class="nav">
					<li class="nav-profile">
						<div class="info">
                            {{ Session::get('nombreUsuario') }} <small>{{ Session::get('correoUsuario') }}</small>
						</div>
					</li>
				</ul>
				<ul class="nav">
                    <li class="nav-header">MENÚ DE NAVEGACIÓN</li>
                    <li class="{{activeMenu('inicio') }}"><a href="{{ route('inicio') }}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
                    <li class="has-sub {{activeMenu('muestras*') }}">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-eye-dropper"></i>
                            <span>Muestras</span>
                        </a>
                        <ul class="sub-menu">
							@if(Session::get('perfilUsuario') == 1 || Session::get('perfilUsuario') == 4)
								<li class="{{activeMenu('muestras/create') }}"><a href="{{ route('muestras.create') }}">Registrar muestras</a></li>
								<li class="{{activeMenu('muestras') }}"><a href="{{ route('muestras.index') }}">Muestras registradas</a></li>
							@endif								
							@if(Session::get('perfilUsuario') == 1 || Session::get('perfilUsuario') == 2)
								<li class="{{activeMenu('muestras-recepcionadas') }}"><a href="{{ route('muestras-recepcionadas') }}">Recepción de muestras</a></li>
							@endif
							@if(Session::get('perfilUsuario') == 1 || Session::get('perfilUsuario') == 3)								
								<li class="{{activeMenu('muestras-resolucionadas') }}"><a href="{{ route('muestras-resolucionadas') }}">Resolución de muestras</a></li>
							@endif								
                        </ul>
					</li>
					@if(Session::get('perfilUsuario') == 1)
						<li class="has-sub {{activeMenu('usuarios*') }}">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-users"></i>
								<span>Usuarios</span>
							</a>
							<ul class="sub-menu">
								<li class="{{activeMenu('usuarios') }}"><a href="{{ route('usuarios.index') }}">Usuarios registrados</a></li>
								<li class="{{activeMenu('usuarios/create') }}"><a href="{{ route('usuarios.create') }}">Registrar empleados</a></li>
							</ul>
						</li>
						<li class="{{activeMenu('reportes') }}"><a href="{{ route('reportes') }}"><i class="fa fa-chart-pie"></i> <span>Reportes</span></a></li>
					@endif						
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
				</ul>
			</div>
		</div>
        <div class="sidebar-bg"></div>
        
        @yield('contenido')

		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>
</body>
</html>
