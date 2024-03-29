<?php
require_once 'controller/librosController.php';
require_once 'controller/autoresController.php';
require_once 'controller/loginController.php' ;

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_libros", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/libros');
define("URL_autores", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/autores');
define("URL_login", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_logout", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

$controller = new  librosController();
$controllerA = new autoresController();
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
        elseif($partesURL[0] == "borrarImagen"){
            if(isset($partesURL[1])){
                $controller->deleteImagen($partesURL[1]);
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
                $controller->cambiarLibro($partesURL[1]);
            }
        }
        elseif($partesURL[0]=='autores'){
            $controllerA->autores();
        }
        elseif($partesURL[0] == "autor"){
            if(isset($partesURL[1])){
                $controllerA->traerAutor($partesURL[1]);
            }
        }
        elseif($partesURL[0] == "agregarAutor"){
            $controllerA->agregarAutor();
        }
        elseif($partesURL[0] == "editar"){  
            if(isset($partesURL[1])){
                $controllerA->cambiarAutor($partesURL[1]);
            }
        }
        elseif($partesURL[0] == "borrarImagenA"){
            if(isset($partesURL[1])){
                $controllerA->deleteImagenA($partesURL[1]);
            }
        }
        elseif($partesURL[0] == "insertar"){
            $controllerA->addAutor();
        }
        elseif($partesURL[0] == "borrarAutor"){
            $controllerA->deleteAutor($partesURL[1]);
        }
        elseif($partesURL[0] == "login") {
            $controllerUser->showLogin();

        }elseif($partesURL[0] == "logout") {
            $controllerUser->logout();
        }
        elseif($partesURL[0] == "verify") {
            $controllerUser->verifyUser();
        }
        elseif($partesURL[0] == "registro") {
            $controllerUser->registro();
        }
        elseif($partesURL[0] == "nuevoUsuario") {
            $controllerUser->nuevoUsuario();
        }
        elseif($partesURL[0] == "usuarios"){
            $controllerUser->mostrarUsuarios();
        }
        elseif($partesURL[0] == "editarUsuario"){
            $controllerUser->editarUsuario();
        }
        
        
    }
}