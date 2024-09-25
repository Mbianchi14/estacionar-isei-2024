<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="./CSS/nav.css">
<link rel="stylesheet" href="./assets/css/bootstrap.css">
<link rel="stylesheet" href="./assets/css/main.css">

<script src="./assets/js/bootstrap.bundle.min.js"></script>
<?php
for ($i = 0; $i < 10; $i++) { # code... 
    $franjas[$i]['estado'] = rand(0, 1);
    $franjas[$i]['L'] = rand(0, 1);
    $franjas[$i]['M'] = rand(0, 1);
    $franjas[$i]['X'] = rand(0, 1);
    $franjas[$i]['J'] = rand(0, 1);
    $franjas[$i]['V'] = rand(0, 1);
    $franjas[$i]['S'] = rand(0, 1);
    $franjas[$i]['D'] = rand(0, 1);
    $franjas[$i]['F'] = rand(0, 1);
}
?>
<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center bold text-azul-900" href="#">
            <img src="assets/img/logo-estacionar-rem-bg.png" alt="Logo" width="80" class="d-inline-block align-text-top">
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
            <h4 class="bold">Gestionar cochera</h4>
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/img/user.png" style="width: 50px;">
                        Mis datos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Vehiculos</a></li>
                        <li><a class="dropdown-item" href="#">Locaciones</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/img/user.png" style="width: 50px;">
                        Horarios
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Franja 1</a></li>
                        <li><a class="dropdown-item" href="#">Franja 2</a></li>
                        <li><a class="dropdown-item" href="#">Franja 3</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/img/user.png" style="width: 50px;">
                        Tarifas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Tarifa 1</a></li>
                        <li><a class="dropdown-item" href="#">Tarifa 2</a></li>
                        <li><a class="dropdown-item" href="#">Tarifa 3</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/img/user.png" style="width: 50px;">
                        Promociones
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Promociones 1</a></li>
                        <li><a class="dropdown-item" href="#">Promociones 2</a></li>
                        <li><a class="dropdown-item" href="#">Promociones 3</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/img/user.png" style="width: 50px;">
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
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/img/user.png" style="width: 50px;">
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
                        <a><img src="./assets/img/user.png" style="width: 50px;">Estacionar Ahora!</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/img/user.png" style="width: 50px;">
                        Estacionamiento mensual
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Opcion 1</a></li>
                        <li><a class="dropdown-item" href="#">Opcion 2</a></li>
                        <li><a class="dropdown-item" href="#">Opcion 3</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/img/user.png" style="width: 50px;">
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
                        <img src="./assets/img/user.png" style="width: 50px;">
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
</nav>
<div class="d-flex justify-content-center pt-5 bg-body-tertiary sticky-top">
    <div class="navbar col-11 d-flex">
        <div class="d-flex justify-content-center col-12 py-5">
            <div class="col-12 d-flex justify-content-between align-items-center text-secondary">
                <div style="font-size:30px;font-weight:600;">CONFIGURACION DE HORARIOS</div>
                <button class="btn py-2 px-4 bg-azul-500 text-white" style="font-size:30px; font-weight: 600;">
                    + Add
                </button>
            </div>
        </div>
    </div>
</div>


<div class="bg-body-tertiary col-12">
    <?php


    foreach ($franjas as $i => $franja) {
        # code...
    ?>

        <div class="bg-body-tertiary col-12">
            <div class="d-flex justify-content-center  mt-5">
                <div class="bg-azul-200 p-5 radio-lg col-11">
                    <div class="col-12 d-flex justify-content-left ">
                        <div class="col-7">
                            <span style="font-size:20px;">Día de Semana</span>
                            <p style="font-size:30px;" class="my-1">De 10hs a 22hs</p>
                            <p style="font-size:30px;" class="my-1">Del 15/04/24 al 16/08/24</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center col-5">
                            <div class="col-8 radio-small d-flex justify-content-center p-1 <?= $franja['estado'] == 1 ? 'alert-success' : 'alert-danger'; ?>" style="font-size:30px;font-weight: bold;"><?= $franja['estado'] == 1 ? 'Activa' : 'Inactiva'; ?></div>
                            <img class="col-4 d-flex justify-content-center" src="./assets/img/flechitaGris.png" alt=">">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between pt-4">
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['L'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">L</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['M'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">M</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['X'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">X</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['J'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">J</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['V'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">V</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['S'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">S</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['D'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">D</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['F'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">F</div>
                    </div>
                </div>
            </div>
        <?php
    }

        ?>
        </div>