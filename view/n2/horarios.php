<!DOCTYPE html>
<html lang="es">
<?php
    include("head.php");
    include("../navTop.php");
?>
<body class="sb-nav-fixed sb-sidenav-toggled">
        <div id="layoutSidenav">
            <?php
                include("nav.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="sb-page-header pb-10 sb-page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="sb-page-header-content py-3">
                                 <ol class="breadcrumb mt-4 mb-0">
                                    <!--<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>-->
                                    <li class="breadcrumb-item"><a href="usuarios-backup.php">Usuarios-Backup</a></li>
                                    <li class="breadcrumb-item active">Detalle</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">
                                Tablero Horarios
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="tab-content" id="cardPillContentVertical">
                                             <div class="tab-pane fade" id="nuevo" role="tabpanel" aria-labelledby="overview-pill-vertical">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <button class="btn btn-outline-success" type="button" id="btn-nuevo-horario" style="margin-bottom: 1em;">Nuevo Horario</button>
                                                        <button class="btn btn-outline-primary" type="button" id="btn-guardar" style="margin-bottom: 1em; display: none;">Guardar</button>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group clockpicker" style="display: none;">
                                                            <input type="text" class="form-control" name="hora_inicio" id="hora_inicio" placeholder="Hora Inicio">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group clockpicker" style="display: none;">
                                                            <input type="text" class="form-control" name="hora_final" id="hora_final" placeholder="Hora Final">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="sb-datatable table-responsive">
                                                    <table class="table table-bordered table-hover display" id="listado_horarios" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Creado</th>
                                                                <th>Hora Inicio</th>
                                                                <th>Hora Final</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show active" id="agentes" role="tabpanel" aria-labelledby="example-pill-vertical">
                                                <div class="sb-datatable table-responsive">
                                                    <table class="table table-bordered table-hover display" id="listado_agentes" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Usuario</th>
                                                                <th>Nombres</th>
                                                                <th>Apellidos</th>
                                                                <th>Horario</th>
                                                                <th>Hora Inicio</th>
                                                                <th>Hora Final</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="busqueda"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <ul class="nav nav-pills flex-column" id="cardPillVertical" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#agentes" data-toggle="tab" role="tab" aria-controls="agentes" aria-selected="true">Agentes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#nuevo" data-toggle="tab" role="tab" aria-controls="Nuevo" aria-selected="false">Nuevo</a>
                                            </li>
                                        </ul>
                                    </div>          
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
         
        <div class="modal fade" id="modal-cambiar-horario" tabindex="-1" role="dialog" aria-labelledby="Seleccionar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cambiar Horario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="horario-usuario">Usuario</label>
                        <input class="form-control" id="horario-usuario" name="horario-usuario" type="text" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="horario">Horario</label>
                        <select class="form-control" id="horario" name="horario"></select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mod-hora_inicio">Hora Inicio</label>
                                <input class="form-control" id="mod-hora_inicio" name="mod-hora_inicio" type="text" readonly="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mod-hora_final">Hora Final</label>
                                <input class="form-control" id="mod-hora_final" name="mod-hora_final" type="text" readonly="">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" id="btn-guardar-horario" type="button">Aceptar</button>
                </div>
        </div>
    </div>
</div>

<?php
    include("footer.php");
?>
<script type="text/javascript">
window.onload = function () {
    cargar_horarios();
    cargar_horarios_agentes();
    cargar_select();
};
function cargar_horarios(){
    $("#listado_horarios").DataTable({ 
        language: {
            url: '../../assets/js/Spanish.json'
        },
        destroy: true,
        searching:false,
        paging: false,
        ajax:{
            method:"POST",
            url: "../../controlador/controlador_horarios.php?opcion=1",
        },
        "columns":[
            {data:"id"},
            {data:"creado"},
            {data:"hora_inicio"},
            {data:"hora_final"},
        ] 
    }); 
}
function cargar_horarios_agentes(){
    $("#listado_agentes").DataTable({ 
        language: {
            url: '../../assets/js/Spanish.json'
        },
        destroy: true,
        searching:false,
        paging: false,
        ajax:{
            method:"POST",
            url: "../../controlador/controlador_horarios.php?opcion=3",
        },
        "columns":[
            {data:"usuario"},
            {data:"nombres"},
            {data:"apellidos"},
            {data:"id_horario"},
            {data:"hora_inicio"},
            {data:"hora_final"},
            {"render": function (data, type, row) {
                return '<button class="btn btn-cambiar btn-outline-primary btn-sm" type="button">Cambiar Horario</button>'
            }},        
        ] 
    }); 
}
function cargar_select(){
    $.ajax({
        type: 'POST',
        url: '../../controlador/controlador_horarios.php?opcion=4',
        success:function(responseText){    
            $('#horario').html(responseText); 
        } 
    });
};
$('#horario').change(function(event) {
    $.ajax({
        type: 'POST',
        data: {horario:$("#horario").val()},
        url: '../../controlador/controlador_horarios.php?opcion=5',
        success:function(responseText){    
            $('#resultado').html(responseText); 
        } 
    });
});
$('#btn-guardar-horario').click(function(event) {
    $.ajax({
        type: 'POST',
        data: {horario:$("#horario").val(),usuario:$("#horario-usuario").val()},
        url: '../../controlador/controlador_horarios.php?opcion=6',
        success:function(responseText){    
            $('#resultado').html(responseText); 
            cargar_horarios_agentes();
            $("#modal-cambiar-horario").modal('hide');

        } 
    });
});

$('#btn-nuevo-horario').click(function(event) {
    $(".clockpicker").show();
    $("#btn-guardar").show();
    $('#btn-nuevo-horario').hide();
    $('#hora_inicio').val('');
    $('#hora_final').val('');
});
$('#btn-guardar').click(function(event) {
    $(".clockpicker").hide();
    $("#btn-guardar").hide();
    $.ajax({
        type: 'POST',
        data: {hora_inicio: $("#hora_inicio").val(),hora_final: $("#hora_final").val()},
        url: '../../controlador/controlador_horarios.php?opcion=2',
        success:function(responseText){    
            $('#resultado').html(responseText); 
            $('#btn-nuevo-horario').show();
            cargar_horarios();
        } 
    });
});
$('#hora_inicio').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
$('#hora_final').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});

$("#busqueda").on("click", ".btn-cambiar", function(event){
   //location.href='../../controlador/usuarios_backup.php?opcion=6&id='+$(this).parent().prev().prev().text();
   $("#horario-usuario").val($(this).parent().prev().prev().prev().prev().prev().prev().text());
   $('#horario').val($(this).parent().prev().prev().prev().text());
   $("#modal-cambiar-horario").modal('show');
});

</script>
</body>
</html>

