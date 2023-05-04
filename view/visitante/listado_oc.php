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
                                    <li class="breadcrumb-item active">Listado-OC</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">OC Disponibles
                                <a class="btn btn-outline-purple btn-icon" type="button" href="historial_oc.php">
                                    <i data-feather="calendar"></i>  Historial
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="sb-datatable table-responsive">
                                    <table class="table table-bordered table-hover display" id="oc_disponibles" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5%">ID</th>
                                                <th width="75%">Descripción</th>
                                                <th width="5%">Prioridad</th>
                                                <th width="5%">Estado</th>
                                                <th width="5%">Responsable</th>
                                                <th width="5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="busqueda"></tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Descripción</th>
                                                <th>Prioridad</th>
                                                <th>Estado</th>
                                                <th>Responsable</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
             </div>
        </div>
<input type="text" id="pantalla" value="1" hidden="">
<?php
    include("footer.php");
?>
<script type="text/javascript">
window.onload = function () {
    f_listar(1);
};
</script>
</body>
</html>


