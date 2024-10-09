<?php
include_once "head.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Franjas</title>
</head>

<body bg-primary>

    <div class="modal modal-sheet position-static d-flex flex-column bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSheet">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0 d-flex flex-column">
                    <Div class="w-100">
                        <img class="float-start" src="./assets/img/moneda.png" height="30px" alt="moneda">
                    </Div>
                    <Div class="w-100">
                        <h3 class="fs-5" style="text-align: start;">Configurar una nueva franja horaria</h3>
                    </Div>
                    <Div class="w-100">
                        <h5 class="fs-6 text-secondary">Completa los datos requeridos</h5>
                    </Div>
                    <div class="row row-cols-2 d-flex">
                        <div class="col-9">
                            <label for="formGroupExampleInput" class="form-label" for="franja">Nombre</label>
                            <div class="">
                                <input class="form-control form-control-sm col-12" type="number" placeholder="Día - Semana" id="monto">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col">
                                <label for="formGroupExampleInput" class="form-label" for="fecha">Estado</label>
                            </div>
                            <div class="btn-group-toggle" data-toggle="buttons">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-6 mt-4">
                            <label for="formGroupExampleInput" class="form-label" for="franja">Hora Desde</label>
                            <div class="">
                                <input class="form-control form-control-sm col-12" type="time" placeholder="Día - Semana" id="monto">
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="formGroupExampleInput" class="form-label" for="franja">Hora Hasta</label>
                            <div class="">
                                <input class="form-control form-control-sm col-12" type="time" placeholder="Día - Semana" id="monto">
                            </div>
                        </div>

                        <div class="col-6 mt-4">
                            <label for="formGroupExampleInput" class="form-label" for="franja">Fecha Desde</label>
                            <div class="">
                                <input class="form-control form-control-sm col-12" type="date" placeholder="Día - Semana" id="monto">
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="formGroupExampleInput" class="form-label" for="franja">Fecha Hasta</label>
                            <div class="">
                                <input class="form-control form-control-sm col-12" type="date" placeholder="Día - Semana" id="monto">
                            </div>
                        </div>
                    </div>

                    <div class="card text-center col-12 my-4 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Días</h5>
                            <div class="d-flex justify-content-between">
                                <div class="col">
                                    <p class="fs-5 col-12 d-flex justify-content-center">LUN</p>
                                    <div class="form-check col-12 d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="fs-5 col-12 d-flex justify-content-center">MAR</p>
                                    <div class="form-check col-12 d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="fs-5 col-12 d-flex justify-content-center">MIE</p>
                                    <div class="form-check col-12 d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="fs-5 col-12 d-flex justify-content-center">JUE</p>
                                    <div class="form-check col-12 d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="fs-5 col-12 d-flex justify-content-center">VIE</p>
                                    <div class="form-check col-12 d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="fs-5 col-12 d-flex justify-content-center">SAB</p>
                                    <div class="form-check col-12 d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="fs-5 col-12 d-flex justify-content-center">DOM</p>
                                    <div class="form-check col-12 d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-around col-12">
                        <button class="btn btn-outline-secondary">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </Div>
            </div>
        </div>
    </div>
</body>

</html>