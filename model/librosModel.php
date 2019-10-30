<?php

class librosModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_virtual;charset=utf8','root','');
    }

    function getLibros(){
        $sentencia = $this->db->prepare("SELECT lib.id_libro, lib.titulo, aut.apellido, aut.nombre, lib.genero, lib.valoracion FROM libro lib INNER JOIN autor aut ON lib.id_autor = aut.id_autor");
        $sentencia->execute();
        $libros = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $libros;  
    }
    function agregar($titulo,$autor,$genero, $anio, $valoracion, $resenia){//tengo que tereminar este

        $sentencia=$this->db->prepare('INSERT INTO libro(titulo, autor, genero, año, valoracion, reseña) values(??????)');
        $sentencia->execute([$titulo,$autor,$genero, $anio, $valoracion, $resenia]);
        
        return $this->db->lastInsertId();
    }

    function eliminarLibro($id){
        $sentencia = $this->db->prepare("DELETE FROM `libro` WHERE `libro`.`id_libro` = ?");
        $sentencia->execute(array($id));
    }

    function changeLibro($id,$titulo,$autor,$genero, $anio, $valoracion, $resenia){
            //no termine todavia de hacer esta funcion 
        $sentencia = $this->db->prepare('UPDATE `libro` SET `titulo` = ?, `año` = ?, `genero` = ?, `reseña` = ?, `valoracion` = ? WHERE `libro`.`id_libro` = ? AND `libro`.`id_autor` = ?;');
        $sentencia->execute([$id,$titulo,$autor,$genero, $anio, $valoracion, $resenia]);

    }
    function getLibro($id){
        $query = $this->db->prepare('SELECT lib.id_libro, lib.titulo, aut.apellido, aut.nombre, lib.genero, lib.anio, lib.resenia, lib.valoracion FROM libro lib INNER JOIN autor aut ON lib.id_autor = aut.id_autor WHERE id_libro = ?');
        $query->execute([$id]);
        $libro = $query->fetch(PDO::FETCH_OBJ);
        return json_decode(json_encode($libro), True);
    }

    function categorias(){
        $query = $this->db->prepare('SELECT lib.*, aut.* FROM libro lib INNER JOIN autor aut ON lib.id_autor = aut.id_autor');
        $query->execute();
        $libros = $query->fetchAll(PDO::FETCH_ASSOC);

        return $libros; 
    }
    
}



