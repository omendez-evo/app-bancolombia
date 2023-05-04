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
                                    <li class="breadcrumb-item"><a href="listado_problema.php">Listado- Problemas</a></li>
                                    <li class="breadcrumb-item active">Detalle</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                   <div class="container mt-n10">
                        <!-- Account page navigation
                        <nav class="nav nav-borders">
                            <a class="nav-link active ml-0" href="#">OC</a>
                            <a class="nav-link" href="#">Documentación</a>
                        </nav>
                        -->
                        <ul class="nav nav-pills card-header-pills" id="cardPill" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="overview-pill" href="#oc" data-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Problema</a></li>
                            <li class="nav-item"><a class="nav-link" id="activities-pill" href="#documentacion" data-toggle="tab" role="tab" aria-controls="activities" aria-selected="false">Documentación</a></li>
                        </ul>
                        <hr class="mt-0 mb-4" />
                        <div class="tab-content" id="cardPillContent">
                            <div class="tab-pane fade show active" id="oc" role="tabpanel" aria-labelledby="overview-pill">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <!-- Profile picture card-->
                                        <div class="card">
                                            <div class="card-header">Resumen</div>
                                            <div class="card-body">
                                                <!-- Profile picture image-->
                                                <div class="small font-italic text-muted mb-4">
                                                    ID Problema
                                                    <div class="h5">
                                                        <span id="identificador"></span>
                                                    </div>
                                                    <div id="box-incidente" style="display: none;">
                                                        ID Incidente Asociado
                                                        <div class="h5">
                                                            <span id="incindente"></span>
                                                        </div>
                                                    </div>
                                                <!-- Profile picture help block-->
                                                    Tiempo Transcurrido
                                                
                                                    <div class="h5">
                                                        <span id="horas"></span>
                                                        <span id="minutos"></span>
                                                        <span id="segundos"></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <!-- Account details card-->
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">Detalles
                                                <button class="btn btn-outline-warning" id="btn-edit">
                                                    <i data-feather="edit"></i>
                                                </button>
                                                <button class="btn btn-outline-success" id="btn-check" style="display: none;">
                                                    <i data-feather="check"></i>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <form>
                                                    <!-- Form Group (username)-->
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputDescripcion"><strong>Descripción</strong></label>
                                                        <input class="form-control" id="inputDescripcion" name="inputDescripcion" disabled type="text" />
                                                    </div>
                                                     
                                                    <!-- Form Row-->
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="small mb-1" for="selectEstado">Estado</label>
                                                           <select class="form-control" name="selectEstado" id="selectEstado" disabled>
                                                               <option value="1">Abierto</option>
                                                               <option value="2">En Proceso</option>
                                                               <option value="3">Cerrado</option>
                                                           </select>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <label class="small mb-1" for="selectResponsable"><strong>Responsable</strong></label>
                                                            <select class="form-control" id="selectResponsable" name="selectResponsable" disabled></select>
                                                        </div>
                                                    </div>
                                                    <!-- Form Row        -->
                                                   
                                                    <!-- Form Group (email address)-->
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                             <label class="small mb-1" for="inputCaso"><strong>Caso Fabricante</strong></label>
                                                            <input class="form-control" id="inputCaso" name="inputCaso" disabled type="text" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="small mb-1" for="fecha2"><strong>Fecha Solución</strong></label>
                                                                    <input type="text" class="form-control" name="fecha2" id="fecha2" onchange="activar()" disabled>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="small mb-1" for="hora2"><strong>Hora Solución</strong></label>
                                                                    <input type="text" class="form-control" name="hora2" id="hora2" onchange="activar()" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="documentacion" role="tabpanel" aria-labelledby="overview-pill">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">Timeline
                                        <button class="btn btn-outline-success" href="#nuevo" data-toggle="tab" id="btn-nuevo">Nuevo</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="timeline tab-pane fade show active" id="timeline"></div> 
                                            <div class="tab-pane fade" id="nuevo">
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
                                                        <div class="col-md-5"></div>
                                                        <div class="col-md-2">
                                                            <div class="d-flex justify-content-between">
                                                                <button class="btn btn-light" href="#timeline" data-toggle="tab">
                                                                    <i class="fas fa-long-arrow-alt-left" id="btn-atras"></i>
                                                                </button>
                                                                <button class="btn btn-primary" id="btn-guardar" type="button">
                                                                    <i class="fas fa-save"> </i>
                                                                    Guardar
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5"></div>
                                                    </div>
                                                </form>
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
<input type="text" id="pantalla" value="3" hidden="">
<div class="modal fade" id="modal-cerrar" tabindex="-1" role="dialog" aria-labelledby="Seleccionar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmación</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">Indique Fecha y Hora de Cierre</div>
            <form>
                <div class="row"> 
                    <div class="col-md-2"></div>
                     <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="small mb-1" for="fecha"><strong>Fecha</strong></label>
                                <input type="text" class="form-control" name="fecha" id="fecha">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="hora"><strong>Hora</strong></label>
                                <input type="text" class="form-control" name="hora" id="hora">
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" type="button" id="btn-aceptar">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<?php
    include("footer.php");
?>
<script type="text/javascript">
window.onload = function () {
    select(3);
    cargarData(5);
    cargarData(6);//carga timeline
};
function envio(){
    $.ajax({
        type: 'POST',
        data:{fecha:$("#fecha2").val(),hora:$("#hora2").val(),caso:3},
        url: '../../controlador/controller_problem.php?opcion=5',
        success:function(responseText){    
            $('#resultado').html(responseText);  
        } 
    });
}
$('#fecha2').datepicker({language: 'es',format: "yyyy-mm-dd",startDate: new Date()});
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
$("#inputDescripcion").change(function (){
    $.ajax({
        type: 'POST',
        data:{inputDescripcion:$("#inputDescripcion").val(),caso:1},
        url: '../../controlador/controller_problem.php?opcion=5',
        success:function(responseText){    
            $('#resultado').html(responseText);  
        } 
    });
});
$("#inputCaso").change(function (){
    $.ajax({
        type: 'POST',
        data:{inputCaso:$("#inputCaso").val(),caso:2},
        url: '../../controlador/controller_problem.php?opcion=5',
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
            url: '../../controlador/controller_problem.php?opcion=5',
            success:function(responseText){    
                $('#resultado').html(responseText);  
            } 
        });
    }
});
$("#selectResponsable").change(function (){
    $.ajax({
        type: 'POST',
        data:{selectResponsable:$("#selectResponsable").val(),caso:5},
        url: '../../controlador/controller_problem.php?opcion=5',
        success:function(responseText){    
            $('#resultado').html(responseText);  
        } 
    });
});
</script>
</body>
</html>

