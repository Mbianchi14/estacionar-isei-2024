<?= $head ?>
<?= $header ?>
<?php
for ($i = 0; $i < 10; $i++) { # code... 
    $franjas[$i]['hora_inicio'] = "09:00:00";
    $franjas[$i]['hora_fin'] = "22:00:00";
    $franjas[$i]['fecha_inicio'] = "2024-01-01";
    $franjas[$i]['fecha_fin'] = "2024-12-31";
    $franjas[$i]['nombre'] = "a";
    $franjas[$i]['estado'] = rand(0, 1);
    $franjas[$i]['lun'] = rand(0, 1);
    $franjas[$i]['mar'] = rand(0, 1);
    $franjas[$i]['mir'] = rand(0, 1);
    $franjas[$i]['jue'] = rand(0, 1);
    $franjas[$i]['vie'] = rand(0, 1);
    $franjas[$i]['sab'] = rand(0, 1);
    $franjas[$i]['dom'] = rand(0, 1);
    $franjas[$i]['fer'] = rand(0, 1);
}
/* $consulta = "SELECT * FROM franja_horario";
$resultado = $pdo->query($consulta); */
/* echo "<pre>";
var_dump($resultado);
echo "</pre>"; */
/* while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $franjas[] = $fila;
} */
?>

<div class="d-flex justify-content-center pt-5 bg-body-tertiary sticky-top">
    <div class="navbar col-11 d-flex">
        <div class="d-flex justify-content-center col-12 py-5">
            <div class="col-12 d-flex justify-content-between align-items-center text-secondary">
                <div style="font-size:30px;font-weight:600;">CONFIGURACION DE HORARIOS</div>
                <button class="btn py-2 px-4 bg-azul-500 text-white btn-primary" style="font-size:30px; font-weight: 600;">
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
                            <span style="font-size:20px;"><?= $franja['nombre'] . " " . $i  ?></span>
                            <p style="font-size:30px;" class="my-1">De <?= date("H:i", strtotime($franja['hora_inicio'])) ?>hs a <?= date("H:i", strtotime($franja['hora_fin'])) ?>hs</p>
                            <p style="font-size:30px;" class="my-1">Del <?= date("d/m/Y", strtotime($franja['fecha_inicio'])) ?> al <?= date("d/m/Y", strtotime($franja['fecha_fin'])) ?></p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center col-5">
                            <div class="col-8 radio-small d-flex justify-content-center p-1 <?= $franja['estado'] == 1 ? 'alert-success' : 'alert-danger'; ?>" style="font-size:30px;font-weight: bold;"><?= $franja['estado'] == 1 ? 'Activa' : 'Inactiva'; ?></div>
                            <img class="col-4 d-flex justify-content-center" src="/estacionar-isei-2024/public/img/flechitaGris.png" alt=">">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between pt-4">
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['lun'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">L</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['mar'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">M</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['mir'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">X</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['jue'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">J</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['vie'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">V</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['sab'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">S</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['dom'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">D</div>
                        <div class="d-flex justify-content-center align-items-center radio-small p-1 font-weight-bold <?= $franja['fer'] == 1 ? 'text-white bg-azul-900' : 'text-azul-900 bg-white'; ?>" style="font-size:30px;width:2em;height:2em;">F</div>
                    </div>
                </div>
            </div>
        <?php
    }

        ?>
        </div>