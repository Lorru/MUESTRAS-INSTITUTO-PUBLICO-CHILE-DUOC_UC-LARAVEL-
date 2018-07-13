@extends('layout')
@section('contenido')
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Chile muestras</a></li>
            <li class="breadcrumb-item active">Reportes</li>
        </ol>
        <h1 class="page-header"><i class="fa fa-chart-pie"></i> Reportes</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                        <h4 class="panel-title">Muestras por mes</h4>
                    </div>
                    <div class="panel-body">
                        <div id="divMuestrasPorFechas" style="height: 250px;"></div>
                    </div>
                    <script type="text/javascript">
                        new Morris.Bar({
                                element: 'divMuestrasPorFechas',
                                data: [
                                    @foreach ($muestrasPorFecha as $muestra)
                                        { fecha: "{{ $muestra->fecha }}", value: "{{ $muestra->total }}" }, 
                                    @endforeach
                                ],
                                xkey: 'fecha',
                                ykeys: ['value'],
                                labels: ['valor']
                                });
                    </script>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                        <h4 class="panel-title">Muestras por cliente</h4>
                    </div>
                    <div class="panel-body">
                        <div id="divMuestrasPorCliente" style="height: 250px;"></div>
                    </div>
                    <script type="text/javascript">
                        new Morris.Bar({
                                element: 'divMuestrasPorCliente',
                                data: [
                                    @foreach ($muestrasPorCliente as $muestra)
                                        { cliente: "{{ $muestra->cliente }}", value: "{{ $muestra->total }}" }, 
                                    @endforeach
                                ],
                                xkey: 'cliente',
                                ykeys: ['value'],
                                labels: ['valor']
                                });
                    </script>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                        <h4 class="panel-title">Muestras por empleados "Recepción"</h4>
                    </div>
                    <div class="panel-body">
                        <div id="divMuestrasPorRecepcion" style="height: 250px;"></div>
                    </div>
                    <script type="text/javascript">
                        new Morris.Bar({
                                element: 'divMuestrasPorRecepcion',
                                data: [
                                    @foreach ($muestrasPorRecepcion as $muestra)
                                        { recepcion: "{{ $muestra->recepcion }}", value: "{{ $muestra->total }}" }, 
                                    @endforeach
                                ],
                                xkey: 'recepcion',
                                ykeys: ['value'],
                                labels: ['valor']
                                });
                    </script>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                        <h4 class="panel-title">Muestras por empleados "Resolución"</h4>
                    </div>
                    <div class="panel-body">
                        <div id="divMuestrasPorResolucion" style="height: 250px;"></div>
                    </div>
                    <script type="text/javascript">
                        new Morris.Bar({
                                element: 'divMuestrasPorResolucion',
                                data: [
                                    @foreach ($muestrasPorResolucion as $muestra)
                                        { resolucion: "{{ $muestra->resolucion }}", value: "{{ $muestra->total }}" }, 
                                    @endforeach
                                ],
                                xkey: 'resolucion',
                                ykeys: ['value'],
                                labels: ['valor']
                                });
                    </script>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                        <h4 class="panel-title">Muestras por estado</h4>
                    </div>
                    <div class="panel-body">
                        <div id="divMuestrasPorEstado" style="height: 250px;"></div>
                    </div>
                    <script type="text/javascript">
                        new Morris.Bar({
                                element: 'divMuestrasPorEstado',
                                data: [
                                    @foreach ($muestrasPorEstado as $muestra)
                                        { estado: "{{ $muestra->nombre_estado_muestra }}", value: "{{ $muestra->total }}" }, 
                                    @endforeach
                                ],
                                xkey: 'estado',
                                ykeys: ['value'],
                                labels: ['valor']
                                });
                    </script>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                        <h4 class="panel-title">Muestras por tipo analisis</h4>
                    </div>
                    <div class="panel-body">
                        <div id="divMuestrasPorAnalisis" style="height: 250px;"></div>
                    </div>
                    <script type="text/javascript">
                        new Morris.Bar({
                                element: 'divMuestrasPorAnalisis',
                                data: [
                                    @foreach ($muestrasPorTipoAnalisi as $muestra)
                                        { analisis: "{{ $muestra->nombre_tipo_analisi }}", value: "{{ $muestra->total }}" }, 
                                    @endforeach
                                ],
                                xkey: 'analisis',
                                ykeys: ['value'],
                                labels: ['valor']
                                });
                    </script>
                </div>
            </div>
        </div>
    </div>
@stop