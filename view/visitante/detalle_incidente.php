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
                                    <li class="breadcrumb-item"><a href="listado_incidentes.php">Listado- Incidentes</a></li>
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
                            <li class="nav-item"><a class="nav-link active" id="overview-pill" href="#oc" data-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Incidentes</a></li>
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
                                                    ID Incidente
                                                    <div class="h5">
                                                        <span id="identificador"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <!-- Account details card-->
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">Detalles
                                            </div>
                                            <div class="card-body">
                                                <form>
                                                    <!-- Form Group (username)-->
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputDescripcion"><strong>Resumen</strong></label>
                                                        <textarea class="form-control" id="inputDescripcion" name="inputDescripcion" disabled type="text"></textarea>
                                                    </div>
                                                     <div class="form-row">
                                                        <!-- Form Group (organization name)-->
                                                        <div class="form-group col-md-3">
                                                            <label class="small mb-1" for="selectArea"><strong>Área</strong></label>
                                                                <select class="form-control" name="selectArea" id="selectArea" disabled>
                                                                    <option value="1">Funcional</option>
                                                                    <option value="4">Operación</option>
                                                                    <option value="5">Ejercicio de continuidad</option>
                                                                </select>
                                                        </div>
                                                        <!-- Form Group (location)-->
                                                        <div class="form-group col-md-9">
                                                            <label class="small mb-1" for="selectGrupo"><strong>Grupos</strong></label>
                                                            <select class="form-control" id="selectGrupo" name="selectGrupo" disabled style="dis"></select>
                                                        </div>
                                                        <div class="form-group col-md-7" style="display: none;">
                                                            <label class="small mb-1" for="inputOtro"><strong>Otro Grupo</strong></label>
                                                            <input class="form-control" id="inputOtro" name="inputOtro" type="text" disabled />
                                                        </div>
                                                    </div>
                                                    <!-- Form Row-->
                                                    <div class="form-row">
                                                        <!-- Form Group (first name)-->
                                                        <div class="form-group col-md-4">
                                                            <label class="small mb-1" for="selectPrioridad"><strong>Prioridad</strong></label>
                                                            <select class="form-control" name="selectPrioridad" id="selectPrioridad" disabled></select>
                                                        </div>
                                                        <!-- Form Group (last name)-->
                                                        <div class="form-group col-md-4">
                                                            <label class="small mb-1" for="selectEstado">Estado</label>
                                                           <select class="form-control" name="selectEstado" id="selectEstado" disabled></select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="small mb-1" for="selectResponsable"><strong>Responsable</strong></label>
                                                            <select class="form-control" id="selectResponsable" name="selectResponsable" disabled></select>
                                                        </div>
                                                    </div>
                                                    <!-- Form Row        -->
                                                   
                                                    <!-- Form Group (email address)-->
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputAfectados"><strong>Usuarios Afectados</strong></label>
                                                        <textarea class="form-control" id="inputAfectados" name="inputAfectados" disabled></textarea>
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
<input type="text" id="pantalla" value="2">
</body>
<?php
    include("footer.php");
?>
<script type="text/javascript">
window.onload = function () {
    select(2);
    cargarData(3);
    cargarData(4);//carga timeline
};
</script>
</body>
</html>

