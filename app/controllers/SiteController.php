<?php

namespace app\controllers;

use \Controller;

class SiteController extends Controller
{
    // Constructor
    public function __construct()
    {
        self::$sessionStatus = SessionController::sessionVerificacion();
    }

    public static function head()
    {
        static::patch();
        $head = file_get_contents(APP_PATH . '/views/inc/head.php');
        $head = str_replace('#PATCH#', self::$patch, $head);
        return $head;
    }

    public static function header($from_request = null)
    {
        static::patch();



        if ($_SESSION['SESSION']['STATUS'] === true) {
            $login = "";
            $signin = "";
            $logout = "<a href=\"" . self::$patch . "account/logout\"><div class='btn btn-nav text-light mx-1'>Salir</div></a>";
            $miPerfil = "<a href=\"" . self::$patch . "miperfil\"><div class='btn btn-nav text-light mx-1'>Mi Perfil</div></a>";
        } else {
            $login = "<a href=\"" . self::$patch . "account/login\"><div class='btn btn-nav text-light mx-1'>Iniciar Sesión</div></a>";
            $signin = "<a href=\"" . self::$patch . "user/agregar\"><div class='btn btn-nav text-light mx-1'>Crear cuenta</div></a>";
            $logout = "";
            $miPerfil = "";
        }

        if (!empty($_SESSION['USER'])) {
            if ($_SESSION['USER']['type'] === 'administrador') {
                $dashboard = "<a href=\"" . self::$patch . "admin\"><div class='btn btn-nav text-light mx-1'>Dashboard</div></a>";
            } else {
                $dashboard = "";
            }
        } else {
            $dashboard = "";
        }

        // var_dump($cuenta);

        /*$headerIni =   "<header><!--fixed-top-->
							<nav class=\"navbar navbar-expand-lg navbar-dark py-3 bg-verde\" style=\"min-height: 10vh;\">
								<div class=\"container\">
									<div class=\"col-3\">
										<a href=\"#PATCH#home\"><img src=\"/Maxi/MVC/public/img/isologo-blanco.png\" style=\"max-height: 6vh;\"></a>
									</div>

									<div class=\"col-9 d-flex justify-content-end\">
										<a href=\"".self::$patch."home\"><div class=\"btn btn-nav text-light mx-1\">Inicio</div></a>
										<a href=\"".self::$patch."nosotros\"><div class=\"btn btn-nav text-light mx-1\">Nosotros</div></a>
										<a href=\"".self::$patch."ontacto\"><div class=\"btn btn-nav text-light mx-1\">Contacto</div></a>
										<a href=\"".self::$patch."reservar\"><div class=\"btn btn-nav text-light mx-1\">Reservar</div></a>";
		$headerFin = 				"</div>
								</div>		
							</nav>
						</header>";*/


        $header = file_get_contents(APP_PATH . '/views/inc/header.php');
        $arr = array(
            "#MIPERFIL#"         => $miPerfil,
            "#LOGOUT#"            => $logout,
            "#LOGIN#"            => $login,
            "#SIGNIN#"            => $signin,
            "#DASHBOARD#"        => $dashboard,
            "#CUENTA#"            => self::menuUser(),
            "#PATCH#"             => self::$patch
        );


        $header = strtr($header, $arr);

        return $header;
    }

    public static function menuUser()
    {
        static::patch();
        $dashboard = "";
        $cuenta = "";
        if ($_SESSION['SESSION']['STATUS'] === true) {
            if (!empty($_SESSION['USER'])) {
                if ($_SESSION['USER']['type'] == 'administrador') {
                    $dashboard = "<li><a href=\"" . self::$patch . "admin\" class='text-azul' style=\"text-decoration: none;\">Dashboard</a></li><hr>";
                }
            }
            $cuenta = " <div class=\"dropdown\">
						  <button class=\"btn dropdown-toggle text-light\" type=\"button\" id=\"dropdownMenuLink\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
						    <i class=\"far fa-user\"></i>
						  </button>

						  <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"dropdownMenuLink\">
						    <li><a href=\"" . self::$patch . "miperfil\" class='text-azul mr-1' style=\"text-decoration: none;\">Perfil</a></li><hr>" .
                $dashboard .
                "<li><a href=\"" . self::$patch . "account/logout\" class='text-azul mr-1' style=\"text-decoration: none;\">Salir</a></li>
						  </ul>
						</div>";
        }
        return $cuenta;
    }

    public static function footer()
    {
        static::patch();
        $var = '';
        $footer = file_get_contents(APP_PATH . '/views/inc/footer.php');
        $arr = array(
            "#var#"        => '',
            "#FOOTER_REGISTRO#" => '',
            "#PATCH#"             => self::$patch
        );
        $footer = strtr($footer, $arr);
        return $footer;
    }


    public static function msgError($leyenda)
    {
        $mensaje = '
				<div class="notice error">
				<i class="fa fa-remove fa-large"></i> 
				' . $leyenda . '
				<a href="#close" class="fa fa-remove"></a>
				</div>';
        return $mensaje;
    }
}
