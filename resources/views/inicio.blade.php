@extends('layout')
@section('contenido')
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Chile muestras</a></li>
            <li class="breadcrumb-item active">Inicio</li>
        </ol>
        <h1 class="page-header"><i class="fa fa-home"></i> Inicio</h1>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">{{"Bienvenido ". Session::get('nombreUsuario')}}</h4>
            </div>
            <div class="panel-body">
                @if(Session::get('perfilUsuario') == 1)
                    <p>Aquí podrás realizar las siguientes acciones que te brinda el sistema:</p>
                    <ul>
                        <li>Crear, editar y habilitar/deshabilitar los usuarios registrados en el sistema.</li>
                        <li>Generar reportes, referentes a muestras, técnicos y recepcionistas de las muestras.</li>
                        <li>Crear, modificar y eliminar las muestras.</li>
                    </ul>
                @elseif(Session::get('perfilUsuario') == 2)
                    <p>Aquí podrás realizar las siguientes acciones que te brinda el sistema:</p>
                    <ul>
                        <li>Modificar tus datos.</li>
                        <li>Recepcionar y ver la información de tus muestras recepcionadas.</li>
                    </ul>
                @elseif(Session::get('perfilUsuario') == 3)
                    <p>Aquí podrás realizar las siguientes acciones que te brinda el sistema:</p>
                    <ul>
                        <li>Modificar tus datos.</li>
                        <li>Resolucionar y ver los resultados de tus muestras resolucionadas.</li>
                    </ul>
                @else
                    <p>Aquí podrás realizar las siguientes acciones que te brinda el sistema:</p>
                    <ul>
                        <li>Modificar tus datos.</li>
                        <li>Deshabilitar tu usuario.</li>
                        <li>Registrar y ver el estado de tus muestras.</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
@stop