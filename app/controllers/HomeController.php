<?php

namespace app\controllers;

use \Controller;
use \Response;
use \DataBase;
use app\controllers\ComplejoController;

class HomeController extends Controller
{

    // Constructor
    public function __construct()
    {
        self::$sessionStatus = SessionController::sessionVerificacion();
    }


    public function actionIndex($var = null)
    {

        Response::render($this->viewDir(__NAMESPACE__), "home", [
            "head" => SiteController::head(),
            "header" => SiteController::header(),
            "patch" => self::$patch,
            "footer" =>  SiteController::footer(),
            "var_de_vista" => $var,
        ]);
    }

    public function action404()
    {
        echo 'Pagina no encontrada';
    }
}
