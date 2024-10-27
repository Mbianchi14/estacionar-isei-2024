<?php 
/**
 * Clase para mostrar las vistas
 */
class Response
{
	
	private function __construct()	{}

	public static function render($viewDir,$view, $vars = []){
		foreach ($vars as $key => $value) {
			$$key = $value;
		}
		require APP_PATH."views/".$viewDir.$view.".php";
	}
}
