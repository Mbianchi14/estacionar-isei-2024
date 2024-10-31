<?php
namespace app\controllers;
use \Controller;
use \Response;
use \DataBase;

class SessionController extends Controller
{
    public function start($user)
    {
        $_SESSION['user'] = $user;
        $_SESSION['expiration'] = time() + 30;
    }
}