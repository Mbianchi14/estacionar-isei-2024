<?php

namespace app\controllers;

use \Controller;
use \Response;
use \DataBase;
use app\models\FranjaModel;

class FranjaController extends Controller
{
    public $idFranja;
    public $nombre;
    public $provincia;
    public $localidad;
    public $direccion;
    public $telefono;


    public function actionAgregar()
    {
        $operacion['status'] = true;
        $operacion['msg']['nombre'] = array();
        $operacion['msg']['provincia'] = array();
        $operacion['msg']['localidad'] = array();
        $operacion['msg']['direccion'] = array();
        $operacion['msg']['telefono'] = array();


        if (isset($_POST['accion']) && $_POST['accion'] === 'agregar') {

            foreach ($_POST as $campo => $value) {
                $operacion['campos'][$campo] = $value;
            }

            $franjaData['nombre']     = $_POST['nombre'];
            $franjaData['provincia']   = $_POST['provincia'];
            $franjaData['localidad']   = $_POST['localidad'];
            $franjaData['direccion']     = $_POST['direccion'];
            $franjaData['telefono']   = $_POST['telefono'];

            $operacion = self::agregar($franjaData);
            echo $operacion['msg'];
            return;
        }

        Response::render($this->viewDir(__NAMESPACE__), 'agregar', [
            "head" => SiteController::head(),
            //"header" => SiteController::header(),
            //"patch" => self::$patch,
            //"footer" =>  SiteController::footer(),
            "mensaje" => $operacion['msg'],
        ]);
    }

    public function agregar($franjaData)
    {
        $idFranja = $franjaData['nombre'];
        $provincia    = $franjaData['provincia'];
        $localidad     = $franjaData['localidad'];
        $direccion    = $franjaData['direccion'];
        $telefono     = $franjaData['telefono'];

        /*Validaciones*/
        $operacion['status'] = true;
        $operacion['msg'] = array();

        /* $checkeo = self::checkFranja($idFranja);
		if ($operacion['status']) {
			$operacion['status'] = $checkeo['status'];
		}
		$operacion['msg']['email'] = $checkeo['msg']; */

        //self::dump_var($operacion['status']);
        if ($operacion['status'] === true) {
            // $USER_MODEL = new FranjaModel();
            FranjaModel::agregar($franjaData);

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

        if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
            $canchaData = $_POST['idEliminar'];
            $operacion = self::eliminar($canchaData);
            echo $operacion;
            return;
        }

        if (isset($_POST['enviar'])) {

            foreach ($_POST as $campo => $value) {
                $operacion['campos'][$campo] = $value;
            }

            $franjaData['email'] = $_POST['email'];
            $franjaData['password'] = $_POST['password'];

            $operacion = self::eliminar($franjaData);
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

    public function eliminar($franjaData)
    {
        $operacion['status'] = true;
        $operacion['msg'] = '';
        //$email 		= $franjaData['email'];
        //$password 	= $franjaData['password'];

        /* if ($operacion['status'] === true) {
			$datosUsuario = self::getFranjaByEmailOrID($_POST['email']);
			if ($_POST['password'] != $datosUsuario->password) {
				$operacion['status'] = false;
				$operacion['msg']= 'Para eliminar el usuario ingrese el email y la contraseña correctamente';
			}else{
				FranjaModel::eliminar($franjaData);
				AccountController::actionLogout();
			}
		} */

        $operacion = FranjaModel::eliminar($franjaData);

        if ($operacion == 1) {
            $operacion = "Franja dado de baja con éxito";
        } else {
            $operacion = "Algo salió mal";
        }

        return $operacion;
    }

    /* Esto estaba adentro del actionModificar
			foreach ($_POST as $campo => $value) {
				$operacion['campos'][$campo] = $value;
			}

			$franjaData['email'] = $_SESSION['USER']['email'];
			if (!empty(trim($_POST['nuevoEmail'])) && $_POST['nuevoEmail'] != $_SESSION['USER']['email']) {
				$checkeo = self::checkEmail($_POST['nuevoEmail']);
				$operacion['status'] = $checkeo['status'];
				$operacion['msg']['nuevoEmail'] = $checkeo['msg'];
				if ($operacion['status'] === true) {
					$franjaData['nuevoEmail'] = $_POST['nuevoEmail'];
				}
			}
			if (!empty(trim($_POST['password'])) && $_POST['password'] != $_SESSION['USER']['password']) {
				$checkeo = self::checkPassword($_POST['password']);
				$operacion['status'] = $checkeo['status'];
				$operacion['msg']['password'] = $checkeo['msg'];
				if ($operacion['status'] === true) {
					$franjaData['password'] = $_POST['password'];
				}
			}
			if (!empty(trim($_POST['nombre'])) && $_POST['nombre'] != $_SESSION['USER']['nombre']) {
				$checkeo = self::checkNombre($_POST['nombre']);
				$operacion['status'] = $checkeo['status'];
				$operacion['msg']['nombre'] = $checkeo['msg'];
				if ($operacion['status'] === true) {
					$franjaData['nombre'] = $_POST['nombre'];
				}
			}
			if (!empty(trim($_POST['apellido'])) && $_POST['apellido'] != $_SESSION['USER']['apellido']) {
				$checkeo = self::checkApellido($_POST['apellido']);
				$operacion['status'] = $checkeo['status'];
				$operacion['msg']['apellido'] = $checkeo['msg'];
				if ($operacion['status'] === true) {
					$franjaData['apellido'] = $_POST['apellido'];
				}
			} 

			$operacion = self::modificar($franjaData);
	*/

    public function actionModificar()
    {

        if (self::$sessionStatus === "OffLine") {
            static::patch();
            $ruta = self::$patch . 'home';
            header("Location: $ruta");
        }

        $operacion['status'] = true;


        if (isset($_POST['accion']) && $_POST['accion'] === 'modificar') {

            $franjaData['idFranja'] = intval($_POST['idFranja']);
            $franjaData['nombre']     = $_POST['nombre'];
            $franjaData['direccion']    = $_POST['direccion'];
            $franjaData['telefono']    = $_POST['telefono'];
            if (!empty($_POST['provincia'])) {
                $franjaData['provincia']  = $_POST['provincia'];
            }
            if (!empty($_POST['localidad'])) {
                $franjaData['localidad']  = $_POST['localidad'];
            }

            $operacion = self::modificar($franjaData);

            echo $operacion['msg'];
            return;
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

    public function modificar($franjaData)
    {
        $resultado = FranjaModel::modificar($franjaData);
        return $resultado;
    }

    public function actionRecuperar()
    {
        $franjaData = $_POST['idRecuperar'];

        $operacion = self::recuperar($franjaData);

        if ($operacion == 1) {
            $operacion = "Franja se ha recuperado con éxito";
        } else {
            $operacion = "Algo salió mal";
        }
        echo $operacion;
        return;
    }

    public function recuperar($franjaData)
    {
        $resultado = FranjaModel::recuperar($franjaData);
        return $resultado;
    }

    public function actionConsultar()
    {
        $resultado = self::getUltimoID();

        $ultimoFranja = intval($resultado);

        echo $ultimoFranja;
        return;
    }

    public function getUltimoID()
    {
        $resultado = FranjaModel::getUltimoID();
        return $resultado;
    }

    public static function consultarFranjas($filtro = null)
    {
        empty($filtro) ? $franjas = FranjaModel::consultarFranjas() : $franjas = FranjaModel::consultarFranjas($filtro);

        return $franjas;
    }
}
