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
                                    <li class="breadcrumb-item"><a href="listado_oc.php">Listado- OC</a></li>
                                    <li class="breadcrumb-item active">Nuevo</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="step step-green nav nav-pills nav-wizard" role="tablist">
                                    <div class="step-item active">
                                        <a class="step-item-link" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab" aria-selected="true">Paso 1</a>
                                    </div>
                                    <div class="step-item">
                                        <a class="step-item-link" id="wizard2-tab" href="#wizard2" data-toggle="tab" role="tab" aria-selected="true">Paso 2</a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="cardTabContent">
                                    <div class="tab-pane fade show active" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
                                        <div class="row justify-content-center">
                                            <div class="col-xxl-6 col-xl-8">
                                                <form id="formulario1">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="small mb-1" for="inputOC"><strong>ID OC</strong></label>
                                                            <input class="form-control" id="inputOC" type="number" name="inputOC" required placeholder="Ingrese ID OC" />
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="small mb-1" for="inputEstado"><strong>Estado</strong></label>
                                                             <input class="form-control" id="inputEstado" name="inputEstado" type="text" value="Abierto" readonly="true" />
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="small mb-1" for="selectPrioridad"><strong>Prioridad</strong></label>
                                                            <select class="form-control" name="selectPrioridad" id="selectPrioridad"></select>
                                                        </div>
                                                        <div class="col-md-6">
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
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="small mb-1" for="inputDescripcion"><strong>Descripción</strong></label>
                                                            <input class="form-control" id="inputDescripcion" name="inputDescripcion" type="text" placeholder="Ingrese Descripción" />
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="d-flex justify-content-between">
                                                        <a class="btn btn-danger" href="listado_oc">Atras</a>
                                                        <button class="btn btn-primary" id="btn-next" type="button">Siguiente</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
                                        <div class="row justify-content-center">
                                            <div class="col-xxl-6 col-xl-8">
                                                <form id="formulario2">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="small mb-1" for="selectCategoria"><strong>Categoría</strong></label>
                                                            <select class="form-control" id="selectCategoria" name="selectCategoria"></select>
                                                        </div>
                                                        <div class="form-group col-md-10" style="display: none;">
                                                            <label class="small mb-1" for="inputOtro"><strong>Otra Categoría</strong></label>
                                                            <input class="form-control" id="inputOtro" name="inputOtro" type="text" placeholder="Ingrese Otra Categoría" />
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="small mb-1" for="selectArea"><strong>Área</strong></label>
                                                            <select class="form-control" name="selectArea" id="selectArea">
                                                                <option value="1">Funcional</option>
                                                                <option value="4">Operación</option>
                                                                <option value="5">Ejercicio de continuidad</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="small mb-1" for="selectResponsable"><strong>Responsable</strong></label>
                                                            <select class="form-control" id="selectResponsable" name="selectResponsable"></select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="small mb-1" for="inputAfectados"><strong>Usuarios Afectados</strong></label>
                                                            <textarea class="form-control" id="inputAfectados" name="inputAfectados"></textarea>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="d-flex justify-content-between">
                                                        <button class="btn btn-danger" id="btn-back" type="button">Atras</button>
                                                        <button class="btn btn-primary" id="btn-save" type="button">Guardar</button>
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
<input type="text" id="pantalla" value="1" hidden="">
</body>
<?php
    include("footer.php");
?>
<script type="text/javascript">
window.onload = function () {
    select(1);
};
    
</script>
</body>
</html>

