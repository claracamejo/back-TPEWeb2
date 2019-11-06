<?php

require_once 'controller/librosController.php' ;
require_once 'controller/autoresController.php' ;
require_once 'controller/loginController.php' ;

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_libros", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/libros');
define("URL_autores", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/autores');
define("URL_login", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_logout", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

$controller = new librosController();
$controllerAut = new autoresController();
$controllerUser = new loginController();


if($action == ''){
    $controllerUser->home();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "libros"){
            $controller->traerLibros();
        }
        elseif($partesURL[0] == "libro"){
            if(isset($partesURL[1])){
                $controller->traerLibro($partesURL[1]);
            }
        }
        elseif($partesURL[0] == "borrarLibro"){
            if(isset($partesURL[1])){
                $controller->deleteLibro($partesURL[1]);
            }
        }
        elseif($partesURL[0] == "agregarLibro"){
            $controller->agregarLibro();
        }
        elseif($partesURL[0] == "addLibro"){
            $controller->addLibro();
        }
        elseif($partesURL[0] == "editarLibro"){
            if(isset($partesURL[1])){
                $controller-> mmmmm($partesURL[1]);//no se como verga hacer aca 
            }
        }
        elseif($partesURL[0]=='autores'){  //queria probar de ver si andaba esto 
            $controllerAut->Autores();
        }
        elseif($partesURL[0] == "autor"){
            if(isset($partesURL[1])){
                $controllerAut->traerAutor($partesURL[1]);
            }
        }
        elseif($partesURL[0] == "agregarAutor"){
            $controllerAut->agregarAutor();
        }
        elseif($partesURL[0] == "editar"){
            if(isset($partesURL[1])){
                $controllerAut->cambiarAutor($partesURL[1]);
            }
        }
        elseif($partesURL[0] == "insertar"){
            $controllerAut->addAutor();
        }
        elseif($partesURL[0] == "borrarAutor"){
            $controllerAut->deleteAutor($partesURL[1]);
        }
        elseif($partesURL[0] == "login") {
            $controllerUser->showLogin();

        }elseif($partesURL[0] == "iniciarSesion") {
            $controllerUser->showLogin();

        }elseif($partesURL[0] == "logout") {
    
            $controllerUser->logout();
        }
        elseif($partesURL[0] == "verify") {
            $controllerUser->verifyUser();
        }
        
    }
}