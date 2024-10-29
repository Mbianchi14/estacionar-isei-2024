<?php

namespace app\controllers;

use \Controller;

class SiteController extends Controller
{
	// Constructor
	public function __construct()
	{
		// self::$sessionStatus = SessionController::sessionVerificacion();
	}

	public static function head()
	{
		static::path();
		$head = file_get_contents(APP_PATH . '/views/inc/head.php');
		$head = str_replace('#PATCH#', self::$ruta, $head);
		return $head;
	}

	public static function header($from_request = null)
	{
		static::path();


		$header = file_get_contents(APP_PATH . '/views/inc/header.php');
		$header = str_replace('#PATCH#', self::$ruta, $header);

		return $header;
	}

	public static function menu()
	{
	}
}
