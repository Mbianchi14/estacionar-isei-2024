<?php
namespace app\controllers;
use \Controller;
use app\models\CategoriaModel;

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
		$head = str_replace('#PATH#', self::$ruta, $head);
		return $head;
	}

	public static function nav()
	{
		static::path();
		$nav = file_get_contents(APP_PATH . '/views/inc/nav.php');
		$nav = str_replace('#PATH#', self::$ruta, $nav);
		return $nav;
	}
	public static function header()
	{
		static::path();
		$header = file_get_contents(APP_PATH . '/views/inc/header.php');
		$header = str_replace('#PATH#', self::$ruta, $header);
		return $header;
	}
	public static function ClickHere()
	{
		static::path();
		$ClickHere = file_get_contents(APP_PATH . '/views/inc/ClickHere.php');
		$ClickHere = str_replace('#PATH#', self::$ruta, $ClickHere);
		return $ClickHere;
	}

	public static function navInferior()
	{
		static::path();
		$navInferior = file_get_contents(APP_PATH . '/views/inc/navInferior.php');
		$navInferior = str_replace('#PATH#', self::$ruta, $navInferior);
		return $navInferior;
	}

}
