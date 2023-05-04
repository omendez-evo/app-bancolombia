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
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="listado_patencion.php">Listado- Punto Atención</a></li>
                                    <li class="breadcrumb-item active">Detalle</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                   <div class="container mt-n10">
                        <hr class="mt-0 mb-4" />
                        <div class="tab-content" id="cardPillContent">
                            <div class="tab-pane fade show active" id="documentacion" role="tabpanel" aria-labelledby="overview-pill">
                                <div class="row">
                                    
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <button class="btn btn-outline-danger btn-icon" type="button" id="btn-atras">
                                            Atras
                                        </button>
                                        <button class="btn btn-outline-success btn-icon" type="button" id="btn-siguiente">
                                            Siguiente
                                        </button>
                                    </div>
                                    <div class="card-body">
                                       <div class="row">
                                            <div class="col-md-8">
                                                <strong><h5 id="titulo"></h5></strong>
                                                <strong>Descripción:</strong><br><label id="descripcion"></label><br>
                                                Afectado: <strong><label id="afectado"></label></strong><br>
                                                <strong>
                                                <label for="asignatarios">Asignatarios:
                                                    <div class="select2-container select2-container-multi populate"></div>
                                                    <select multiple="" class="populate" id="selectAsignatarios" style="width: 30em; display: none;" tabindex="-1"></select>
                                                </label>
                                                </strong>
                                                <button class="btn btn-primary" id="btn-guarda-asignatario" type="button">
                                                    <i class="fas fa-paper-plane"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <strong>
                                                    <label for="prioridad">Prioridad:
                                                        <select class="form-control" name="selectPrioridad" id="selectPrioridad">
                                                        </select>
                                                    </label>
                                                    </strong>
                                                </div>
                                                <div class="form-group">
                                                    <strong>
                                                    <label for="estado">Estado:
                                                        <select class="form-control" name="selectEstado" id="selectEstado">
                                                            <option value="1">Abierto</option>
                                                            <option value="2">En Proceso</option>
                                                            <option value="3">Cerrado</option>
                                                        </select>
                                                    </label>
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content">
                                            <strong><label for="descripcion">TimeLine Avances</label></strong>

                                            <div class="timeline tab-pane fade show active" id="timeline"></div> 
                                            <div class="tab-pane fade" id="nuevo">
                                                
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>       
                    </div>
                </main>
             </div>
        </div>
<input type="text" id="pantalla" value="5" hidden="">
<div class="modal fade" id="modal-cerrar" tabindex="-1" role="dialog" aria-labelledby="Seleccionar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmación</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">¿Esta Seguro que desea cerrar?</div>
            <form>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" type="button" id="btn-aceptar">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="Seleccionar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmación</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">¿Esta Seguro que desea eliminar?</div>
            <form>
                <input type="tex" name="traza" id="traza" hidden>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" type="button" id="btn-delete">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-nuevo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Avance</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                        <div class="form-group">
                            <label for="documentacion">Documentación</label>
                            <textarea class="form-control" id="documentacion2" name="documentacion2" rows="5"></textarea>
                        </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-light" type="button" data-dismiss="modal">
                                    <i class="fas fa-long-arrow-alt-left" id="btn-atras"></i>
                                </button>
                                <button class="btn btn-primary" id="btn-guardar" type="button">
                                    <i class="fas fa-save"> </i>
                                    Guardar
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Avance</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="formulario-edit">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                        <div class="form-group">
                            <label for="documentacion">Documentación</label>
                            <textarea class="form-control" id="documentacion4" name="documentacion4" rows="5"></textarea>
                        </div>
                        <input type="text" name="id_traza2" id="id_traza2" hidden>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-light" type="button" data-dismiss="modal">
                                    <i class="fas fa-long-arrow-alt-left" id="btn-atras"></i>
                                </button>
                                <button class="btn btn-primary" id="btn-modificar" type="button">
                                    <i class="fas fa-save"> </i>
                                    Guardar
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-comentario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comentarios de Avances</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form-comment" style="display: none;">
                    <div class="row">
                        <div class="col-md-10">
                        <div class="form-group">
                            <label for="documentacion">Nuevo Comentario</label>
                            <textarea class="form-control" id="documentacion3" name="documentacion3" rows="2"></textarea>
                        </div>
                        <input type="text" name="id_traza" id="id_traza" hidden>
                        <input type="text" name="id_patencion" id="id_patencion" hidden>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-light" id="btn-atras2" type="button">
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                </button>
                                <button class="btn btn-primary" id="btn-guardar34" type="button">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="tab-content">
                    <div class="d-flex justify-content-between">
                        <strong><label for="descripcion">TimeLine Comentarios</label></strong>
                        <button class="btn btn-outline-success btn-icon" type="button" id="btn-nuevo">
                            Nuevo
                        </button>
                    </div>

                    <div class="timeline tab-pane fade show active" id="timeline2"></div> 
                    <div class="tab-pane fade" id="nuevo">
                        
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
<div id="small-agregar">
    <a class="open-small-agregar" data-toggle="modal" data-target="#modal-nuevo" style="color: white;">
        <i class="fa fa-plus"></i>
    </a>
</div>
</body>
<?php
    include("footer.php");
?>
<script type="text/javascript">
window.onload = function () {
    select(4);
    cargarData(7);
    cargarData(8);//carga timeline
    
};
function cargar_comentario(id){
    $.ajax({
        type: 'POST',
        data:{id:id},
        url: '../../controlador/controller_patencion.php?opcion=13',
        success:function(responseText){    
            $('#resultado').html(responseText);  
            $("#modal-comentario").modal('show');
        } 
    });
}
function delet_avances(id){
    $("#traza").val(id);
    $("#modal-delete").modal('show');
}
function edit_avances(id){
    $("#id_traza2").val(id);
    $.ajax({
        type: 'POST',
        data:{id:id},
        url: '../../controlador/controller_patencion.php?opcion=15',
        success:function(responseText){    
            $('#documentacion4').val(responseText)
            $("#modal-edit").modal('show');
        } 
    });
}
$("#selectAsignatarios").select2({
    /*ajax: {
        url: '../../controlador/controller_patencion.php?opcion=19',
        dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
    }
*/
});


$("#btn-guarda-asignatario").click(function (){
    $.ajax({
        type: 'POST',
        data:{selectAsignatarios:$("#selectAsignatarios").val()},
        url: '../../controlador/controller_patencion.php?opcion=18',
        success:function(responseText){    
            $('#resultado').html(responseText);  
        } 
    });
});
$("#small-agregar").click(function (){
    $("#documentacion2").val("");
});
$("#btn-atras2").click(function (){
    $("#btn-nuevo").show();
    $("#documentacion3").val("");
    $("#form-comment").hide();
});
$("#btn-nuevo").click(function (){
    $(this).hide();
    $("#documentacion3").val("");
    $("#form-comment").show();
});

$("#selectAsignatarios").on("select2:unselect", function (e) { 
   $.ajax({
        type: 'POST',
        data:{usuario:e.params.data.id},
        url: "../../controlador/controller_patencion.php?opcion=20",
        success:function(responseText){    
            $('#resultado').html(responseText);  
        } 
    });
});
$("#btn-guardar34").click(function (){
    if($("#documentacion3").val()!=""){
        $.ajax({
            type: 'POST',
            data:{documentacion:$("#documentacion3").val(),id_traza:$("#id_traza").val(),id_patencion:$("#id_patencion").val()},
            url: "../../controlador/controller_patencion.php?opcion=14",
            success:function(responseText){    
                $('#resultado').html(responseText);  
                $("#nuevo").removeClass("show active");
                $("#timeline").addClass("show active");
                $("#btn-nuevo").show();

            } 
        });
    }else{
      toastr.error("Nuevo Comentario esta vacio");
    }
});

$("#btn-delete").click(function (){
    $.ajax({
        type: 'POST',
        data:{traza:$("#traza").val()},
        url: "../../controlador/controller_patencion.php?opcion=17",
        success:function(responseText){    
            $('#resultado').html(responseText);  
            $("#modal-delete").modal('hide');
        } 
    });
    
});

$("#btn-modificar").click(function (){
    if($("#documentacion4").val()!=""){
        $.ajax({
            type: 'POST',
            data:$("#formulario-edit").serialize(),
            url: "../../controlador/controller_patencion.php?opcion=16",
            success:function(responseText){    
                $('#resultado').html(responseText);  
                $("#modal-edit").modal('hide');

            } 
        });
    }else{
      toastr.error("Nuevo avance esta vacio");
    }
});

$("#btn-siguiente").click(function(event) {//boton usando para moverse entre puntos de atencion
    location.href='../../controlador/controller_patencion.php?opcion=10';
}); 
$("#btn-atras").click(function(event) {//boton usando para moverse entre puntos de atencion
    location.href='../../controlador/controller_patencion.php?opcion=11';
}); 
$("#selectPrioridad").change(function (){
    $.ajax({
        type: 'POST',
        data:{selectPrioridad:$("#selectPrioridad").val(),caso:3},
        url: '../../controlador/controller_patencion.php?opcion=5',
        success:function(responseText){    
            $('#resultado').html(responseText);  
        } 
    });
});
$("#selectEstado").change(function (){
    var estado=$("#selectEstado").val();
    if ((estado == 1) || (estado == 2)){
        $.ajax({
            type: 'POST',
            data:{selectEstado:estado,caso:4},
            url: '../../controlador/controller_patencion.php?opcion=5',
            success:function(responseText){    
                $('#resultado').html(responseText);  
            } 
        });
    }
});
$('#hora2').clockpicker({
    placement: 'top',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
function activar(){
    if($("#fecha2").val()!=""&& $("#hora2").val()!=""){
        envio();
    }
}
</script>
</body>
</html>

