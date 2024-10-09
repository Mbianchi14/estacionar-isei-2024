<?php
include_once "head.php";
?>
<!--<link rel="stylesheet" href="/Private/CSS/css/bootstrap.css"> -->
<link href="./assets/css/bootstrap.css" rel="stylesheet">
<title>Modal Franjas</title>

<body bg-primary>

    <div class="modal modal-sheet position-static d-flex flex-column bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSheet">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0 d-flex flex-column">
                    <Div class="w-100">
                        <img class="float-start" src="./Private/img/moneda.png" height="30px" alt="moneda">
                    </Div>
                    <Div class="">
                        <Div class="w-100">
                            <h1 class="h3">Configurar una nueva tarifa</h1>
                        </Div>
                        <Div class="w-100">
                            <h3 class="h6">Completa los datos de la tarifa.</h3>
                        </Div>
                    </Div>
                    <div class="row row-cols-2 pb-25">
                        <Div class="d-flex flex-column"><label for="formGroupExampleInput" class="form-label" for="franja">Franja</label>
                            <select class="inputs" name="Franja" id="franja" placeholder="Seleccionar..">
                                <option value="Seleccionar">Seleccionar..</option>
                                <option value="franja-1">Semana-Tarde</option>
                                <option value="franja-2">Semana-Noche</option>
                                <option value="franja-3">Finde-Tarde</option>
                                <option value="franja-4">Finde-Noche</option>
                            </select>
                        </Div>
                        <div class="d-flex flex-column">
                            <label for="formGroupExampleInput" class="form-label" for="fecha">Fecha</label>
                            <input class="inputs" type="date" id="fecha">
                        </div>
                        <div class="d-flex flex-column">
                            <label class="label" class="form-label" for="tipo-vehiculo">Tipo Vehiculo</label>
                            <select class="inputs" name="Tipo Vehiculo" id="tipo-vehiculo" placeholder="Seleccionar..">
                                <option value="Seleccionar">Seleccionar..</option>
                                <option value="Camion">Camion</option>
                                <option value="Auto">Auto</option>
                                <option value="Camioneta">Camioneta</option>
                                <option value="Moto">Moto</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="label" class="form-label" for="monto">Monto</label>
                            <input class="inputs" type="number" placeholder="$500" id="monto">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-outline-secondary btn-sm">Cancelar</button>
                        <button class="btn btn-primary btn-sm" type="submit">Guardar</button>

                    </div>
                </Div>
            </div>
        </div>
    </div>
</body>

</html>