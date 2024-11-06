<?php
namespace app\models;
use \DataBase;
use \Model;

class UserModel extends Model
{
	protected $table = "usuarios";
	protected $primaryKey = "id";
	protected $secundaryKey = "email";
	public $email;

	public static function FindMail($mail)
	{
		$model = new static();
		$sql = "SELECT * FROM " . $model->primaryKey . " WHERE " . $model->secundaryKey . "= :email ";
		$params = [":email" => $mail];
		$result = DataBase::query($sql, $params);
		return $result ? $result[0] : null;
	}
	public static function GetPermissionByUser($userId)
	{
		$sql = "SELECT p.PermissionName FROM permisos AS p JOIN permisos_roles AS rp ON p.PermissionId = rp.PermisosId 
		JOIN roles AS r ON rp.RolesId = r.RolId JOIN usuarios_roles AS ur ON r.RolId = ur.RolesId WHERE ur.UsersId. = :UsersId";
		$params = [':UsersId', $userId];
		$result = DataBase::query($sql, $params);

		$permisos = [];
		foreach ($result as $fila) {
			$permisos[] = $fila->PermissionName;
		}
		return $permisos;
	}
	// public static function changePassword($newPass, $token){
	// 	$model = new static();
	// 	$sql[] = "UPDATE usuarios SET password = '$newPass' WHERE token = '$token'";

	// 	try {
	// 			$resultado = DataBase::transaction($sql);
	// 			$result['state'] = $resultado['state']; //restulado puede ser TRUE si esta todo bien o FALSE
	// 			$result['notification'] = $resultado['notification'];
	// 	} catch (Exception $e) {
	// 		 // echo 'Error en Archivo: ',  $e->getMessage(), "\n"; DESCOMENTAR PARA VER ERRORES
	// 		  	$result['notification'] = $e->getMessage();
	// 		 	$result['state']  = false;
	// 	}

	// 	return $result;
	// }
}
