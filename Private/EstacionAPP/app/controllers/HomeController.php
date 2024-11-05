<?php
namespace app\controllers;
use app\models\UserModel;
use \Controller;
use \Response;
use \DataBase;

class HomeController extends Controller
{

	// Constructor
	public function __construct()
	{

	}
	public function actionInicio()
	{
		$head = SiteController::head();
		$nav = SiteController::nav();
		Response::render($this->viewDir(__NAMESPACE__), "inicio", [
			"title" => $this->title . "inicio",
			"head" => $head,
			"nav" => $nav
		]);
	}
	public function actionLogin()
	{
		$mail = '';
		$error = [];
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['send'])) {
			$flag = false;
			$val = new ValidationController();
			$ValMail = $val->ValMail();
			if ($ValMail['error']) {
				$flag = true;
				if (!in_array($ValMail['msg'], $error)) {
					$error[] = $ValMail['msg'];
				}
			} else {
				if (!filter_var($ValMail['campo2'], FILTER_VALIDATE_EMAIL)) {
					$flag = true;
					$error[] = 'Correo no valido';
				} else {
					$mail = $ValMail['campo2'];
				}
			}
		// 	if ($flag === false) {
		// 		if ($this->authenticate($mail, $pass)) {
		// 			SessionController::start($mail);
		// 			header('location: inicio');
		// 			exit;
		// 		} else {
		// 			$error[] = 'credenciales incorrectas';
		// 		}
		// 	}
		// }

		$head = SiteController::head();
		$nav = SiteController::nav();
		Response::render($this->viewDir(__NAMESPACE__), "login", [
			"title" => $this->title . "Acceder",
			"head" => $head,
			"nav" => $nav,
			"mail" => $mail,
			"error" => $error
		]);
	}

	private function authenticate($mail, $pass)
	{
		$mail = UserModel::FindMail($mail);
		if ($mail && password_verify($pass, $mail->Pass)) {
			return true;
		} else {
			return false;
		}
	}

	public function action404()
	{
		$head = SiteController::head();
		Response::render($this->viewDir(__NAMESPACE__), "404", [
			"title" => $this->title . 'No se encontro el sitio',
			"head" => $head,
		]);
	}

	private function actionHola()
	{
		echo 'hola';
	}
}