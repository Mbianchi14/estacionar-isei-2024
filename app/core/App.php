<?php 
/**
 * Clase Iniciadora bootstrapping
 */
class App
{
	protected $controller 	= "app\\controllers\\"."HomeController";
	protected $method 		= "actionIndex";
	protected $params 		= [];

	public function __construct()
	{
		$url = $this->parseUrl();
		
		// var_dump($url);

		// echo $this->controller."<br>";
		if (isset($url[0])) {
			$controllerName = ucfirst(strtolower($url[0]))."Controller";
		}else{
			$controllerName = ucfirst(strtolower('Home'))."Controller";
		}
		

		// echo APP_PATH."controllers\\".$controllerName.".php <------------------- <br>";

		if (file_exists(APP_PATH."controllers/".$controllerName.".php")) {

			$this->controller = APP_PATH."controllers/".$controllerName;
			unset($url[0]);
			$noexisteControlador = false;
			// echo "existe controlador <br>";
		}else{
			// echo "no existe controlador <br>";
			$noexisteControlador = true;
			$tempMethod = $url[0];
			// unset($url[0]);
		}

		// echo $this->controller;
		// // echo dirname(__DIR__).'\\'.$this->controller.".php <br>";
		// // require dirname(__DIR__).'\\'.$this->controller.".php";
		// require $this->controller.".php";

		$tempController =  str_replace('/','\\',$this->controller);

		// echo $tempController;
		$this->controller = new  $tempController;
		
		if (isset($url[1])) {
			$methodName = "action".ucfirst(strtolower($url[1]));
			// echo "$methodName <br>";
			if (method_exists($this->controller, $methodName)) {
				$this->method = $methodName;
				unset($url[1]);
			}else{
				$this->method = 'action404';
				unset($url[1]);
			}
		}else{
			if (isset($tempMethod)) {
				$methodName = "action".ucfirst(strtolower($tempMethod));
				if (method_exists($this->controller, $methodName)) {
					$this->method = $methodName;
					unset($url[0]);
				}else{
					$this->method = 'action404';
				}
			}
		}

		/*Si la URL sigue teniendo valores, los agrega a params, sino paramas toma el valor por defecto, o sea nada*/
		$this->params = $url ? array_values($url) : $this->params;

		/*llama al metodo del controlador y pasa los parmetros al metodo*/
		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	public function parseUrl(){
		if (isset($_GET['url'])) {
			return explode("/",filter_var(rtrim($_GET["url"],"/"),FILTER_SANITIZE_URL));
		}
	}
}