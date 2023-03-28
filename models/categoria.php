<?php

class categoria{


    private $id;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = DataBase::connect();
    }


    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function save(){

        $guardar = $this->db->query("INSERT INTO categorias VALUES(null,'{$this->nombre}');");

        $result= false;

        if($guardar){
            $result = true;
        }
        return $result;

    }
    public function getAll(){
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY nombre ASC");
        return $categorias;
    }

    public function delete(){
        try{
            
            $delete = $this->db->query("DELETE FROM categorias WHERE id = {$this->id};");
            
            $result = true;
         }catch(Exception $e){
            
            $result = false;
         }
         
         return $result;

    }
}