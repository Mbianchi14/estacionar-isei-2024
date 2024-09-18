<?php
class Usuario
{
    public $id;
    public $nombre;
    public $apellido;
    public $usuario;
    public $email;
    public $contrasena;
    public $fecha_alta;
    public $fecha_baja;
    public $fecha_modif;
    public $activo;
    

    public function Agregar($nombre,$apellido,$usuario,$email,$contrasena,$fecha_alta)
    {
      $sql='INSERT INTO usuarios (nombre,apellido,usuario,email,contrasena,fecha_alta) VALUES (:nombre,:apellido,:usuario,:email,:contrasena,:fecha_alta)';      
      $params=['nombre'=> $nombre, 'apellido'=>$apellido,'usuario'=>$usuario,'email'=>$email,'contrasena'=>$contrasena,'fecha_alta'=>$fecha_alta];
      $resultado= Database::execute($sql,$params);
      return $resultado;  
    }

    public function Editar($nombre,$apellido,$usuario,$email,$contrasena,$fecha_modif,$id)
    {
        $sql='UPDATE usuarios SET (nombre=:nombre,apellido=:apelllido,usuario=:usuario,contrasena=:contrasena,fecha_modif=:fecha_modif) WHERE id=:id';
        $params=['nombre'=>$nombre, 'apellido'=>$apellido,'usuario'=>$usuario,'email'=>$email,'contrasena'=>$contrasena,'fecha_modif'=>$fecha_modif,'id'=>$id];    
        $resultado= Database::execute($sql,$params);
        return $resultado;  
    }

    public function Desactivar($id,$activo)
    {
        $sql='UPDATE usuarios SET (activo) WHERE id=:id';
        $params=['activo'=>0,'id'=>$id];    
        $resultado= Database::execute($sql,$params);
        return $resultado;  
    }
    

}