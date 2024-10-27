<?php 
/**
 * 
 */
class Autoloader
{
	
	public function __construct()
	{
		$this->loadAppClasses();
	}

	private function loadAppClasses(){

		function cargarClase($nombreClase){
			// echo $nombreClase."<br>";
			require_once str_replace('\\','/',$nombreClase).".php";

		}
		spl_autoload_register('cargarClase', TRUE , FALSE );

	}


}

new Autoloader();