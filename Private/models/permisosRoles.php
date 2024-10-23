<?php
class PermisosRoles{
    public $id;
    public $cochera;
    public $franja;
    public $promociones;

    if (isset($_SESSION)) {
        $cochera=$_SESSION['cochera'];
        $franja=$_SESSION['franja'];
        $promociones=$_SESSION['promociones'];
    }else{
        $cochera=0;
        $franja=0;
        $promociones=0;   
    }






    public function getByEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $resultado = DataBase::getRecord($sql, ['email' => $email]);
        $msg = '';

        if (empty($result)) {
            $msg = 'Error. Usuario no encontrado.';
        } else {
            $sql = "SELECT rol FROM usuarios WHERE id = :id";
            $resultado = DataBase::getRecord($sql, ['rol' => $rol]);
            
            return $resultado;

            $rolSession='';
            if (isset($_SESSION)) {
                $rolSession=$_SESSION['rol'];
            }else{
                $rolSession=0;   
            }

            if ($rol===$rolSession) {
                if($rol===0){
                    
                }else if($rol===1){

                    }else if($rol===2){

                        }else if($rol===3){

                            }else if($rol===4){

                                }else if($rol===5){

                                }
            }
            
            if ($rol===$rolSession) {
                $rol=$i;
                switch ($i) {
                    case 0:
                        /**dar los pérmisos acorde al rol*/
                        break;
                    case 1:
                        /**dar los pérmisos acorde al rol*/
                        break;
                    case 2:
                        /**dar los pérmisos acorde al rol*/
                        break;
                    case 3:
                        /**dar los pérmisos acorde al rol*/
                        break;
                    case 4:
                        /**dar los pérmisos acorde al rol*/
                        break;
                    case 5:
                        /**dar los pérmisos acorde al rol*/
                        break;
                    case 6:
                        /**dar los pérmisos acorde al rol*/
                        break;
                }
            }
        }
    }

}