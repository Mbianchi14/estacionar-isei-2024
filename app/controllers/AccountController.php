<?php

namespace app\controllers;

use \Controller;
use \Response;


class AccountController extends Controller
{
    // Constructor
    public function __construct()
    {
        self::$sessionStatus = SessionController::sessionVerificacion();
    }

    public function actionIndex($id = null)
    {
        echo "Account Index";
    }

    public function actionRegistro($id = null) {}

    public function actionLogin()
    {

        if (self::$sessionStatus === "Online") {
            static::patch();
            $ruta = self::$patch . 'home';
            header("Location: $ruta");
        }

        $operacion['status'] = true;
        $operacion['msg']['email'] = '';
        $operacion['msg']['password'] = '';

        $operacion['campos'] = array();



        if (isset($_POST['enviar'])) {

            foreach ($_POST as $campo => $value) {
                $operacion['campos'][$campo] = $value;
            }


            #validar EMAIL
            // Campo vacio
            if (empty(trim($_POST['email']))) {
                $operacion['status'] = false;
                $operacion['msg']['email'] = 'Ingrese un E-mail';
            } else {

                // validad que sea un email válido
                /* Validación de email utilizando "expresiones regulares" */
                $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

                $email = $_POST['email'];
                /*IF ternario, devuele true si el email esta bien o false si esta mal (formato)*/
                $email = (preg_match($regex, $email)) ? true : false;

                if ($email === false) {
                    $operacion['status'] = false;
                    $operacion['msg']['email'] = 'Por favor ingrese un email valido';
                }
            }

            #validar contraseña
            //campo vacio
            if (empty(trim($_POST['password']))) {
                $operacion['status'] = false;
                $operacion['msg']['password'] = 'Ingrese una contraseña';
            }

            // si existe usuario
            if ($operacion['status'] === true) {

                $datosUsuario = UserController::getUserByEmailOrID($_POST['email']);

                if ($datosUsuario === false) {
                    $operacion['status'] = false;
                    $operacion['msg']['password'] = 'Usuario o contraseña incorrectas!';
                } else {

                    if ($_POST['password'] != $datosUsuario->passwordUsuario) {
                        $operacion['status'] = false;
                        $operacion['msg']['password'] = 'Usuario o contraseña incorrectas!';
                    }
                }
            }

            #validar estado
            if ($operacion['status'] === true) {
                $estado = UserController::checkEstado($_POST['email']);
                if ($estado === '0') {
                    $operacion['status'] = false;
                    $operacion['msg']['password'] = 'Usuario o contraseña incorrectas!';
                }
            }

            /*genero los mensajes*/
            foreach ($operacion['msg'] as $campo => $mensaje) {
                if (!empty($mensaje)) {
                    $operacion['msg'][$campo] = SiteController::msgError($mensaje);
                }
            }


            if ($operacion['status'] === true) {
                $logue = SessionController::setSessionData($_POST['email']);

                if ($logue === true) {
                    // redirecciono
                    // echo 'ya estas logueado';
                    static::patch();
                    $ruta = self::$patch . 'home';
                    header("Location: $ruta");
                } else {
                    $operacion['msg']['password'] = 'Error inesperado!';
                }
            }
        }


        Response::render($this->viewDir(__NAMESPACE__), 'login', [
            "head" => SiteController::head(),
            "header" => SiteController::header(),
            "patch" => self::$patch,
            "footer" =>  SiteController::footer(),
            "mensaje" => $operacion['msg'],
            "campo" => $operacion['campos'],
        ]);
    }

    public static function actionLogout()
    {
        session_destroy();
        $_SESSION['SESSION']['STATUS'] = false;
        header('Location: ../home');
    }


    public function actionTest()
    {
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
    }

    public function actionClean()
    {
        $_SESSION =  array('');
        session_destroy();
    }
}
