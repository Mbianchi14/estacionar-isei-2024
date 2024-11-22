<?php
namespace app\controllers;
use \Controller;
use \Response;
use \DataBase;

class ValidationController extends Controller
{
    private static function Validate($campo, $campoNombre, $min, $max)
    {
        $msg = '';
        $error = false;
        $campo2 = '';

        if (!isset($_POST[$campo])) {
            $msg = $campoNombre . ' no existe!';
            $error = true;
        } else {
            $campo2 = trim($_POST[$campo]);
            if (!empty($campo2)) {
                $msg = $campoNombre . ' no puede quedar vacio!';
                $error = true;
            }
            if (strlen($campo2) < $min || strlen($campo2) > $max) {
                $msg = ' el campo debe estar entre ' . $min . ' y ' . $max . ' caracteres';
                $error = true;
            }
        }
        $resultado['campo2'] = $campo2;
        $resultado['error'] = $error;
        $resultado['msg'] = $msg;
        return $resultado;
    }
    public function ValName()
    {
        return $this->Validate('user', 'usuario', 3, 60);
    }
    public function ValMail()
    {
        return $this->Validate('mail', 'correo', 3, 150);
    }
}