<?php
require_once('Router.php');
require_once('./api/biblioApiController.php');

 // CONSTANTES PARA RUTEO
 define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

 $router = new Router();

 // rutas
 $router->addRoute("/autores", "GET", "biblioApiController", "getAutores");
 $router->addRoute("/libros", "GET", "biblioApiController", "getLibros");

 //run
 $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 


