
    <nav class="sb-topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <a class="navbar-brand d-none d-sm-block" href="index.php"><img src="../../assets/img/Evolution.png"/></a>
        <form class="form-inline mr-auto d-none d-lg-block"></form>
        <ul class="navbar-nav align-items-center">
            <img class="navbar-brand sb-dropdown-notifications" src="../../assets/img/Logo_Bancolombia.svg"/>
            
            <li class="nav-item dropdown no-caret mr-3 sb-dropdown-user">
                <a class="btn sb-btn-icon sb-btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button class="btn btn-red btn-icon" type="button">
                    <?php
                        $LetraNombre = str_split($_SESSION["nombre"], 1);
                        $LetraApellido = str_split($_SESSION["apellido"], 1);
                        //$LetrasApellido=explode(' ',$_SESSION["apellido"]);
                        echo $LetraNombre[0].$LetraApellido[0] ;
                    ?>
                    </button></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">

                    <button class="btn btn-red btn-icon sb-dropdown-user-img" type="button"><?php echo $LetraNombre[0].$LetraApellido[0];?></button>
                        <div class="sb-dropdown-user-details">
                            <div class="sb-dropdown-user-details-name"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"]; ?></div>
                            <div class="sb-dropdown-user-details-email"><?php echo $_SESSION["usuario"]; ?></div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../../controlador/controlador_sesion.php?opcion=3"
                        ><div class="sb-dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Cerrar Sesión</a
                    >
                </div>
            </li>
        </ul>
    </nav>

    
<?php  $_SESSION['cantNotificacion']=0; ?>