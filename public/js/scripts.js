$(document).ready(function(){

    App.init();

    $("#primerNombre").blur(function(){
        if($(this).val() === '') {
            $("#errorPrimerNombre").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorPrimerNombre'>El primer nombre es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorPrimerNombre").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#segundoNombre").blur(function(){
        if($(this).val() === '') {
            $("#errorSegundoNombre").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorSegundoNombre'>El segundo nombre es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorSegundoNombre").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#primerApellido").blur(function(){
        if($(this).val() === '') {
            $("#errorPrimerApellido").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorPrimerApellido'>El primer apellido es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorPrimerApellido").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#segundoApellido").blur(function(){
        if($(this).val() === '') {
            $("#errorSegundoApellido").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorSegundoApellido'>El segundo apellido es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorSegundoApellido").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#rut").rut({
        formatOn: 'keyup',
        minimumLength: 8,
        validateOn: 'change'
    });

    $("#rutEmpresa").rut({
        formatOn: 'keyup',
        minimumLength: 8,
        validateOn: 'change'
    });

    $("#rut").blur(function(){
        if($(this).val() === ''){
            $("#errorRut").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorRut'>El RUT es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
    
            if(!$.validateRut($(this).val())) {
                $("#errorRut").remove();
                $(this).after("<span style='color: #dd4b39;' id='errorRut'>Debes ingresar un RUT valido</span");
                $(this).css("border-color", "#dd4b39");
            } else {
                $("#errorRut").remove();
                $(this).css("border-color", "#00a65a");
            }
        }
    });

    $("#rutEmpresa").blur(function(){
        if($(this).val() === ''){
            $("#errorRutEmpresa").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorRutEmpresa'>El RUT es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
    
            if(!$.validateRut($(this).val())) {
                $("#errorRutEmpresa").remove();
                $(this).after("<span style='color: #dd4b39;' id='errorRutEmpresa'>Debes ingresar un RUT valido</span");
                $(this).css("border-color", "#dd4b39");
            } else {
                $("#errorRutEmpresa").remove();
                $(this).css("border-color", "#00a65a");
            }
        }
    });

    $("#telefono").blur(function(){
        if($(this).val() === '') {
            $("#errorTelefono").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorTelefono'>El teléfono es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorTelefono").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#correo").blur(function(){
        if($(this).val() === '') {
            $("#errorCorreo").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorCorreo'>El correo es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorCorreo").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#clave").blur(function(){
        if($(this).val() === '') {
            $("#errorClave").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorClave'>La clave es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorClave").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#nombreEmpresa").blur(function(){
        if($(this).val() === '') {
            $("#errorNombreEmpresa").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorNombreEmpresa'>El nombre es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorNombreEmpresa").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#direccion").blur(function(){
        if($(this).val() === '') {
            $("#errorDireccion").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorDireccion'>La dirección es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorDireccion").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#tipoCliente").change(function(){
        if ($(this).val() == 1) {
            $("#labelDireccion").html("Dirección empresa <span class='text-danger'>*</span>");
            $("#divEmpresa").html("<label class='control-label'>Nombre empresa <span class='text-danger'>*</span></label><div class='row m-b-15'><div class='col-md-12'><input type='text' class='form-control' name='nombreEmpresa' id='nombreEmpresa' placeholder='Nombre Empresa...'/></div></div><label class='control-label'>Rut empresa <span class='text-danger'>*</span></label><div class='row m-b-15'><div class='col-md-12'><input type='text' class='form-control' name='rutEmpresa' id='rutEmpresa' placeholder='Rut Empresa...'/></div></div>");
        } else {
            $("#labelDireccion").html("Dirección <span class='text-danger'>*</span>");
            $("#divEmpresa").empty();
        }
    });


    $("#formRegistro").submit(function(event){

        if($("#primerNombre").val() === '') {
            $("#errorPrimerNombre").remove();
            $("#primerNombre").after("<span style='color: #dd4b39;' id='errorPrimerNombre'>El primer nombre es obligatorio</span");
            $("#primerNombre").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorPrimerNombre").remove();
            $("#primerNombre").css("border-color", "#00a65a");
        }

        if($("#segundoNombre").val() === '') {
            $("#errorSegundoNombre").remove();
            $("#segundoNombre").after("<span style='color: #dd4b39;' id='errorSegundoNombre'>El segundo nombre es obligatorio</span");
            $("#segundoNombre").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorSegundoNombre").remove();
            $("#segundoNombre").css("border-color", "#00a65a");
        }

        if($("#primerApellido").val() === '') {
            $("#errorPrimerApellido").remove();
            $("#primerApellido").after("<span style='color: #dd4b39;' id='errorPrimerApellido'>El primer apellido es obligatorio</span");
            $("#primerApellido").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorPrimerApellido").remove();
            $("#primerApellido").css("border-color", "#00a65a");
        }

        if($("#segundoApellido").val() === '') {
            $("#errorSegundoApellido").remove();
            $("#segundoApellido").after("<span style='color: #dd4b39;' id='errorSegundoApellido'>El segundo apellido es obligatorio</span");
            $("#segundoApellido").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorSegundpApellido").remove();
            $("#segundoApellido").css("border-color", "#00a65a");
        }

        if($("#rut").val() === ''){
            $("#errorRut").remove();
            $("#rut").after("<span style='color: #dd4b39;' id='errorRut'>El RUT es obligatorio</span");
            $("#rut").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {

            if(!$.validateRut($("#rut").val())) {
                $("#errorRut").remove();
                $("#rut").after("<span style='color: #dd4b39;' id='errorRut'>Debes ingresar un RUT valido</span");
                $("#rut").css("border-color", "#dd4b39");
                event.preventDefault();
            } else {
                $("#errorRut").remove();
                $("#rut").css("border-color", "#00a65a");
            }
        }

        if($("#rutEmpresa").val() === ''){
            $("#errorRutEmpresa").remove();
            $("#rutEmpresa").after("<span style='color: #dd4b39;' id='errorRutEmpresa'>El RUT es obligatorio</span");
            $("#rutEmpresa").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {

            if(!$.validateRut($("#rut").val())) {
                $("#errorRutEmpresa").remove();
                $("#rutEmpresa").after("<span style='color: #dd4b39;' id='errorRutEmpresa'>Debes ingresar un RUT valido</span");
                $("#rutEmpresa").css("border-color", "#dd4b39");
                event.preventDefault();
            } else {
                $("#errorRutEmpresa").remove();
                $("#rutEmpresa").css("border-color", "#00a65a");
            }
        }

        if($("#telefono").val() === '') {
            $("#errorTelefono").remove();
            $("#telefono").after("<span style='color: #dd4b39;' id='errorTelefono'>El teléfono es obligatorio</span");
            $("#telefono").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorTelefono").remove();
            $("#telefono").css("border-color", "#00a65a");
        }

        if($("#direccion").val() === '') {
            $("#errorDireccion").remove();
            $("#direccion").after("<span style='color: #dd4b39;' id='errorDireccion'>La dirección Es obligatorio</span");
            $("#direccion").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorDireccion").remove();
            $("#direccion").css("border-color", "#00a65a");
        }

        if($("#nombreEmpresa").val() === '') {
            $("#errorNombreEmpresa").remove();
            $("#nombreEmpresa").after("<span style='color: #dd4b39;' id='errorNombreEmpresa'>El nombre rs obligatorio</span");
            $("#nombreEmpresa").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorNombreEmpresa").remove();
            $("#nombreEmpresa").css("border-color", "#00a65a");
        }

        if($("#correo").val() === '') {
            $("#errorCorreo").remove();
            $("#correo").after("<span style='color: #dd4b39;' id='errorCorreo'>El correo es obligatorio</span");
            $("#correo").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorCorreo").remove();
            $("#correo").css("border-color", "#00a65a");
        }

        if($("#clave").val() === '') {
            $("#errorClave").remove();
            $("#clave").after("<span style='color: #dd4b39;' id='errorClave'>La clave es obligatorio</span");
            $("#clave").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorClave").remove();
            $("#clave").css("border-color", "#00a65a");
        }

    });

    $("#formRegistrarEmpleados").submit(function(event){

        if($("#primerNombre").val() === '') {
            $("#errorPrimerNombre").remove();
            $("#primerNombre").after("<span style='color: #dd4b39;' id='errorPrimerNombre'>El primer nombre es obligatorio</span");
            $("#primerNombre").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorPrimerNombre").remove();
            $("#primerNombre").css("border-color", "#00a65a");
        }

        if($("#segundoNombre").val() === '') {
            $("#errorSegundoNombre").remove();
            $("#segundoNombre").after("<span style='color: #dd4b39;' id='errorSegundoNombre'>El segundo nombre es obligatorio</span");
            $("#segundoNombre").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorSegundoNombre").remove();
            $("#segundoNombre").css("border-color", "#00a65a");
        }

        if($("#primerApellido").val() === '') {
            $("#errorPrimerApellido").remove();
            $("#primerApellido").after("<span style='color: #dd4b39;' id='errorPrimerApellido'>El primer apellido es obligatorio</span");
            $("#primerApellido").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorPrimerApellido").remove();
            $("#primerApellido").css("border-color", "#00a65a");
        }

        if($("#segundoApellido").val() === '') {
            $("#errorSegundoApellido").remove();
            $("#segundoApellido").after("<span style='color: #dd4b39;' id='errorSegundoApellido'>El segundo apellido es obligatorio</span");
            $("#segundoApellido").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorSegundpApellido").remove();
            $("#segundoApellido").css("border-color", "#00a65a");
        }

        if($("#rut").val() === ''){
            $("#errorRut").remove();
            $("#rut").after("<span style='color: #dd4b39;' id='errorRut'>El RUT es obligatorio</span");
            $("#rut").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {

            if(!$.validateRut($("#rut").val())) {
                $("#errorRut").remove();
                $("#rut").after("<span style='color: #dd4b39;' id='errorRut'>Debes ingresar un RUT valido</span");
                $("#rut").css("border-color", "#dd4b39");
                event.preventDefault();
            } else {
                $("#errorRut").remove();
                $("#rut").css("border-color", "#00a65a");
            }
        }

        if($("#correo").val() === '') {
            $("#errorCorreo").remove();
            $("#correo").after("<span style='color: #dd4b39;' id='errorCorreo'>El correo es obligatorio</span");
            $("#correo").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorCorreo").remove();
            $("#correo").css("border-color", "#00a65a");
        }

        if($("#clave").val() === '') {
            $("#errorClave").remove();
            $("#clave").after("<span style='color: #dd4b39;' id='errorClave'>La clave es obligatorio</span");
            $("#clave").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorClave").remove();
            $("#clave").css("border-color", "#00a65a");
        }

    });

    $("#formActualizar").submit(function(event){

        if($("#primerNombre").val() === '') {
            $("#errorPrimerNombre").remove();
            $("#primerNombre").after("<span style='color: #dd4b39;' id='errorPrimerNombre'>El primer nombre es obligatorio</span");
            $("#primerNombre").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorPrimerNombre").remove();
            $("#primerNombre").css("border-color", "#00a65a");
        }

        if($("#segundoNombre").val() === '') {
            $("#errorSegundoNombre").remove();
            $("#segundoNombre").after("<span style='color: #dd4b39;' id='errorSegundoNombre'>El segundo nombre es obligatorio</span");
            $("#segundoNombre").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorSegundoNombre").remove();
            $("#segundoNombre").css("border-color", "#00a65a");
        }

        if($("#primerApellido").val() === '') {
            $("#errorPrimerApellido").remove();
            $("#primerApellido").after("<span style='color: #dd4b39;' id='errorPrimerApellido'>El primer apellido es obligatorio</span");
            $("#primerApellido").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorPrimerApellido").remove();
            $("#primerApellido").css("border-color", "#00a65a");
        }

        if($("#segundoApellido").val() === '') {
            $("#errorSegundoApellido").remove();
            $("#segundoApellido").after("<span style='color: #dd4b39;' id='errorSegundoApellido'>El segundo apellido es obligatorio</span");
            $("#segundoApellido").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorSegundpApellido").remove();
            $("#segundoApellido").css("border-color", "#00a65a");
        }

        if($("#rut").val() === ''){
            $("#errorRut").remove();
            $("#rut").after("<span style='color: #dd4b39;' id='errorRut'>El RUT es obligatorio</span");
            $("#rut").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {

            if(!$.validateRut($("#rut").val())) {
                $("#errorRut").remove();
                $("#rut").after("<span style='color: #dd4b39;' id='errorRut'>Debes ingresar un RUT valido</span");
                $("#rut").css("border-color", "#dd4b39");
                event.preventDefault();
            } else {
                $("#errorRut").remove();
                $("#rut").css("border-color", "#00a65a");
            }
        }

        if($("#rutEmpresa").val() === ''){
            $("#errorRutEmpresa").remove();
            $("#rutEmpresa").after("<span style='color: #dd4b39;' id='errorRutEmpresa'>El RUT es obligatorio</span");
            $("#rutEmpresa").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {

            if(!$.validateRut($("#rut").val())) {
                $("#errorRutEmpresa").remove();
                $("#rutEmpresa").after("<span style='color: #dd4b39;' id='errorRutEmpresa'>Debes ingresar un RUT valido</span");
                $("#rutEmpresa").css("border-color", "#dd4b39");
                event.preventDefault();
            } else {
                $("#errorRutEmpresa").remove();
                $("#rutEmpresa").css("border-color", "#00a65a");
            }
        }

        if($("#telefono").val() === '') {
            $("#errorTelefono").remove();
            $("#telefono").after("<span style='color: #dd4b39;' id='errorTelefono'>El teléfono es obligatorio</span");
            $("#telefono").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorTelefono").remove();
            $("#telefono").css("border-color", "#00a65a");
        }

        if($("#direccion").val() === '') {
            $("#errorDireccion").remove();
            $("#direccion").after("<span style='color: #dd4b39;' id='errorDireccion'>La dirección Es obligatorio</span");
            $("#direccion").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorDireccion").remove();
            $("#direccion").css("border-color", "#00a65a");
        }

        if($("#nombreEmpresa").val() === '') {
            $("#errorNombreEmpresa").remove();
            $("#nombreEmpresa").after("<span style='color: #dd4b39;' id='errorNombreEmpresa'>El nombre rs obligatorio</span");
            $("#nombreEmpresa").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorNombreEmpresa").remove();
            $("#nombreEmpresa").css("border-color", "#00a65a");
        }

        if($("#correo").val() === '') {
            $("#errorCorreo").remove();
            $("#correo").after("<span style='color: #dd4b39;' id='errorCorreo'>El correo es obligatorio</span");
            $("#correo").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorCorreo").remove();
            $("#correo").css("border-color", "#00a65a");
        }

        if($("#clave").val() === '') {
            $("#errorClave").remove();
            $("#clave").after("<span style='color: #dd4b39;' id='errorClave'>La clave es obligatorio</span");
            $("#clave").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorClave").remove();
            $("#clave").css("border-color", "#00a65a");
        }

    });


    $("#formLogin").submit(function(event){

        if($("#correo").val() === '') {
            $("#errorCorreo").remove();
            $("#correo").after("<span style='color: #dd4b39;' id='errorCorreo'>El correo es obligatorio</span");
            $("#correo").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorCorreo").remove();
            $("#correo").css("border-color", "#00a65a");
        }

        if($("#clave").val() === '') {
            $("#errorClave").remove();
            $("#clave").after("<span style='color: #dd4b39;' id='errorClave'>La clave es obligatorio</span");
            $("#clave").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorClave").remove();
            $("#clave").css("border-color", "#00a65a");
        }

    });

    $("#tipoClienteCreate").change(function(){
        var tipoCliente = $(this).val();
        $.get('/tipos-clientes?idTipoCliente=' + tipoCliente ,function(data){
            $("#clientes").empty();
            $.each(data, function(i, cli){
                $("#clientes").append("<option value='" + cli.id_datos_usuario_cliente + "'>" + cli.primer_nombre_datos_usuario_cliente + " " + cli.segundo_nombre_datos_usuario_cliente + " " + cli.primer_apellido_datos_usuario_cliente + " " + cli.segundo_apellido_datos_usuario_cliente + "</option>");
            });

            console.log(data.length);

            if(data.length === 0){
                $("#btnCrearReserva").prop( "disabled", true );
            }else{
                $("#btnCrearReserva").prop( "disabled", false );
            }
        });
    });

    $("#buscador").blur(function(){
        if($(this).val() === '') {
            $("#errorBuscador").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorBuscador'>El buscador es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorBuscador").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#btnBuscar").click(function(){

        if($("#buscador").val() === '') {
            $("#errorBuscador").remove();
            $("#buscador").after("<span style='color: #dd4b39;' id='errorBuscador'>El buscador es obligatorio</span");
            $("#buscador").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorBuscador").remove();
            $("#buscador").css("border-color", "#00a65a");

            var buscador = $("#buscador").val();
            $.get('/buscador-muestras?buscador=' + buscador ,function(data){
                $("#contenidoTabla").empty();
                $("#divTabla").empty();
                if(data.length > 0){
                    $("#divTabla").html("<table class='table table-striped m-b-0'><thead><tr><th>Codigo</th><th>Encargado recepción</th><th>Encargado resolución</th><th>Tipo de analisis</th><th>Estado de muestra</th><th>Temperatura</th><th>Cantidad</th><th width='1%'></th></tr></thead><tbody id='contenidoTabla'></tbody></table>");
                    $.each(data, function(i, muestra){
                        var recepcion = muestra.recepcion == null ? "Por recepcionar" : muestra.recepcion;
                        var resolucion = muestra.resolucion == null ? "Por resolucionar" : muestra.resolucion;
                        var temperatura = muestra.temperatura_muestra == null ? "Por recepcionar" : muestra.temperatura_muestra;
                        var cantidad = muestra.cantidad_muestra == null ? "Por recepcionar" : muestra.cantidad_muestra;
                        $("#contenidoTabla").append("<tr><td><a href='/muestras/" + muestra.id_muestra + "'>" + muestra.id_muestra + "</a></td>" + "<td>" + recepcion + "</td>" + "<td>" + resolucion + "</td>" + "<td>" + muestra.nombre_tipo_analisi + "</td>" + "<td>" + muestra.nombre_estado_muestra + "</td>" + "<td>" + temperatura + "</td>" + "<td>" + cantidad + "</td>" + "<td class='with-btn' nowrap><a href='/muestras/" + muestra.id_muestra + "/edit' class='btn btn-sm btn-success width-100 m-r-2'><i class='fas fa-edit'></i> Recepcionar</a></td>" + "</tr>");
                    });
                }else{
                    $("#divTabla").append("<div class='row'><div class='col-md-12'><div class='alert alert-danger'><p><i class='fa fa-times'></i> Sin información disponible</p></div></div</div>");
                }
            });
        }
    });

    $("#btnBuscador").click(function(){

        if($("#buscador").val() === '') {
            $("#errorBuscador").remove();
            $("#buscador").after("<span style='color: #dd4b39;' id='errorBuscador'>El buscador es obligatorio</span");
            $("#buscador").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorBuscador").remove();
            $("#buscador").css("border-color", "#00a65a");

            var buscador = $("#buscador").val();
            $.get('/buscador-muestras-recepcionadas?buscador=' + buscador ,function(data){
                $("#contenidoTabla").empty();
                $("#divTabla").empty();
                if(data.length > 0){
                    $("#divTabla").html("<table class='table table-striped m-b-0'><thead><tr><th>Codigo</th><th>Encargado recepción</th><th>Encargado resolución</th><th>Tipo de analisis</th><th>Estado de muestra</th><th>Temperatura</th><th>Cantidad</th><th width='1%'></th></tr></thead><tbody id='contenidoTabla'></tbody></table>");
                    $.each(data, function(i, muestra){
                        var recepcion = muestra.recepcion == null ? "Por recepcionar" : muestra.recepcion;
                        var resolucion = muestra.resolucion == null ? "Por resolucionar" : muestra.resolucion;
                        var temperatura = muestra.temperatura_muestra == null ? "Por recepcionar" : muestra.temperatura_muestra;
                        var cantidad = muestra.cantidad_muestra == null ? "Por recepcionar" : muestra.cantidad_muestra;
                        $("#contenidoTabla").append("<tr><td><a href='/muestras/" + muestra.id_muestra + "'>" + muestra.id_muestra + "</a></td>" + "<td>" + recepcion + "</td>" + "<td>" + resolucion + "</td>" + "<td>" + muestra.nombre_tipo_analisi + "</td>" + "<td>" + muestra.nombre_estado_muestra + "</td>" + "<td>" + temperatura + "</td>" + "<td>" + cantidad + "</td>" + "<td class='with-btn' nowrap><a href='/muestras/" + muestra.id_muestra + "/edit' class='btn btn-sm btn-success width-100 m-r-2'><i class='fas fa-edit'></i> Recepcionar</a></td>" + "</tr>");
                    });
                }else{
                    $("#divTabla").append("<div class='row'><div class='col-md-12'><div class='alert alert-danger'><p><i class='fa fa-times'></i> Sin información disponible</p></div></div</div>");
                }
            });
        }
    });

    $("#temperatura").blur(function(){
        if($(this).val() === '') {
            $("#errorTemperatura").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorTemperatura'>La temperatura es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorTemperatura").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#cantidad").blur(function(){
        if($(this).val() === '') {
            $("#errorCantidad").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorCantidad'>La cantidad es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorCantidad").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#descripcion").blur(function(){
        if($(this).val() === '') {
            $("#errorDescripcion").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorDescripcion'>La descripcion es obligatorio</span");
            $(this).css("border-color", "#dd4b39");
        } else {
            $("#errorDescripcion").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#formActualizarMuestra").submit(function(event){

        if($("#temperatura").val() === '') {
            $("#errorTemperatura").remove();
            $("#temperatura").after("<span style='color: #dd4b39;' id='errorTemperatura'>La temperatura es obligatorio</span");
            $("#temperatura").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorTemperatura").remove();
            $("#temperatura").css("border-color", "#00a65a");
        }

        if($("#cantidad").val() === '') {
            $("#errorCantidad").remove();
            $("#cantidad").after("<span style='color: #dd4b39;' id='errorCantidad'>La cantidad es obligatorio</span");
            $("#cantidad").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorCantidad").remove();
            $("#cantidad").css("border-color", "#00a65a");
        }

        if($("#descripcion").val() === '') {
            $("#errorDescripcion").remove();
            $("#descripcion").after("<span style='color: #dd4b39;' id='errorDescripcion'>La descripcion es obligatorio</span");
            $("#descripcion").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorDescripcion").remove();
            $("#descripcion").css("border-color", "#00a65a");
        }

        
    });
});