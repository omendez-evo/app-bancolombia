<?php 
	session_start();
    
	require_once '../modelo/estado.php';
	require_once '../modelo/sesion.php';
    require_once '../modelo/repotenciacion.php';
    require_once '../modelo/sub_repotenciacion.php';
    require_once '../modelo/prioridad.php';
    require_once '../modelo/comentario_subRepotenciacion.php';
    require_once '../modelo/asignatario_repotenciacion.php';
    require_once '../modelo/notificacion.php';
    require_once '../modelo/notificacion_receptor.php';
    require_once '../modelo/sesion.php';


	$estado= new estado();
	$sesion= new sesion();
    $repotenciacion= new repotenciacion();
    $sub_repotenciacion = new sub_repotenciacion();
    $prioridad = new prioridad();
    $comentario_subRepotenciacion = new comentario_subRepotenciacion();
    $asignatario_repotenciacion = new asignatario_repotenciacion();
    $sesion = new Sesion();
    $notificacion= new notificacion();
    $notificacionReceptor= new notificacionReceptor();
	switch ($_GET['opcion']) {
        case '1':
        		#cargar select
                function select($lista,$busqueda){
                    $cadena="";
                    foreach($lista as $datos){
                        $cadena.='<option value="'.$datos['id'].'">'.$datos[$busqueda].'</option>';
                    }
                    return $cadena;
                }
                $lista= $sesion->consultar_select();
                $cadena="";
                foreach($lista as $datos){
                    $cadena.='<option value="'.$datos['usuario'].'">'.$datos['nombre_completo'].'</option>';
                }
                echo "<script>";
                    echo "$('#selectAsignatarios').html('".$cadena."');";
                    echo "$('#selectPrioridad').html('".select($prioridad->consultar_activos(),"prioridad")."');";
                echo "</script>";

        	break;
        case '2':#option for save data the repotenciacion
            # code...
                ini_set('date.timezone', 'America/Bogota');
                $time = time();
                $descripcion=str_replace("'","\"",$_POST['inputDescripcion']);
                $descripcion=preg_replace("/[\r\n|\n|\r]+/"," ",$descripcion);
                //$repotenciacion->setId();
                $repotenciacion->setEstado(1);
                $repotenciacion->setId_prioridad($_POST['selectPrioridad']);
                $repotenciacion->setFecha_creacion(date("Y-m-d H:i:s", $time));
                $repotenciacion->setDescripcion($descripcion);
                //$repotenciacion->setAfectado($_POST['inputAfectados']);
                $repotenciacion->setTitulo($_POST['inputTitulo']);
                echo $repotenciacion->registrar();
                   
            break;
        case '3':#function for data show
            # code...
                echo json_encode($repotenciacion->consultar_activos());  

            break;
        case '30':#function for data show
            # code...
                echo json_encode($repotenciacion->consultar_subRepot());  

            break;
        case '4':#function for 
            # code...
                 function print_descrip($documentacion){
                    return str_replace("\n","<br>",$documentacion);
                    
                }
                $repotenciacion->setId2($_SESSION['seleccion']);
                $repotenciacion->consultar();
                $asignatario_repotenciacion->setId_repotenciacion($_SESSION['seleccion']);
                $lista=$asignatario_repotenciacion->consultar();
                echo "<script>";
                
                    echo "$('#identificador').html('".$_SESSION['seleccion']."');";
                    echo "$('#titulo').html('".$repotenciacion->getTitulo()."');";
                    //echo "$('#afectado').html('".$repotenciacion->getAfectado()."');";
                    echo "$('#selectEstado').val('".$repotenciacion->getEstado()."');";
                    #foreach($lista as $datos){
                        echo' $("#selectAsignatarios").val('.$lista.').trigger("change");';
                    #}
                    #echo' $("#selectAsignatarios").val(["epereda","bpereda"]).trigger("change");';
                    echo "$('#selectPrioridad').val('".$repotenciacion->getId_prioridad()."');";
                    echo "$('#descripcion').html('".$repotenciacion->getDescripcion()."');";

                echo "</script>";
            break;
        case '5':#edit switch
                $repotenciacion->setId2($_SESSION['seleccion']);
                echo "<script>";
                switch ($_POST['caso']) {
                    case '3':
                            if($repotenciacion->actualizar("id_prioridad",$_POST['selectPrioridad'])== true){
                                echo 'toastr.success("Prioridad Actualizada");';
                            }
                        break;
                    case '4':
                            if($repotenciacion->actualizar("estado",$_POST['selectEstado'])== true){
                                echo 'toastr.success("Estado Actualizado");';
                            }
                        break;
                    default:
                        # code...
                        break;
                }
                echo "</script>";
            break;

        case '55':#edit switch
                // $sub_repotenciacion->setid_repotenciacion($_SESSION['seleccion']);
                // $sub_repotenciacion->setId($_POST['id_subRepo']);

                print($_SESSION['seleccion']);
                print($_POST['id_subRepo']);
                
                print($_POST['opc']);

                echo "<script>";

                if($sub_repotenciacion->actualizar2($_SESSION['seleccion'],$_POST['id_subRepo'],$_POST['opc'])== true){
                    echo "toastr.success('Estado Actualizado');
                                $('#estadoNr').val(".$_POST['opc'].");";
                }

                
                echo "</script>";
            break;
        
        case '6':#cargar informacion y enrutar 
                $_SESSION['seleccion']=$_GET['id'];
                switch ($_SESSION["id_tipo_usuario"]) {
                    case '1':// perfil
                        header("location: ../view/adm/detalle_repotenciacion.php");  
                        break;
                    case '3':// perfil
                        header("location: ../view/visitante/detalle_repotenciacion.php");    
                        break;
                    case '4':// perfil
                        header("location: ../view/n2/detalle_repotenciacion.php");    
                        break;
                    default:
                        # code...
                        break;
                }
            break;
        case '7':#registrar nueva traza atencion
                ini_set('date.timezone', 'America/Bogota');
                $time = time();
                $sub_repotenciacion->setId();
                $sub_repotenciacion->setEstado(1);
                $sub_repotenciacion->setusuario($_SESSION["usuario"]);
                $sub_repotenciacion->setId_repotenciacion($_SESSION['seleccion']);
                $sub_repotenciacion->setAvances(str_replace("'","\"",$_POST['documentacion']));
                $sub_repotenciacion->setFecha_avance(date("Y-m-d H:i:s", $time));
                echo "<script>";
                if($sub_repotenciacion->registrar()==true){
                    ini_set('date.timezone', 'America/Bogota');
                    $time = time();
                    $asignatario_repotenciacion->setid_repotenciacion($_SESSION['seleccion']);
                    $asignatario_repotenciacion->setEstatus(1);
                    $lista=$asignatario_repotenciacion->consultar2();
                    $notificacion->setId();
                    $notificacion->setUsuarioRemitente($_SESSION["usuario"]);
                    $notificacion->setEstatus(1);
                    $notificacion->setFecha(date("Y-m-d H:i:s", $time));
                    $notificacion->setAsunto("Nuevo Avance en Repotenciación nro:".$_SESSION["seleccion"]);
                    $notificacion->registrar();
                    if($lista!=false){
                        $notificacionReceptor->setId($notificacion->getId());
                        $notificacionReceptor->setEstatus(1);
                        foreach($lista as $datos){//envia a asignatarios asignados
                            $notificacionReceptor->setUsuarioReceptor($datos['usuario']);
                            $notificacionReceptor->registrar();
                        }
                    }
                    $sesion->setId_tipo_usuario(1);
                    $lista=$sesion->listar();
                    if($lista!=false){
                        $notificacionReceptor->setId($notificacion->getId());
                        $notificacionReceptor->setEstatus(1);
                        foreach($lista as $datos){
                            $notificacionReceptor->setUsuarioReceptor($datos['usuario']);
                            $notificacionReceptor->registrar();
                        }
                    }

                        echo 'toastr.success("Nuevo avance Registrado");';
                    echo "cargarData(12);";
                    echo "$('#modal-nuevo').modal('hide');";

                }
                echo "</script>";
            break;
        case '8':#carga timeline

                function print_timeline($fecha,$sub_repotenciacion,$id,$estatus,$n_notificacion,$usuario){
                    $repotenciacion= str_replace("\n","<br>",$sub_repotenciacion);
                    
                    switch ($_SESSION["id_tipo_usuario"]) {
                        
                    case '1':// perfil
                        if($n_notificacion>0){
                            $notificacion="<span class=\"badge badge-green\">".$n_notificacion."</span>";
                        }else{
                            $notificacion="";
                        }

                        $id_repotenc = $_SESSION['seleccion'];

                       return "<div class=\"timeline-item\"><div class=\"timeline-item-marker\"><div class=\"timeline-item-marker-text\">".$fecha."<br>".$usuario."</div><div style=\"display: none\" class=\"timeline-item-marker-indicator bg-secondary-soft text-secondary\"><i class=\"fas fa-check\"></i></div></div><div style=\"
                        border-left-width: 0px;\" 
                        class=\"timeline-item-content pt-0\">
                        <div style=\"background-color: #fbfbfb;\" class=\"card shadow-sm\"><div class=\"row\"><div class=\"col-md-8\"></div><div class=\"col-md-4\">
                        <button id=\"btn-commt".$id."\" class=\"btn btn-outline-default btn-icon\" onclick=\"cargar_comentario(".$id.")\"><i class=\"far fa-comment\"></i>".$notificacion."</button>
                        <button id=\"btn-edit".$id."\" class=\"btn btn-outline-default btn-icon\" onclick=\"edit_avances(".$id.")\"><i class=\"far fa-edit\"></i></button>
                        <button id=\"btn-delete".$id."\" class=\"btn btn-outline-default btn-icon\" onclick=\"delet_avances(".$id.")\"><i class=\"far fa-times-circle\"></i></button>
                       
                        <select onchange=\"estado_avances(".$id_repotenc.",".$id.")\" name=\"estadoNr".$id."\" id=\"estadoNr".$id."\" style=\"border: 1px solid gray;border-radius: 5px;\">
                        <option value=1>Abierto</option><option value=2>En proceso</option>
                        <option value=3>Cerrado</option><option value=4>Transferido</option>
                        <option value=5>Cancelado</option></select></div></div>   

                        <div class=\"card-body\">".$repotenciacion."</div></div></div></div>";
                    
                    case '4':// perfil
                        if($n_notificacion>0){
                            $notificacion="<span class=\"badge badge-green\">".$n_notificacion."</span>";
                        }else{
                            $notificacion="";
                        }

                        $id_repotenc = $_SESSION['seleccion'];

                       return "<div class=\"timeline-item\"><div class=\"timeline-item-marker\"><div class=\"timeline-item-marker-text\">".$fecha."<br>".$usuario."</div><div style=\"display: none\" class=\"timeline-item-marker-indicator bg-secondary-soft text-secondary\"><i class=\"fas fa-check\"></i></div></div><div style=\"
                        border-left-width: 0px;\" 
                        class=\"timeline-item-content pt-0\">
                        <div style=\"background-color: #fbfbfb;\" class=\"card shadow-sm\"><div class=\"row\"><div class=\"col-md-8\"></div><div class=\"col-md-4\">
                        <button id=\"btn-commt".$id."\" class=\"btn btn-outline-default btn-icon\" onclick=\"cargar_comentario(".$id.")\"><i class=\"far fa-comment\"></i>".$notificacion."</button>
                        <button id=\"btn-edit".$id."\" class=\"btn btn-outline-default btn-icon\" onclick=\"edit_avances(".$id.")\"><i class=\"far fa-edit\"></i></button>
                        <button id=\"btn-delete".$id."\" class=\"btn btn-outline-default btn-icon\" onclick=\"delet_avances(".$id.")\"><i class=\"far fa-times-circle\"></i></button>
                       
                        <select onchange=\"estado_avances(".$id_repotenc.",".$id.")\" name=\"estadoNr".$id."\" id=\"estadoNr".$id."\" style=\"border: 1px solid gray;border-radius: 5px;\">
                        <option value=1>Abierto</option><option value=2>En proceso</option>
                        <option value=3>Cerrado</option><option value=4>Transferido</option>
                        <option value=5>Cancelado</option></select></div></div>   

                        <div class=\"card-body\">".$repotenciacion."</div></div></div></div>";
                    
                    case '3':// perfil
                        return "<div class=\"timeline-item\"><div class=\"timeline-item-marker\"><div class=\"timeline-item-marker-text\">".$fecha."</div><div style=\"display: none\" class=\"timeline-item-marker-indicator bg-secondary-soft text-secondary\"><i class=\"fas fa-check\"></i></div></div><div 
                        style=\"border-left-width: 0px;\" 
                        class=\"timeline-item-content pt-0\"><div class=\"card shadow-sm\"><div class=\"card-body\">".$repotenciacion."</div></div></div></div>";    
                        break;
                    default:
                        # code...
                        break;
                }
                    
                }
                $sub_repotenciacion->setId_repotenciacion($_SESSION['seleccion']);
                $lista=$sub_repotenciacion->consultar();
                $cadena="";
                
                foreach($lista as $datos){
                    $cadena.=print_timeline($datos['fecha_avance'],$datos['avances'],$datos['id'],$datos['estatus'],
                    $comentario_subRepotenciacion->cant_comentario($datos['id']),$datos['usuario']);
                    
                    $cadena.= "<script>
                        $('#estadoNr".$datos['id']."').val(".$datos['estatus'].");
                       
                    ";

                    if($datos['estatus']>=3){
                        $cadena.="
                            $('#btn-commt".$datos['id']."').attr('disabled','disabled');
                            $('#btn-edit".$datos['id']."').attr('disabled','disabled');
                            $('#btn-delete".$datos['id']."').attr('disabled','disabled');
                            $('#estadoNr".$datos['id']."').attr('disabled','disabled');
                        ";
                    }
                        
                    $cadena.="</script>";
                                        
                }

                $cadena.="<script>$('#actividad_label').html('Actividades N° ".count($lista)."')</script>";

                if($cadena == ""){

                    $cadena="<br><br><h5 style=\"text-align: center;\">Sin Información</h5>";
                }
                echo $cadena;
            break;
        case '9':#option for close repotenciacion 
                ini_set('date.timezone', 'America/Bogota');
                $time = time();
                $repotenciacion->setId2($_SESSION['seleccion']);
                if($repotenciacion->actualizar("estado",$_POST['estado'])== true){
                    echo $repotenciacion->actualizar("fecha_fin",date("Y-m-d H:i:s", $time));
                    ini_set('date.timezone', 'America/Bogota');
                    $time = time();
                    $asignatario_repotenciacion->setId_repotenciacion($_SESSION['seleccion']);
                    $asignatario_repotenciacion->setEstatus(1);
                    $lista=$asignatario_repotenciacion->consultar2();
                    $notificacion->setId();
                    $notificacion->setUsuarioRemitente($_SESSION["usuario"]);
                    $notificacion->setEstatus(1);
                    $notificacion->setFecha(date("Y-m-d H:i:s", $time));
                    $notificacion->setAsunto("Cerrado Repotenciación nro:".$_SESSION["seleccion"]);
                    $notificacion->registrar();

                    $notificacionReceptor->setId($notificacion->getId());
                    $notificacionReceptor->setEstatus(1);

                    if($lista!=false){
                        
                        foreach($lista as $datos){//envia a asignatarios asignados
                            $notificacionReceptor->setUsuarioReceptor($datos['usuario']);
                            $notificacionReceptor->registrar();
                        }
                    }
                    $sesion->setId_tipo_usuario(1);
                    $lista=$sesion->listar();
                    if($lista!=false){
                        foreach($lista as $datos){
                            $notificacionReceptor->setUsuarioReceptor($datos['usuario']);
                            $notificacionReceptor->registrar();
                        }
                    }
                }
            break;
        case '10':
                $lista=explode("-",$_SESSION['array']);
                switch ($_SESSION["id_tipo_usuario"]) {
                    case '1':// perfil
                        $ruta="location: ../view/adm/detalle_repotenciacion.php";  
                        break;
                    case '3':// perfil
                        $ruta="location: ../view/visitante/detalle_repotenciacion.php";    
                        break;
                    case '4':// perfil
                        $ruta="location: ../view/n2/detalle_repotenciacion.php";    
                        break;
                    default:
                        # code...
                        break;
                }
                for ($i=0; $i<count($lista) ; $i++) { 
                    if($lista[$i]==$_SESSION['seleccion']){
                        $i++;
                        if($lista[$i]!=""){
                            $_SESSION['seleccion']=$lista[$i];
                            header($ruta);
                        }
                        else{
                            header($ruta);
                        }
                    }
                }
            break;
        case '11':
                $lista=explode("-",$_SESSION['array']);
                switch ($_SESSION["id_tipo_usuario"]) {
                    case '1':// perfil
                        $ruta="location: ../view/adm/detalle_repotenciacion.php";  
                        break;
                    case '3':// perfil
                        $ruta="location: ../view/visitante/detalle_repotenciacion.php";    
                        break;
                    case '4':// perfil
                        $ruta="location: ../view/n2/detalle_repotenciacion.php";    
                        break;
                    default:
                        # code...
                        break;
                }
                for ($i=0; $i<count($lista) ; $i++) { 
                    if($lista[$i]==$_SESSION['seleccion']){
                        $i--;
                        if($lista[$i]!=""){
                            $_SESSION['seleccion']=$lista[$i];
                            header($ruta);
                        }
                        else{
                            header($ruta);
                        }
                    }
                }
            break;
        case '12':#function for data show
            # code...
                echo json_encode($repotenciacion->historial($_POST['fecha_inicio'],$_POST['fecha_final']));

            break;
        case '13':#function for show data comment 
            # code...
                function print_timeline($fecha,$sub_repotenciacion){
                    $repotenciacion= str_replace("\n","<br>",$sub_repotenciacion);
                    return "<div class=\"timeline-item\"><div class=\"timeline-item-marker\"><div class=\"timeline-item-marker-text\">".$fecha."</div><div class=\"timeline-item-marker-indicator bg-secondary-soft text-secondary\"><i class=\"fas fa-check\"></i></div></div><div class=\"timeline-item-content pt-0\"><div class=\"card-body\">".$repotenciacion."</div></div></div></div>";
                }
                $comentario_subRepotenciacion->setid_Subrepotenciacion($_POST['id']);
                $lista=$comentario_subRepotenciacion->consultar();
                $cadena="";
                foreach($lista as $datos){
                    $cadena.=print_timeline($datos['fecha_avance'],$datos['avances']);
                }
                if($cadena == ""){
                    $cadena="<br><br><h5 style=\"text-align: center;\">Sin Información</h5>";
                }
                echo "<script>";
                    echo "$('#id_traza').val('".$_POST['id']."');";
                    echo "$('#id_repotenciacion').val('". $_SESSION['seleccion']."');";
                    echo "$('#timeline2').html('".$cadena."');";
                echo "</script>";
            break;
        case '14':
                ini_set('date.timezone', 'America/Bogota');
                $time = time();
                $comentario_subRepotenciacion->setId();
                $comentario_subRepotenciacion->setId_repotenciacion($_POST['id_repotenciacion']);
                $comentario_subRepotenciacion->setid_Subrepotenciacion($_POST['id_traza']);
                $comentario_subRepotenciacion->setAvances(str_replace("'","\"",$_POST['documentacion']));
                $comentario_subRepotenciacion->setFecha_avance(date("Y-m-d H:i:s", $time));
                $comentario_subRepotenciacion->setEstatus(1);
                echo "<script>";
                if($comentario_subRepotenciacion->registrar()==true){
                    echo 'toastr.success("Nuevo Comentario Registrado");';
                    echo "$('#form-comment').hide();";
                    echo "cargar_comentario(".$_POST['id_traza'].");";
                    echo "cargarData(12);";
                }
                echo "</script>";
            break;
        case '15':#function for 
            # code...
                $sub_repotenciacion->setId_repotenciacion($_SESSION['seleccion']);
                $sub_repotenciacion->setId2($_POST['id']);
                $sub_repotenciacion->consultar2();
                
                echo $sub_repotenciacion->getAvances();
            break;
        case '16':
            # code...
                echo "<script>";
                    $sub_repotenciacion->setId2($_POST['id_traza2']);
                    if($sub_repotenciacion->actualizar("avances",str_replace("'","\"",$_POST['documentacion4'])) == true){
                        echo "cargarData(12);";
                        echo 'toastr.success("Avance Actualizado");';
                    }
                echo "</script>";
            break;
        case '17':
            # code...
                echo "<script>";
                    $sub_repotenciacion->setId2($_POST['traza']);
                    if($sub_repotenciacion->actualizar("estado",2) == true){
                        echo "cargarData(12);";
                        echo 'toastr.success("Avance Eliminado");';
                    }
                echo "</script>";
            break;
        case '18':#opcion para agregar asignatarios
            # code...
                function validar($lista,$usuario){
                    reset($lista);
                    if($lista!=false){
                        foreach($lista as $datos){

                            if($usuario==$datos['usuario']){
                              
                                return false;
                            }else{
                                 
                                return true;
                            }
                        }
                    }else{
                        return true;
                    }
                }
                $asignatario_repotenciacion->setId_repotenciacion($_SESSION['seleccion']);
                $asignatario_repotenciacion->setEstatus(1);
                $lista=$asignatario_repotenciacion->consultar2();
                $usuario=$_POST['selectAsignatarios'];
                ini_set('date.timezone', 'America/Bogota');
                $time = time();
                $notificacion->setId();
                $notificacion->setUsuarioRemitente($_SESSION["usuario"]);
                $notificacion->setEstatus(1);
                $notificacion->setFecha(date("Y-m-d H:i:s", $time));
                $notificacion->setAsunto("Asignado Repotenciación nro:".$_SESSION["seleccion"]);
                $notificacion->registrar();
                echo "<script>";
                for ($i=0;$i<count($usuario);$i++){   
                    $asignatario_repotenciacion->setUsuario($usuario[$i]); 
                    if(validar($lista,$usuario[$i])==true){
                        if($asignatario_repotenciacion->registrar()==true){
                            echo 'toastr.success("Asignatario '.$usuario[$i].' Registrado");';                            
                            $notificacionReceptor->setId($notificacion->getId());
                            $notificacionReceptor->setEstatus(1);
                            $notificacionReceptor->setUsuarioReceptor($usuario[$i]);
                            $notificacionReceptor->registrar();
                        }else{
                            echo 'toastr.error("No se pudo registrar Asignatario '.$usuario[$i].'");';
                        }
                    }else{
                        echo 'toastr.error("No se pudo registrar Asignatario '.$usuario[$i].'");';
                    }   
                } 
                echo "</script>";
                    
            break;
        case '19':
            # code...
            echo json_encode($sesion->consultar_select2());  
            break;
        case '20':
            # code...
                $asignatario_repotenciacion->setId_repotenciacion($_SESSION['seleccion']);
                $asignatario_repotenciacion->setUsuario($_POST['usuario']);  
                echo "<script>";
                
                if($asignatario_repotenciacion->eliminar()==true){
                    echo 'toastr.success("Asignatario '.$_POST['usuario'].' Eliminado");';
                }else{
                    echo 'toastr.error("No se pudo eliminar Asignatario '.$_POST['usuario'].'");';
                }
                  
                echo "</script>";
            break;
        case '21':
            $asignatario_repotenciacion->setUsuario($_SESSION['usuario']);  
            echo json_encode($asignatario_repotenciacion->buscar_caso()); 
            break;
        default: print "Opcion no Disponible";
        	break;
    }



?>
