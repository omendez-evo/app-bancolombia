<!DOCTYPE html>
<html lang="es">
<?php
    ini_set('date.timezone', 'America/Bogota');
    $time = time();
    $fecha=(date("Y,m-1,d", $time));
   

    include("head.php");
?>

 <link href='../../assets/scheduler/codebase/dhtmlxscheduler_material.css?v=5.3.7' rel="stylesheet" type="text/css" charset="utf-8" />
  <script src='../../assets/scheduler/codebase/dhtmlxscheduler.js' type="text/javascript" charset="utf-8"></script>
<script src='../../assets/scheduler/codebase/ext/dhtmlxscheduler_minical.js' type="text/javascript" charset="utf-8"></script>
<script src='../../assets/scheduler/codebase/locale/locale_es.js' type="text/javascript" charset="utf-8"></script>



<script type="text/javascript" charset="utf-8">
    function init(usuario) {
        scheduler.config.multi_day = true;
         scheduler.config.readonly = true;
        scheduler.config.details_on_dblclick = true;

        scheduler.init('scheduler_here',new Date(<?php echo $fecha ?>),"week");
        scheduler.load("../../controlador/controlador_horarios.php?opcion=8&usuario="+usuario+"");

    }
    
    function show_minical(){
        if (scheduler.isCalendarVisible())
            scheduler.destroyCalendar();
        else
            scheduler.renderCalendar({
                position:"dhx_minical_icon",
                date:scheduler.getState().date,
                navigation:true,
                handler:function(date,calendar){
                    scheduler.setCurrentView(date);
                    scheduler.destroyCalendar()
                }
            });
    }


    
</script>
<?php
    include("../navTop.php");
?>

<body class="sb-nav-fixed sb-sidenav-toggled">
        <div id="layoutSidenav">
            <?php
                include("nav.php");
            ?>

            <div id="layoutSidenav_content">
                <body>
                   <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
                      <div class="dhx_cal_navline">
                         <div class="dhx_cal_prev_button">&nbsp;</div>
                         <div class="dhx_cal_next_button">&nbsp;</div>
                         <div class="dhx_cal_today_button"></div>
                         <div class="dhx_cal_date"></div>
                         <div class="dhx_minical_icon" id="dhx_minical_icon" onclick="show_minical()">&nbsp;</div>
                         <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
                         <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
                         <select class="dhx_cal_tab dhx_cal_navline" style="right: auto;left: 192px;top: 14px;width: 14em;height: 32px;" id="usuarios">
                         </select>
                      </div>
                      <div class="dhx_cal_header">
                      </div>
                      <div class="dhx_cal_data">
                      </div>
                   </div>
                </body>
                
            </div>
        </div>
       
<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="visualizar" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Resumen Trabajo Diario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 col-xl-3 mb-4">
                        <div class="card o-visible mb-4">
                            <div class="card-body">
                                <h4>Información</h4>
                                <label>Usuario: <strong id="agent-usuario"></strong></label>
                                <label>Horario asignado: <strong id="horario"></strong></label>
                                <label>Inicio Hoy: <strong id="sesion"></strong></label><br>
                                <label class="badge badge-danger" id="indicador-retraso" style="display: none;">Retraso  
                                    <span id="horas"></span>
                                    <span id="minutos"></span>
                                    <span id="segundos"></span>
                                </label>
                            </div>  
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-9 mb-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>Gráfico</h5>
                                <div class="chart-pie"><canvas id="doughnut_chart" width="100%" height="50"></canvas></div>
                                <div id="total_peso"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-primary" type="button" data-dismiss="modal">Cerrar</button></div>
        </div>
    </div>
</div>

<?php
    include("footer.php");
?>
<script type="text/javascript">
    cargar_select();

$("#usuarios").change(function (){
    //parte que borra los eventos 
    var evs = scheduler.getEvents();
    var validador=false;
    console.log(evs);
    if (Object.entries(evs).length === 0) {
        validador=true;
    }else{
        for (var i=0; i<evs.length; i++){
           scheduler.deleteEvent(evs[i].id);
            if(i==evs.length-1){
                validador=true;
            }
        }
    }
    if(validador==true){
        init($("#usuarios").val());
    }
});
scheduler.attachEvent("onClick", function (id, e){
       //any custom logic here
    $("canvas#doughnut_chart").remove();
    $("div.chart-pie").append('<canvas id="doughnut_chart" width="100%" height="50"></canvas>');
    grafico_doughnut_dia(id);
        $.ajax({
        type: 'POST',
        url: '../../controlador/controlador_grafico.php?opcion=14',
        data:{id:id},
        success:function(responseText){    
            $('#resultado').html(responseText); 
            $("#visualizar").modal('show');
            $("#agent-usuario").html($("#usuarios").val());
       
        } 
    });
});
function formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return '0 Bytes';

    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}
function grafico_doughnut_dia(id){
    var total_peso;
    $(document).ready(function() {
        $.ajax({
            url: '../../controlador/controlador_grafico.php?opcion=13',
            dataType: 'json',
            contentType: "application/json; charset=utf-8",
            method: "GET",
            data:{id:id},
            success: function(data) {
                var nombre = ['Correo','OneDrive','SharePoint'];
                var stock = [];
                var color = ['#ec407a', '#5e35b1', '#4caf50'];
                var bordercolor = ['#b4004e', '#280680', '#087f23'];

                for (var i in data) {
                    stock.push(data[i].correo);
                    stock.push(data[i].one_drive);
                    stock.push(data[i].sharepoint);
                    var byte_correo=data[i].correo*1024*1024*1024;
                    var byte_onedrive=data[i].one_drive*1024*1024*1024;
                    var byte_sharepoint=data[i].sharepoint*1024*1024*1024;
                    total_peso=parseFloat(byte_correo)+ parseFloat(byte_onedrive)+parseFloat(byte_sharepoint);

                }
                $("#total_peso").html("Total: <strong>"+formatBytes(total_peso,3)+"</strong>");

                var chartdata = {
                    labels: nombre,
                    datasets: [{
                        label: nombre,
                        backgroundColor: color,
                        borderColor: color,
                        borderWidth: 2,
                        hoverBackgroundColor: color,
                        hoverBorderColor: bordercolor,
                        data: stock
                    }]
                };

                var mostrar = $("#doughnut_chart");

                var grafico = new Chart(mostrar, {
                    type: 'doughnut',
                    data: chartdata,
                    options: {
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                }
                            }]
                        }
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#280680",
                            borderColor: "#dddfeb",
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10
                        },
                        legend: {
                            display: true,
                            position: 'right',
                            align: 'center'
                        },
                        cutoutPercentage: 80
                    }
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
}
function cargar_select(){
    $.ajax({
        type: 'POST',
        url: '../../controlador/usuarios_backup.php?opcion=28',
        success:function(responseText){    
            $('#usuarios').html(responseText); 
            init($("#usuarios").val());
        } 
    });
};

</script>
    
</body>
</html>
