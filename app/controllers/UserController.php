<?php

namespace app\controllers;

use \Controller;
use \Response;
use \DataBase;
use app\controllers\AccountController;
use app\models\UserModel;

class userController extends Controller
{
    public $email;
    public $password;
    public $nombre;
    public $apellido;
    public $estado;

    public function actionAgregar()
    {

        if (self::$sessionStatus === "OffLine") {
            static::patch();
            $ruta = self::$patch . 'home';
            header("Location: $ruta");
        }

        $operacion['status'] = true;
        $operacion['msg']['email'] = array();
        $operacion['msg']['password'] = array();
        $operacion['msg']['nombre'] = array();
        $operacion['msg']['apellido'] = array();


        if (isset($_POST['enviar'])) {

            foreach ($_POST as $campo => $value) {
                $operacion['campos'][$campo] = $value;
            }

            $userData['email'] = $_POST['email'];
            $userData['password'] = $_POST['password'];
            $userData['nombre'] = $_POST['nombre'];
            $userData['apellido'] = $_POST['apellido'];

            $operacion = self::agregar($userData);
        }

        Response::render($this->viewDir(__NAMESPACE__), 'agregar', [
            "head" => SiteController::head(),
            "header" => SiteController::header(),
            "patch" => self::$patch,
            "footer" =>  SiteController::footer(),
            "mensaje" => $operacion['msg'],
        ]);
    }

    public function agregar($userData)
    {
        $email         = $userData['email'];
        $password     = $userData['password'];
        $nombre     = $userData['nombre'];
        $apellido     = $userData['apellido'];

        /*Validaciones*/
        $operacion['status'] = true;
        $operacion['msg'] = array();


        $checkeo = self::checkEmail($email);
        if ($operacion['status']) {
            $operacion['status'] = $checkeo['status'];
        }
        $operacion['msg']['email'] = $checkeo['msg'];

        $checkeo = self::checkPassword($password);
        if ($operacion['status']) {
            $operacion['status'] = $checkeo['status'];
        }
        $operacion['msg']['password'] = $checkeo['msg'];

        $checkeo = self::checkNombre($nombre);
        if ($operacion['status']) {
            $operacion['status'] = $checkeo['status'];
        }
        $operacion['msg']['nombre'] = $checkeo['msg'];

        $checkeo = self::checkApellido($apellido);
        if ($operacion['status']) {
            $operacion['status'] = $checkeo['status'];
        }
        $operacion['msg']['apellido'] = $checkeo['msg'];

        //self::dump_var($operacion['status']);
        if ($operacion['status'] === true) {
            // $USER_MODEL = new UserModel();
            UserModel::agregar($userData);

            $operacion['msg'] = 'Se agregó con éxito';
        }

        return $operacion;
    }

    public function actionEliminar()
    {

        if (self::$sessionStatus === "OffLine") {
            static::patch();
            $ruta = self::$patch . 'home';
            header("Location: $ruta");
        }

        $operacion['status'] = true;
        $operacion['msg']['email'] = array();
        $operacion['msg']['password'] = array();

        if (isset($_POST['enviar'])) {

            foreach ($_POST as $campo => $value) {
                $operacion['campos'][$campo] = $value;
            }

            $userData['email'] = $_POST['email'];
            $userData['password'] = $_POST['password'];

            $operacion = self::eliminar($userData);
        }

        $usuario = SessionController::onlyUser();
        if ($usuario === true) {
            Response::render($this->viewDir(__NAMESPACE__), 'eliminar', [
                "head" => SiteController::head(),
                "header" => SiteController::header(),
                "patch" => self::$patch,
                "footer" =>  SiteController::footer(),
                "mensaje" => $operacion['msg'],
            ]);
        } else {
            $tituloPagina = 'Offside!';
            Response::render($this->viewDir(__NAMESPACE__), "offside", [
                "titulo" => $tituloPagina,
                "head" => SiteController::head(),
                "patch" => self::$patch
            ]);
        }

        // Response::render($this->viewDir(__NAMESPACE__),'eliminar', [
        // 														"head" => SiteController::head(),
        // 														"header" => SiteController::header(),
        // 														"patch" => self::$patch,
        // 														"footer" =>  SiteController::footer(),
        // 														"mensaje" => $operacion['msg'],
        // 													   ]);
    }

    public function eliminar($userData)
    {
        $operacion['status'] = true;
        $operacion['msg'] = '';
        $email         = $userData['email'];
        $password     = $userData['password'];

        if ($operacion['status'] === true) {
            $datosUsuario = self::getUserByEmailOrID($_POST['email']);
            if ($_POST['password'] != $datosUsuario->password) {
                $operacion['status'] = false;
                $operacion['msg'] = 'Para eliminar el usuario ingrese el email y la contraseña correctamente';
            } else {
                UserModel::eliminar($userData);
                AccountController::actionLogout();
            }
        }

        return $operacion;
    }

    public function actionModificar()
    {

        if (self::$sessionStatus === "OffLine") {
            static::patch();
            $ruta = self::$patch . 'home';
            header("Location: $ruta");
        }

        $operacion['status'] = true;

        if (isset($_POST['enviar'])) {

            foreach ($_POST as $campo => $value) {
                $operacion['campos'][$campo] = $value;
            }

            $userData['email'] = $_SESSION['USER']['email'];
            if (!empty(trim($_POST['nuevoEmail'])) && $_POST['nuevoEmail'] != $_SESSION['USER']['email']) {
                $checkeo = self::checkEmail($_POST['nuevoEmail']);
                $operacion['status'] = $checkeo['status'];
                $operacion['msg']['nuevoEmail'] = $checkeo['msg'];
                if ($operacion['status'] === true) {
                    $userData['nuevoEmail'] = $_POST['nuevoEmail'];
                }
            }
            if (!empty(trim($_POST['password'])) && $_POST['password'] != $_SESSION['USER']['password']) {
                $checkeo = self::checkPassword($_POST['password']);
                $operacion['status'] = $checkeo['status'];
                $operacion['msg']['password'] = $checkeo['msg'];
                if ($operacion['status'] === true) {
                    $userData['password'] = $_POST['password'];
                }
            }
            if (!empty(trim($_POST['nombre'])) && $_POST['nombre'] != $_SESSION['USER']['nombre']) {
                $checkeo = self::checkNombre($_POST['nombre']);
                $operacion['status'] = $checkeo['status'];
                $operacion['msg']['nombre'] = $checkeo['msg'];
                if ($operacion['status'] === true) {
                    $userData['nombre'] = $_POST['nombre'];
                }
            }
            if (!empty(trim($_POST['apellido'])) && $_POST['apellido'] != $_SESSION['USER']['apellido']) {
                $checkeo = self::checkApellido($_POST['apellido']);
                $operacion['status'] = $checkeo['status'];
                $operacion['msg']['apellido'] = $checkeo['msg'];
                if ($operacion['status'] === true) {
                    $userData['apellido'] = $_POST['apellido'];
                }
            }

            $operacion = self::modificar($userData);
        }

        $usuario = SessionController::onlyUser();
        if ($usuario === true) {
            Response::render($this->viewDir(__NAMESPACE__), 'modificar', [
                "head" => SiteController::head(),
                "header" => SiteController::header(),
                "patch" => self::$patch,
                "footer" =>  SiteController::footer(),
            ]);
        } else {
            $tituloPagina = 'Offside!';
            Response::render($this->viewDir(__NAMESPACE__), "offside", [
                "titulo" => $tituloPagina,
                "head" => SiteController::head(),
                "patch" => self::$patch
            ]);
        }
    }

    public function modificar($userData)
    {
        $resultado = UserModel::modificar($userData);
        return $resultado;
    }

    public function consultar($campos = null, $filter = null)
    {
        $operacion['status'] = true;
        $operacion['msg'] = '';

        if ($operacion['status'] === true) {
            $USER_MODEL = new UserModel();
            $resultado = $USER_MODEL->consultar($campos, $filter);

            if ($resultado['status'] === true) {
                $usuarios = $resultado['resultado'];
                $operacion['msg'] = 'Se consultó con éxito';
                foreach ($usuarios as $i => $v) {
                    $usuario = $v;
                    foreach ($usuario as $i => $v) {
                        echo "$i=$v <br>";
                    }
                    echo "--------------------------------<br>";
                }
            } else {
                $operacion['status'] = false;
                $operacion['msg'] = 'No se consultó';
            }
        }

        return $operacion;
    }

    public function recuperar($userData)
    {
        $operacion['status'] = true;
        $operacion['msg'] = '';

        if ($operacion['status'] === true) {
            $USER_MODEL = new UserModel();
            $USER_MODEL->recuperar($userData);

            $operacion['msg'] = 'Se dio de alta con éxito';
        }

        return $operacion;
    }

    public static function getUserByEmailOrID($EmailOrID)
    {
        $usuario = UserModel::getUserByEmailOrID($EmailOrID);
        return $usuario;
    }

    public static function checkEstado($email)
    {
        $estado = UserModel::checkEstado($email);
        return $estado;
    }

    public function actionTest()
    {
        $resultado = $this->checkEmailDuplicado('reparador@iseimas.com');
        self::dump_var($resultado);
    }
}
