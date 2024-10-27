<?php 
/**
 * Controllador 
 */
use app\models\UserModel;

class Controller
{

	protected $title = 'Maxi Boggino';
	protected static $patch;
	protected static $sessionStatus;

	public function actionIndex($var = null){
		$this->action404();
	}

	public function action404(){
		// echo "Error 404 - Página no encontrada - CONTROLLER";
		static::patch();
		$ruta = self::$patch;
		header('Location:'.$ruta.'404');
	}
	
	public static function patch(){
		if (isset($_GET['url'])) {
			$url = explode('/', $_GET['url']);
			if (count($url)> 1) {
				$dirFiles ='';
				for ($i=1; $i < count($url); $i++) { 
					$dirFiles .= '../';
				}
			}else{
				$dirFiles = '';
			} 
		}else{
			$dirFiles = '';
		}
		self::$patch = $dirFiles;
	}

	protected function viewDir($nameSpace){
		$replace = array($nameSpace,'Controller');
		$viewDir = str_replace($replace , '', get_class($this)).'/';
		$viewDir = str_replace('\\', '', $viewDir);
		$viewDir = strtolower($viewDir);
		return $viewDir;
	}

	public static function dump_var($var){
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}

	public function checkEmail($email){
		/* Validación de email utilizando "expresiones regulares" */
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

		$operacion['status'] = true;
		$operacion['msg'] = Array();
		$i = 0;

		# Validaciones de EMAIL -------------

		/* Valida si se ingreso algo  */
		if (empty(trim($email))){
			$operacion['status'] = false;
			$operacion['msg'][$i] = 'Por favor ingrese un email';
		}else{
			$emailCheck = (preg_match($regex, $email))?true:false;

	 		if ($emailCheck === false) {
				$operacion['status'] = false;
				$operacion['msg'][$i] = 'Por favor ingrese un email valido';
			}else{
				$verificarEmail = $this->checkEmailDuplicado($email);
				if ($verificarEmail['status'] === false) {
					$operacion['status'] = $verificarEmail['status'];
					$operacion['msg'][$i] = $verificarEmail['msg'];
				}
		    }

		}

		/*IF ternario, devuele true si el email esta bien o false si esta mal (formato)*/

		# FIN --- Validaciones de EMAIL -------------
		return $operacion;
 	}

	public function checkEmailDuplicado($email){
		$status = true;
		$msg = '';

		# ingresó un email
		$sql = "SELECT email FROM usuarios WHERE email='$email'";

		//$USER_MODEL = new UserModel();
		$numeroDeFilas = DataBase::rowCount($sql);

		if($numeroDeFilas == 1){
			# el mail ya existe
			$msg = 'Ya existe un usuario con ese email. Por favor ingrese uno nuevo';
			$status = false;	
		}

		$operacion['status'] = $status;
		$operacion['msg'] = $msg;

		return $operacion;
	}

	public function checkComplejo($idComplejo){
		$status = true;
		$msg ="";

		$sql = "SELECT * FROM complejos WHERE idComplejo=$idComplejo";

		$numeroDeFilas = DataBase::RowCount($sql);

		if ($numeroDeFilas!==1) {
			# code...
			$msg='No existe el complejo';
			$status=false;
		}

		$operacion['msg']=$msg;
		$operacion['status']=$status;

		return $operacion;
	}

	public function checkPassword($pass){
		$operacion['status'] = true;
		$operacion['msg'] = array();
		$i = 0;

		if(empty(trim($pass))){
			$operacion['status'] = false;
			$operacion['msg'][$i] = 'Por favor, ingrese una contraseña';
		}else{
			if (strlen($pass)<8) {
				$operacion['status'] = false;
				$operacion['msg'][$i] = 'La contraseña debe tener al menos 8 caracteres';
				$i = $i + 1;
			}

			if (!preg_match('/[A-Z]/', $pass)) {
				$operacion['status'] = false;
				$operacion['msg'][$i] = 'La contraseña debe contener al menos 1 mayúscula';
				$i = $i + 1;
			}

			if (!preg_match('/[a-z]/', $pass)) {
				$operacion['status'] = false;
				$operacion['msg'][$i] = 'La contraseña debe contener al menos 1 minúscula';
				$i = $i + 1;
			}

			if (!preg_match('/[0-9]/', $pass)) {
				$operacion['status'] = false;
				$operacion['msg'][$i] = 'La contraseña debe contener al menos 1 número';
			}
		}

		return $operacion;
	}

	public function checkNombre($nombre){
		$operacion['status'] = true;
		$operacion['msg'] = array();
		$i = 0;

		if(empty(trim($nombre))){
			$operacion['status'] = false;
			$operacion['msg'][$i] = 'Por favor, ingrese un nombre';
		}else{
			if (preg_match('/[0-9]/', $nombre)){
				$operacion['status'] = false;
				$operacion['msg'][$i] = 'El nombre no puede poseer números';
				$i = $i + 1;
			}
			if (strlen($nombre)<3){
				$operacion['status'] = false;
				$operacion['msg'][$i] = 'El nombre debe tener al menos 3 caracteres';
				$i = $i + 1;
			}
			if (strlen($nombre)>50){
				$operacion['status'] = false;
				$operacion['msg'][$i] = 'El nombre no puede superar los 50 caracteres';
			}
		}

		return $operacion;
	}

	public function checkApellido($apellido){
		$operacion['status'] = true;
		$operacion['msg'] = array();
		$i = 0;

		if(empty(trim($apellido))){
			$operacion['status'] = false;
			$operacion['msg'][$i] = 'Por favor, ingrese un apellido';
		}else{
			if (preg_match('/[0-9]/', $apellido)){
				$operacion['status'] = false;
				$operacion['msg'][$i] = 'El apellido no puede poseer números';
				$i = $i + 1;
			}
			if (strlen($apellido)<3){
				$operacion['status'] = false;
				$operacion['msg'][$i] = 'El apellido debe tener al menos 3 caracteres';
				$i = $i + 1;
			}
			if (strlen($apellido)>50){
				$operacion['status'] = false;
				$operacion['msg'][$i] = 'El apellido no puede superar los 50 caracteres';
			}
		}

		return $operacion;
	}

	
	protected static function loadJS($vars = [], $specific_controller = null){

		// if (isset($_GET['url'])) {
			if (!isset($specific_controller)) {
				$url = explode('/', $_GET['url']);
				$controller = $url[0];

			}else{
				$controller = strtolower($specific_controller);
			}

				$arr =[];

				foreach ($vars as $key => $value) {
					$$key = $value;
					$arr["#$key#"] = $value;
				}
				// echo "<pre>";
				// var_dump($arr);
				// echo "</pre>";

			$resultado = file_get_contents(APP_PATH."helpers/js/".$controller."_js".".php");
			$resultado = strtr($resultado,$arr);


			return $resultado;
	}

	protected static function loadLibreria($vars, $type, $name){
			$arr =[];

			foreach ($vars as $key => $value) {
				$$key = $value;
				$arr =["#$key#" =>  $value];
			}

			// var_dump($arr);

			$resultado = file_get_contents(APP_PATH."librerias/".$type."/".$name.".".$type);
			$resultado = strtr($resultado,$arr);
			if ($type == 'js') {
				$result = "<script>$resultado</script>";
			}elseif ($type == 'css') {
				$result = "<style>$resultado</style>";
			}
			return $result;
	}

	// Métodos de Valicaciones
	// protected static function checkEmpty($dato,string $campoName, int $minlength = null, int $maxlength = null){
	// 	if (empty(trim($dato))) {
	// 		$result = "Por favor ingrese <b>".ucfirst($campoName)."</b>"; // campo vacio
	// 	}else{
	// 		if (isset($minlength) && isset($maxlength)) {
	// 			if (strlen(trim($dato)) >= $minlength && strlen(trim($dato)) <= $maxlength) {
	// 				$result = true; // campo no vacio con restriccion de caracteres.
	// 			}else{
	// 				$result = "Por favor ingrese <b>".ucfirst($campoName)."</b> entre $minlength y $maxlength caracteres!"; // campo vacio
	// 			}
	// 		}else{
	// 			$result = true; // campo no vacio sin restriccion de caracteres
	// 		}
	// 	}
	// 	return $result;
	// }

	// protected static function checkNumber($number, string $campoName,int $min = null,float $max = null){
	// 	if (is_numeric($number)) {
	// 		if (isset($min) && isset($max)) {
	// 			if ($number >= $min && $number <= $max) {
	// 				$result = true; // es número con rango a comprobar
	// 			}else{
	// 				$result = "Por favor ingrese un número entre $min y $max en: <b>".strtoupper($campoName)."!</b>"; // email no valido
	// 			}
	// 		}else{
	// 			$result = true; // es número sin rango a comprobar
	// 		}
	// 	}else{
	// 		$result = "Por favor ingrese un número en: <b>".strtoupper($campoName)."!</b>"; // no es un numero
	// 	}
	// 	return $result;
	// }
}