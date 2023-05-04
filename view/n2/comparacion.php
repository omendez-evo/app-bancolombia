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
                                    <li class="breadcrumb-item active">Comparación</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">Cruces de Archivos  
                                <form id="enviar" enctype="multipart/form-data">
                                    <input type="file" accept=".xlsx" name="cargar_csv" style="cursor:pointer;"/>
                                    <button class="btn btn-outline-success" type="button" id="btn-enviar">Cargar CSV</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <div id="estado">
                                    <button class="btn btn-outline-success" type="button" onclick="f_listar_2()">Iniciar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
             </div>
        </div>
        <link href="../../assets/css/tableexport.css" rel="stylesheet" />
<?php
    include("footer.php");
?>
<script src="../../assets/js/exportar/FileSaver.min.js"></script>
<script src="../../assets/js/exportar/Blob.min.js"></script>
<script src="../../assets/js/exportar/xls.core.min.js"></script>
<script src="../../assets/js/exportar/tableexport.js"></script>
<script type="text/javascript">

function f_listar_2(){
     $.ajax({
        type: 'POST',
        url: '../../controlador/controlador_comparacion.php?opcion=1',
        beforeSend: function () {
           $("#estado").html("<h6 class='spinner-border'></h6>Trabajando Por favor espere");
        },
        success:function(data){    
            $('#busqueda').html(data);
        } 
    });
};
</script>
</body>
</html>

