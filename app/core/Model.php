<?php 
/**
 * Clase Modelo
 */
class Model
{
	protected $table; //Tabla de la base de datos
	protected $primaryKey = "id"; //Primary Key


	public static function dump_var($var){
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}

	public static function findId($id){
		$model = new static();
		$sql = "SELECT * from ".$model->table." where ".$model->primaryKey." = :id";
		$params = ["id" => $id];
		$result = DataBase::getRecord($sql, $params);

		// if ($result) {
		// 	foreach ($result as $key => $value) {
		// 		$model->$key = $value;
		// 	}
		// }else{
		// 	$model = $result;
		// }
		$model = $result; #borrar esta linea y descomentar arriba
		return $model;
	}


	public static function getAll($config = null){
		$model = new static();
		$sql = "SELECT * from ".$model->table;
		$result = DataBase::getRecords($sql);
		return $result;
	}

	public static function getColumnsNames($table){
		 $result = DataBase::getColumnsNames($table);
		 return $result;
	}

	public static function lastId($table, $nombre_tabla_de_Id){
		$model = new static();

		$operacion['status'] = true;
		$operacion['resultado'] = '';


		$sql = "SELECT MAX($nombre_tabla_de_Id) as lastId FROM $table;";
		$resultado = DataBase::getRecord($sql);

		// var_dump($resultado);
		// echo $resultado->lastId;

		if (isset($resultado->lastId)) {
			if (is_numeric($resultado->lastId)) {
				$operacion['resultado'] = $resultado->lastId;
				$operacion['status'] = true;
			}else{
				$operacion['status'] = false;
			}
		}else{
			$operacion['status'] = false;
		}

		return $operacion;
	
	}
}
