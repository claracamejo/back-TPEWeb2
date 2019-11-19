<?php

class librosModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=biblioteca_virtual;charset=utf8','root','');
    }

    function getLibros(){
        $sentencia = $this->db->prepare("SELECT lib.id_libro, lib.titulo, aut.apellido, aut.nombre, lib.genero, lib.valoracion FROM libros lib INNER JOIN autores aut ON lib.id_autor = aut.id_autor");
        $sentencia->execute();
        $libros = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $libros;  
    }

    function agregarLibro($titulo,$autor,$genero, $anio, $valoracion, $resenia, $imagen){
        $sentencia=$this->db->prepare("INSERT INTO libros(titulo, id_autor, genero, anio, valoracion, resenia, imagen) 
        VALUES(?,?,?,?,?,?,?)");
        $sentencia->execute([$titulo,$autor,$genero, $anio, $valoracion, $resenia, $imagen]);
        return $this->db->lastInsertId();
    }

    function eliminarLibro($id){
        $sentencia = $this->db->prepare("DELETE FROM `libros` WHERE `libros`.`id_libro` = ?");
        $sentencia->execute(array($id));
    }
    
    function editarLibro($id,$titulo,$autor,$genero, $anio, $valoracion, $resenia,$imagen){
        $sentencia = $this->db->prepare("UPDATE libros SET titulo=?, id_autor=?, genero=?, anio=?, valoracion=?, resenia=?, imagen=? WHERE id_libro=?");
        $sentencia->execute(array($titulo,$autor,$genero, $anio, $valoracion, $resenia,$imagen,$id));
       // var_dump($id); die;

    }
    function getLibro($id){
        $query = $this->db->prepare('SELECT lib.id_libro, lib.titulo, aut.apellido, aut.nombre, lib.genero, lib.anio, lib.resenia, lib.valoracion, lib.imagen FROM libros lib INNER JOIN autores aut ON lib.id_autor = aut.id_autor WHERE id_libro = ?');
        $query->execute([$id]);
        $libro = $query->fetch(PDO::FETCH_OBJ);
        return json_decode(json_encode($libro), True);
    }

    function ordenar($id){
        $sentencia = $this->db->prepare("SELECT * FROM libros WHERE id_autor = ?");
        $sentencia->execute(array($id));
        $orden = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $orden;
    }
    
}



