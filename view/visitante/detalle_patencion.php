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
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <strong>
                                                    <label for="prioridad">Prioridad:
                                                        <select class="form-control" name="selectPrioridad" id="selectPrioridad" disabled>
                                                        </select>
                                                    </label>
                                                    </strong>
                                                </div>
                                                <div class="form-group">
                                                    <strong>
                                                    <label for="estado">Estado:
                                                        <select class="form-control" name="selectEstado" id="selectEstado" disabled>
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
$("#btn-siguiente").click(function(event) {//boton usando para moverse entre puntos de atencion
    location.href='../../controlador/controller_patencion.php?opcion=10';
}); 
$("#btn-atras").click(function(event) {//boton usando para moverse entre puntos de atencion
    location.href='../../controlador/controller_patencion.php?opcion=11';
}); 
</script>
</body>
</html>

