<?php

public static function validarCampoEmail($campo, $min, $max, $campoName, $checkDuplicacion = false){
         /*
            $campo      :: string - referencia de nombre de campo en attr name del input
            $min        :: int - cantidad minima de caracteres de campo (determinado por la DB)
            $max        :: int - cantidad máxima de caracteres de campo (determinado por la DB)
            $campoName  :: string - Referencia de personalización de mensajes de campo
            $checkDuplicacion :: en false no comprueba duplicación.
        */

        $msg = '';//Variable de mensaje de error (si existe)
        $estado = false; //Variable bool de estado de la validación (false:no hay error, True: hay error)
        $campo2 = ''; //Valor saneado de campo

        $validar = self::validacionCampo($campo, $min, $max, $campoName);

        $msg    = $validar['msg'];
        $estado = $validar['state'];
        $campo2 = $validar['valor'];

        if ($estado == false) {
            //Validar formato válido de email
            if (!filter_var($campo2, FILTER_VALIDATE_EMAIL)) {
                $msg = 'Formato de '. $campoName.' no válido';
                $estado = true;
            }else{
                //compruebo si existe el campo en la base de datos
                $sql = "SELECT mail FROM usuarios WHERE mail ='$campo2'";
                $resultadoConsulta = DataBase::getRecord($sql);
                //si $resultadoConsulta == FALSE, no hay registros

                if ($checkDuplicacion == true) {
                    if ($resultadoConsulta != false) {
                        //Login
                        $msg = 'El '.$campoName.' no se encuentra registrado';
                        $estado = true;
                    }
                }elseif ($checkDuplicacion == false) {
                    if ($resultadoConsulta !== false) {
                        //Registro
                        $msg = 'El '.$campoName.' '. $campo2.' ya se encuentra en uso';
                        $estado = true;
                    }
                }
            }
        }

        $resultado['msg'] = $msg;
        $resultado['state'] = $estado;
        $resultado['valor'] = $campo2;

        return $resultado;
     } 
