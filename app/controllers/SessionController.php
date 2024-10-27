<?php

namespace app\controllers;

use \Controller;


class SessionController extends Controller
{

    private static function setSession()
    {
        #SC-01 Al primer ingreso de un usuario al sistema asigna un estado de FALSE a la variable de control STATUS
        if (!isset($_SESSION['SESSION']['STATUS'])) {
            $_SESSION['SESSION']['STATUS'] = false;
        }
    }

    public static function sessionVerificacion()
    {
        self::setSession();

        #SC-02 Devuelve el estado de session (Logueado o No) del usuario como un string "OnLine" o "OffLine"
        if ($_SESSION['SESSION']['STATUS']) {
            $status = 'Online';
        } else {
            $status = 'OffLine';
        }

        return $status;
    }

    public static function setSessionData($userEmailOrID)
    {

        $usuario = UserController::getUserByEmailOrID($userEmailOrID);


        if (isset($usuario->nombreUsuario) && isset($usuario->apellidoUsuario) && isset($usuario->isAdmin) && isset($usuario->idUsuario)) {
            $_SESSION['SESSION']['STATUS'] = true;
            $_SESSION['USER']['nombre']         = $usuario->nombreUsuario;
            $_SESSION['USER']['apellido']   = $usuario->apellidoUsuario;
            $_SESSION['USER']['email']   = $usuario->emailUsuario;
            $_SESSION['USER']['password']   = $usuario->password;

            if ($usuario->isAdmin == 0) {
                $_SESSION['USER']['type']   = 'cliente';
            } else {
                $_SESSION['USER']['type']   = 'administrador';
            }


            $_SESSION['USER']['id_usuario'] = $usuario->idUsuario;
            $result = true;
        } else {
            $result = false;
        }



        return $result;
    }

    public static function onlyAdmins()
    {
        static::patch();
        $continuar = false;
        $ruta = self::$patch . '404';
        if ($_SESSION['SESSION']['STATUS'] && $_SESSION['USER']['type'] ===  'administrador') {
            $continuar = true;
        }
        /*Verificación de cuenta de usuario-----------FIN*/

        return $continuar;
    }

    public static function onlyUser()
    {
        static::patch();

        /*Verificación de cuenta de usuario--------------*/
        $continuar = false;
        $ruta = self::$patch . 'home';
        if (self::$sessionStatus === 'OffLine') {
            header("Location: $ruta");
        }
        if ($_SESSION['SESSION']['STATUS']) {
            $continuar = true;
        }
        return $continuar;
        /*Verificación de cuenta de usuario-----------FIN*/
    }
}
