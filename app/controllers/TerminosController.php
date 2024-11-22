<?php
namespace app\controllers;
use app\models\UserModel;
use \Controller;
use \Response;
use \DataBase;

class TerminosController extends Controller
{

    public function actionPoliticas()
    {
        $head = SiteController::head();
        Response::render($this->viewDir(__NAMESPACE__), 'politicas', [
            "head" => $head,
            "title" => $this->title . "Politicas",
        ]);
    }
}