<?php

namespace app\models;

use \DataBase;
use \Model;

class UserModel extends Model
{
    protected $table = "usuarios";
    protected $primaryKey = "idUsuario";
    protected $secundaryKey = "email";
    public $email;


    public static function agregar($userData)
    {
        $model = new static();

        $operacion['status'] = true;
        $operacion['msg'] = '';

        $email         = $userData['email'];
        $password     = $userData['password'];
        $nombre     = $userData['nombre'];
        $apellido     = $userData['apellido'];
        $estado        = true;

        if (!empty($userData['estado'])) {
            $estado     = $userData['estado'];
        }


        $sqlUser = "INSERT INTO usuarios(email, password, nombre, apellido, estado) VALUES ('$email', '$password','$nombre','$apellido', $estado)";


        DataBase::execute($sqlUser);

        if (empty($isAdmin)) {
            $isAdmin = false;
        }

        if ($isAdmin === true) {
            $idUsuario = self::lastId();
            if ($idUsuario['status'] !== false) {
                $idUsuario = $idUsuario['resultado'];
                $sql = "INSERT INTO admins (idUsuario) VALUES ($idUsuario)";
                DataBase::execute($sql);
            } else {
                $operacion['status'] = false;
            }
        }

        return $operacion;
    }

    public static function eliminar($userData)
    {

        $email         = $userData['email'];

        $sql = "UPDATE usuarios SET estado=false WHERE email='$email'";
        DataBase::execute($sql);
    }

    public static function modificar($userData)
    {

        $operacion['status'] = true;
        $operacion['msg'] = '';
        self::dump_var($userData);
        $email = $userData['email'];

        if (isset($userData['nuevoEmail'])) {
            $userData['email'] = $userData['nuevoEmail'];
        }

        self::dump_var($userData);

        $sql = "UPDATE usuarios SET ";
        foreach ($userData as $i => $v) {
            if ($i != 'nuevoEmail') {
                if (is_string($v) === true) {
                    $sql = $sql . "$i='$v', ";
                } else {
                    $sql = $sql . "$i=$v, ";
                }
            }
        }
        $sql = substr($sql, 0, -2);
        $sql = $sql . " WHERE email='$email'";

        foreach ($userData as $i => $v) {
            $_SESSION['USER'][$i] = $v;
        }
        DataBase::execute($sql);

        echo $sql;

        return $operacion;
    }

    public static function consultar($campos = null, $filter = null)
    {
        $operacion['status'] = true;
        $operacion['msg'] = '';

        $sql = "SELECT ";
        if (!empty($campos)) {
            foreach ($campos as $i => $v) {
                $sql = $sql . "$v, ";
            }
            $sql = substr($sql, 0, -2);
        } else {
            $sql = $sql . "*";
        }
        $sql = $sql . " FROM usuarios";
        if (!empty($filter)) {
            $sql = $sql . " WHERE";
            foreach ($filter as $i => $v) {
                if (is_string($v) === true) {
                    $sql = $sql . " $i='$v' AND";
                } else {
                    $sql = $sql . " $i=$v AND";
                }
            }
            $sql = substr($sql, 0, -4);
        }
        $usuarios = $this->getRecords($sql);

        return $usuarios;
    }

    public static function recuperar($userData)
    {

        $operacion['status'] = true;
        $operacion['msg'] = '';

        $email         = $userData['email'];

        $sql = "UPDATE usuarios SET estado=1 WHERE email='$email'";
        DataBase::execute($sql);
    }

    public static function lastId($table = 'usuarios', $nombre_tabla_de_Id = 'idUsuario')
    {
        $model = new static();
        $operacion = Model::lastId($table, $nombre_tabla_de_Id);


        return $operacion;
    }

    public static function getUserByEmailOrID($EmailOrID)
    {
        $model = new static();
        $sql = "SELECT * FROM usuarios WHERE emailUsuario = '$EmailOrID'";

        $operacion = DataBase::getRecord($sql);

        /*si no existe retorna FALSE, sino los datos*/
        return $operacion;
    }

    public static function checkEstado($email)
    {
        $model = new static();
        $sql = "SELECT estadoUsuario FROM usuarios WHERE emailUsuario = '$email'";

        $operacion = DataBase::getRecord($sql);
        foreach ($operacion as $i => $v) {
            $operacion = $v;
        }
        /*si está activo retorna 1, sino 0*/
        return $operacion;
    }
}
