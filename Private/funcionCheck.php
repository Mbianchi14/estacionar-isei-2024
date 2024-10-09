<?php

function validarChecks ($campo, $nombreCampo, $array) {
    $error = '';
    $msg = '';
    $campo2 = '';
    if (!isset($_POST[$campo])) {
        $msg = "El campo ".$nombreCampo." no existe";
        $error = true;
    } else {
        $campo2 = trim($_POST[$campo]);
        $campoValido = false;
        foreach ($array as $valid) {
            if ($campo2 === $valid) {
                $campoValido = true;
                break;
            }
        }
        if (!$campoValido) {
            $msg= "Debe seleccionar campo ".$nombreCampo." válido";
            $error = true;
        }
    }
    $resultado['msg'] =$msg;
    $resultado['error'] =$error;
    $resultado['campo2'] =$campo2;

    return $resultado;
}