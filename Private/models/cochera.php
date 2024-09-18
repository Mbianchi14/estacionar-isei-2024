<?php
class Cochera
{
    public $id;
    public $titular;
    public $ciudad;
    public $telefono;
    public $email;
    public $id_location;
    public $id_img_url;
    public $suspendida;
    public $baja;

    public function Agregar()
    {
        $resultado['state'] = false;//si esta en false, hay error
        $resultado['msg'] = '';

        //hacemos el pedido a la DB
        $sql ="INSERT INTO usuarios (titular, ciudad, telefono, email, id_location, id_img_url)
        VALUES ('$this->titular', '$this->ciudad',  '$this->telefono',  '$this->email', '$this->id_location',' $this->id_img_url')"; 
        //FALTA     --->     agregar un metodo para poder almacenar la url de la imagen y otro metodo para agregar la locacion

        
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
}