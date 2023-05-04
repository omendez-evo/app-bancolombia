<!DOCTYPE html>
<html lang="es">
<?php
    ini_set('date.timezone', 'America/Bogota');
    $time = time();
    $a=(date("m", $time));
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
                                <h2 class="sb-page-header-title">
                                    <span>Dashboard</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                   <div class="container-fluid mt-n10">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-purple h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small font-weight-bold text-purple mb-1">Horas Iniciativas</div>
                                                <div class="h5">
                                                    <span id="horas">00:</span>
                                                    <span id="minutos">00:</span>
                                                    <span id="segundos">00</span>
                                                </div>
                                                <div class="text-xs font-weight-bold text-danger d-inline-flex align-items-center">
                                                <div class="col-md-5" style="padding-left: 0;">
                                                    <button class="btn btn-outline-primary btn-icon" type="button" onclick="cargar_tabla('Iniciativas');">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                    <button class="btn btn-outline-primary btn-icon" id="btn-export-incidente" type="button">
                                                        <i class="fas fa-file-excel"></i>
                                                    </button>
                                                    
                                                </div>
                                                <div class="col-md-7">
                                                    <span id="indicador-hora">
                                                        <span id="horas_messages"></span>
                                                        <span id="horas_a"></span>
                                                        <span id="minutos_a"></span>
                                                        <span id="segundos_a"></span>
                                                    </span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="ml-2">
                                                <i class="far fa-clock fa-2x text-gray-200"></i>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6 mb-4">
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-purple h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small font-weight-bold text-purple mb-1">N° INC Abiertos</div>
                                                <div><label class="h5" id="cant_incidente"></label></div>
                                                <div class="text-xs font-weight-bold text-danger d-inline-flex align-items-center">
                                                <div>
                                                    <button class="btn btn-outline-primary btn-icon" type="button" onclick="cargar_tabla('Incidentes');">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                    <button class="btn btn-outline-primary btn-icon" id="btn-export-incidente" type="button">
                                                        <i class="fas fa-file-excel"></i>
                                                    </button>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="ml-2"><i class="fas fa-laptop fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6 mb-4">
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-green h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small font-weight-bold text-green mb-1">N° OC Abiertos</div>
                                                <div class="h5" id="cant_oc"></div>
                                                <div class="text-xs font-weight-bold text-danger d-inline-flex align-items-center">       
                                                    <div>
                                                        <button class="btn btn-outline-success btn-icon" type="button" onclick="cargar_tabla('OC');">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                        <button class="btn btn-outline-success btn-icon" id="btn-export-oc" type="button">
                                                            <i class="fas fa-file-excel"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="ml-2"><i class="fas fa-book-open fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6 mb-4">
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-yellow h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small font-weight-bold text-yellow mb-1">N° Prob Abiertos</div>
                                                <div class="h5" id="cant_problema"></div>
                                                <div class="text-xs font-weight-bold text-danger d-inline-flex align-items-center">
                                                <div>
                                                    <button class="btn btn-outline-warning btn-icon" type="button" onclick="cargar_tabla('Problemas');">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                    <button class="btn btn-outline-warning btn-icon" id="btn-export-problemas" type="button">
                                                        <i class="fas fa-file-excel"></i>
                                                    </button>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="ml-2"><i class="fas fa-exclamation-triangle fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-yellow h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small font-weight-bold text-red mb-1">N° Punto Atención Abiertos</div>
                                                <div class="h5" id="cant_patencion"></div>
                                                <div class="text-xs font-weight-bold text-danger d-inline-flex align-items-center">
                                                <div>
                                                   <button class="btn btn-outline-danger btn-icon" type="button" onclick="cargar_tabla('Punto Atención');">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                    <button class="btn btn-outline-danger btn-icon" id="btn-export-patencion" type="button">
                                                        <i class="fas fa-file-excel"></i>
                                                    </button>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="ml-2"><i class="fas fa-bullhorn fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4" id="card-tabla" style="display: none;">
                            <div class="card-header d-flex justify-content-between align-items-center"><div id="titulo-tabla"></div> 
                                <button class="btn btn-outline-red btn-icon shadow-sm my-1" onclick="ocultar('card-tabla')"><i data-feather="x"></i></button>
                            </div>
                            <div class="card-body">
                                <div class="sb-datatable table-responsive">
                                    <table class="table table-bordered table-hover display" id="tabla" width="100%" cellspacing="0">
                                        <tbody id="busqueda"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">Casos Asignados
                                        <div class="form-group" style="margin-bottom: 0rem;">
                                            <select class="form-control" id="c_asignado">
                                                <option value="1">Punto Atención</option>
                                                <option value="2">Iniciativas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="sb-datatable table-responsive2">
                                            <table class="table table-hover display" id="listado_casos" width="100%" cellspacing="0">
                                                <tbody id="busqueda_caso"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer small text-muted" id="actualizado_bar"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">Gráfico Mensual
                                        <div class="form-group" style="margin-bottom: 0rem;">
                                            <select class="form-control" id="g_mensual">
                                                <option value="1">Incidentes</option>
                                                <option value="2">OC</option>
                                                <option value="3">Problemas</option>
                                                <option value="4">Punto Atención</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-pie"><canvas id="doughnut_chart" width="100%" height="50"></canvas></div>
                                        <div id="total_cant"></div>
                                    </div>
                                    <div class="card-footer small text-muted" id="actualizado_doughnut"></div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="form-group" style="margin-bottom: 0rem;">
                                    <select class="form-control" id="opcion_cant">
                                        <option value="2">Cantidad Incidentes</option>
                                        <option value="1">Cantidad OC</option>
                                        <option value="3">Cantidad Problemas</option>
                                        <option value="4">Cantidad Punto Atención</option>

                                    </select>
                                </div>
                                <div class="custom-control custom-radio" style="display: inline-block;color: black;">
                                    <input class="custom-control-input" checked="" type="radio" name="radioInline" id="radio-meses" value="2">
                                    <label class="custom-control-label"  for="radio-meses">Meses</label>
                                </div>
                                <div class="custom-control custom-radio" style="display: none;color: black;">
                                    <input class="custom-control-input"  type="radio" id="radio-semanas" name="radioInline" value="1">
                                    <label class="custom-control-label" for="radio-semanas">Semanas</label>
                                </div>
                                <div class="form-group" style="margin-bottom: 0rem;">
                                    <select class="form-control" id="meses" style="display: none;">
                                        <option value="1">Enero</option>
                                        <option value="2">Febrero</option>
                                        <option value="3">Marzo</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Mayo</option>
                                        <option value="6">Junio</option>
                                        <option value="7">Julio</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>

                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-area"><canvas id="myAreaChart" width="100%" height="50"></canvas></div>
                            </div>
                            <div class="card-footer small text-muted" id="actualizado_line"></div>
                            
                        </div>
                        

                </main>
             </div>
        </div>

<input type="text" id="pantalla" hidden="">
<?php
    include("footer.php");
?>
<script src='../../assets/js/circle.min.js'></script>


<script type="text/javascript">
$(document).ready(function () {

    cantidad();
    cantidad_horas();
    setInterval(function(){cantidad()}, 30000);
    setInterval(function(){cantidad_horas()}, 30000);
    grafico_line_meses(2);
    $("#meses").hide();
    grafico_doughnut(1);
    buscar_en_proceso('1');
    
    $('#g_mensual').change(function(){
        grafico_doughnut($(this).val());
    });
    $('#c_asignado').change(function(){
        buscar_en_proceso($(this).val());
    });
    $("#busqueda_caso").on("click", ".btn-seleccionar_4", function(event){
        var id= $(this).parent().prev().prev().prev().text();
        location.href="../../controlador/controller_patencion.php?opcion=6&id="+id
    });
    $('#opcion_cant').change(function(){
        valor= $(this).val();
        if($('input:radio[name=radioInline]:checked').val()=='1'){

        }else{
            $("#meses").hide();
            $("canvas#myAreaChart").remove();
            $("div.chart-area").append('<canvas id="myAreaChart" width="100%" height="50"></canvas>');
            grafico_line_meses(valor);
        }
    });
    $('#g-agente').change(function(){
        $("canvas#myBarChart").remove();
        $("div.chart-bar").append('<canvas id="myBarChart" width="100%" height="50"></canvas>')
        grafico_bar($("#g-agente").val());
    });
    $('#meses').change(function(){
        $("canvas#myAreaChart").remove();
        $("div.chart-area").append('<canvas id="myAreaChart" width="100%" height="30"></canvas>')
        grafico_line($("#meses").val());
    });
    $("input[name=radioInline]").click(function (){
        if($('input:radio[name=radioInline]:checked').val()=='1'){
            $("#meses").show();
            $("canvas#myAreaChart").remove();
            $("div.chart-area").append('<canvas id="myAreaChart" width="100%" height="30"></canvas>')
            grafico_line($("#meses").val());
           
        }else{
            $("#meses").hide();
            $("canvas#myAreaChart").remove();
            $("div.chart-area").append('<canvas id="myAreaChart" width="100%" height="50"></canvas>');
            grafico_line_meses($('#opcion_cant').val());

        }
    });
    $("#btn-export-si").click(function(event) {//boton usado para exportar excel
        location.href='../../controlador/controlador_exportar.php?opcion=4';
    });
});
function cantidad_horas(){//carga horas iniciativas 
    $.ajax({
        url: "../../controlador/controller_iniciativa.php?opcion=25",
        success:function(data){    
            $("#resultado").html(data);

        } 
    }); 
}
function cantidad_proceso(){//carga cantidad 
    $.ajax({
        url: "../../controlador/controlador_grafico.php?opcion=9",
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        success:function(data){    
            $("#indicador-total").html("En Proceso: "+data[0].cant);
            $("#cant_si").html(data[0].cant_2);
            if(data[0].cant_2 == 0){
                $("#btn-search-si").removeAttr("onclick");
                $("#btn-search-si").attr("disabled","true");
                $("#btn-export-si").attr("disabled","true");

            }

        } 
    }); 
}

function buscar_en_proceso(id){
    $("#listado_casos_wrapper").remove();
    $("div.table-responsive2").append('<table class="table table-hover display" id="listado_casos" width="100%" cellspacing="0"><tbody id="busqueda_caso"></tbody></table>');
    var url;
    var nombre;
    switch (id){
        case '1':
            nombre="Prioridad";
            url="../../controlador/controller_patencion.php?opcion=21";
            break;
        case '2':
            nombre="Estado";
            url="../../controlador/controller_iniciativa.php?opcion=21"
            break;
    }
    console.log(id);
    console.log(url);
    $("#listado_casos").DataTable({
        scrollY:        "280px",
        scrollCollapse: true,
        paging:         false,
        searching:false,
        destroy: true,
        ajax:{
            method:"POST",
            url: url,
        },
        columns:[
            {data:"id",title: "ID"},
            {data:"titulo",title: "Titulo"},
            {"render": function (data, type, row) {
                if(id==1){
                    switch(row.prioridad){
                        case 'Baja': return ' <span class="badge badge-success">'+row.prioridad+'</span>'
                        case 'Media': return ' <span class="badge badge-warning">'+row.prioridad+'</span>'
                        case 'Alta': return ' <span class="badge badge-danger">'+row.prioridad+'</span>'
                        case 'Critico': return ' <span class="badge badge-danger">'+row.prioridad+'</span>'
                        case 'No Asignada': return ' <span class="badge">'+row.prioridad+'</span>'
                    }
                }else{
                     switch(row.estado){
                        case 'En proceso': return ' <span class="badge badge-success">'+row.estado+'</span>'
                        case 'Abierto': return ' <span class="badge badge-primary">'+row.estado+'</span>'
                    }
                }
            },title: nombre },
            {"render": function (data, type, row) {
                   return '<button class="btn btn-seleccionar_4 btn-outline-primary btn-sm" type="button">Entrar</button>'
            }},        
        ],
        "order": []
    });
}
</script>
</body>
</html>
