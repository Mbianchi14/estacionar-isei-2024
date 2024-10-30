<?php

$tituloMenu = '';

$rolSession='';

$datos = '';
$franja = '';
$tarifa = '';
$promociones= '';
$cochera = '';
$gestionUser = '';
$perfil = '';


$classDatos = '';
$classFranja = '';
$classTarifa = '';
$classPromociones= '';
$classCochera = '';
$classGestionUser = '';
$classPerfil = '';
if (isset($_SESSION)) {
    $datos=$_SESSION['datos'];
    $franja=$_SESSION['franja'];
    $tarifa=$_SESSION['tarifa'];
    $promociones=$_SESSION['promociones'];
    $cochera=$_SESSION['cochera'];
    $gestionUser=$_SESSION['gestionUser'];
    $perfil=$_SESSION['perfil'];
}else{
    $datos=1;
    $franja=1;
    $tarifa=1;
    $promociones=1;
    $cochera=1;
    $gestionUser=1;
    $perfil=1;
}

    if (isset($_SESSION)) {
    $rolSession=$_SESSION['rol'];
    }else{
    $rolSession=6;   
    }

    if($rol===1){
        //1=root          
    }
    if($rol===2){
        //2=superAdmin
        $tituloMenu = 'SuperAdmin'; 
    }
    if($rol===3){
        //3=Admin
        $tituloMenu = 'Administrador'/*.$_SESSION['nombre']*/;
    }
    if($rol===4){
        //5=operador
        $tituloMenu = 'Operador: '/*.$_SESSION['nombre']*/;
    }
    if($rol===5){
       //4=usuario 
        $tituloMenu = 'Usuario: '/*.$_SESSION['nombre']*/;
    }
    if($rol===6){
        //6=guest
        $tituloMenu = 'Invitado';
    }

    
if ($datos===1) {
    $disable=true;
    $classDatos = $disable ? 'disable' : '';
} else {
    $classDatos =  '';
}
if ($franja===1) {
    $disable=true;
    $classFranja = $disable ? 'disable' : '';
} else {
    $classFranja =  '';
}
if ($tarifa===1) {
    $disable=true;
    $classTarifa = $disable ? 'disable' : '';
}else {
    $classTarifa =  '';
}
if ($promociones===1) {
    $disable=true;
    $classPromociones = $disable ? 'disable' : '';
}else {
    $classPromociones =  '';
}
if ($cochera===1) {
    $disable=true;
    $classCochera = $disable ? 'disable' : '';
}else {
    $classCochera =  '';
}
if ($gestionUser===1) {
    $disable=true;
    $classGestionUser = $disable ? 'disable' : '';
}else {
    $classGestionUser =  '';
}
if ($perfil===1) {
    $disable=false;
    $classPerfil = $disable ? 'disable' : '';
}else {
    $classPerfil =  '';
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCRUM 28</title>

    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./Librerias/bootstrap/css/bootstrap.css">

</head>
<body>
    <header>
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center bold color-900" href="#">
                    <img src="/Public/CSS/image/logo-estacionar-rem-bg.png" alt="Logo" width="80" class="d-inline-block align-text-top">
                    Estacionar
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Estacionar</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <h4 class="bold"><?php echo $tituloMenu; ?></h4>
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo $classDatos; ?>" href="#" role="button" 
                            data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/Public/CSS/image/user.png" style="width: 50px;">
                                Mis datos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">Vehiculos</a></li>
                                <li><a class="dropdown-item" href="#">Locaciones</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo $classFranja; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/Public/CSS/image/user.png" style="width: 50px;">
                                Horarios
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Franja 1</a></li>
                                <li><a class="dropdown-item" href="#">Franja 2</a></li>
                                <li><a class="dropdown-item" href="#">Franja 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo $classTarifa; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/Public/CSS/image/user.png" style="width: 50px;">
                                Tarifas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Tarifa 1</a></li>
                                <li><a class="dropdown-item" href="#">Tarifa 2</a></li>
                                <li><a class="dropdown-item" href="#">Tarifa 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo $classPromociones; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/Public/CSS/image/user.png" style="width: 50px;">
                                Promociones
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Promociones 1</a></li>
                                <li><a class="dropdown-item" href="#">Promociones 2</a></li>
                                <li><a class="dropdown-item" href="#">Promociones 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo $classGestionUser; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/Public/CSS/image/user.png" style="width: 50px;">
                                Gestionar usuarios
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Usuario 1</a></li>
                                <li><a class="dropdown-item" href="#">Usuario 2</a></li>
                                <li><a class="dropdown-item" href="#">Usuario 3</a></li>
                                <li><a class="dropdown-item" href="#">Añadir usuario</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo $classCochera; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/Public/CSS/image/user.png" style="width: 50px;">
                                Gestionar disponibilidad
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Disponibilidad 1</a></li>
                                <li><a class="dropdown-item" href="#">Disponibilidad 2</a></li>
                                <li><a class="dropdown-item" href="#">Disponibilidad 3</a></li>
                            </ul>
                        </li>
                        <li class="dotted-line"></li>
                        <li class="nav-item"><a class="nav-link" href='#'>
                            <a><img src="/Public/CSS/image/user.png" style="width: 50px;">Estacionar Ahora!</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/Public/CSS/image/user.png" style="width: 50px;">
                                Estacionamiento mensual
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Opcion 1</a></li>
                                <li><a class="dropdown-item" href="#">Opcion 2</a></li>
                                <li><a class="dropdown-item" href="#">Opcion 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo $classPerfil; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/Public/CSS/image/user.png" style="width: 50px;">
                                Mi perfil
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Editar</a></li>
                                <li><a class="dropdown-item" href="#">Ver</a></li>
                                <li><a class="dropdown-item" href="#">Dar de baja</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/Public/CSS/image/user.png" style="width: 50px;">
                                Acerca de
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Funcionamiento App</a></li>
                                <li><a class="dropdown-item" href="#">Nosotros</a></li>
                                <li><a class="dropdown-item" href="#">Iniciativa</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href='#'>
                            <a href="#" class="text-decoration-none d-flex justify-content-center">Cerrar sesion</a>
                        </li>
                    </ul>
                </div>
                </div>
                </div>
            </nav>
    </header>


    <script src="./Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>