<?php
class Cochera
{
    public $id;
    public $titular;
    public $ciudad;
    public $telefono;
    public $email;
    public $id_img_url;
    public $suspendida;
    public $baja;

    public function Agregar(){
        $resultado['state'] = false;//si esta en false, hay error
        $resultado['msg'] = '';

        //hacemos el pedido a la DB
        $sql ="INSERT INTO usuarios (titular, ciudad, telefono, email, id_img_url)
        VALUES ('$this->titular', '$this->ciudad',  '$this->telefono',  '$this->email', ' $this->id_img_url')"; 
        //FALTA     --->     agregar un metodo para poder almacenar la url de la imagen
        
        //ejecutamos el pedido
        $resultadoConsulta = DataBase::ejecutar($sql);

        if ($resultadoConsulta===true){
            $resultado['state'] = true;//registro agregado con exito
            $resultado['msg'] = 'Agregado con exito!';
        } else{
            $resultado['state'] = false;//error cargando el registro
            $resultado['msg'] = 'Error';
        }
        
        return $resultado;
    }

    public function Editar($titular, $ciudad,  $telefono,  $email, $id_img_url){
        $resultado['state'] = false;//si esta en false, hay error
        $resultado['msg'] = '';

        //hacemos el pedido a la DB
        $sql='UPDATE usuarios SET (titular, ciudad, telefono, email, id_img_url) WHERE id=:id';
        $params=['titular'=>$titular, 'ciudad'=>$ciudad, 'telefono'=>$telefono, 'email'=>$email, 'id_img_url'=>$id_img_url];    
       
        //ejecutamos el pedido
        $resultadoConsulta = DataBase::ejecutar($sql);

        if ($resultadoConsulta===true){
            $resultado['state'] = true;//registro edito con exito
            $resultado['msg'] = 'Editado con exito!';
        } else{
            $resultado['state'] = false;//error editando 
            $resultado['msg'] = 'Error';
        }
        
        return $resultado; 
    }

    public function Suspender($id, $suspendida){
    
        $resultado['state'] = false;//si esta en false, hay error
        $resultado['msg'] = '';

        //hacemos el pedido a la DB
        $sql='UPDATE usuarios SET (suspendida) WHERE id=:id';
        $params=['suspendida'=>1,'id'=>$id];
        //ejecutamos el pedido
        $resultadoConsulta= Database::execute($sql,$params); 

        if ($resultadoConsulta===true){
            $resultado['state'] = true;//dado de suspendida con exito
            $resultado['msg'] = 'Editado con exito!';
        } else{
            $resultado['state'] = false;//error eliminando
            $resultado['msg'] = 'Error';
        }
        
        return $resultado; 
    }

    public function Desactivar($id, $baja){
    
        $resultado['state'] = false;//si esta en false, hay error
        $resultado['msg'] = '';

        //hacemos el pedido a la DB
        $sql='UPDATE usuarios SET (baja) WHERE id=:id';
        $params=['baja'=>1,'id'=>$id];
        //ejecutamos el pedido
        $resultadoConsulta= Database::execute($sql,$params); 

        if ($resultadoConsulta===true){
            $resultado['state'] = true;//dado de baja con exito
            $resultado['msg'] = 'Editado con exito!';
        } else{
            $resultado['state'] = false;//error eliminando
            $resultado['msg'] = 'Error';
        }
        
        return $resultado; 
    }
}