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
}