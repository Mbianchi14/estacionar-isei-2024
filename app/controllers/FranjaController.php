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
            "header" => SiteController::header(),
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
}
