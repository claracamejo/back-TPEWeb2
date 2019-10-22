<?php

class librosModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_virtual;charset=utf8','root','');
    }

    function getLibros(){
        $sentencia = $this->db->prepare("select * from libro");
        $sentencia->execute();
        $libros = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $libros;
        
    }
    function addLibros(){

    }

    function deleteLibro($id){
        $sentencia = $this->db->prepare("DELETE FROM libro WHERE id=?");
        $sentencia->execute(array($id));

    }

    function changeLibro($id){

    }
    

}



