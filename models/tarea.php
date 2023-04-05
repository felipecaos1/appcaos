<?php

class tarea{

    private $id;
    private $usuario_id;
    private $categoria_id;
    private $titulo;
    private $descripcion;
    private $fecha;
    private $estado;
    private $imagen;

    private $db;

    public function __construct()
    {
        $this->db = DataBase::connect();
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

    /**
     * Get the value of usuario_id
     */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     *
     * @return  self
     */ 
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $this->db->real_escape_string($titulo);

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $this->db->real_escape_string($estado);

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function añadir(){

        try{
            $sql = "INSERT INTO tareas VALUES(null,{$this->getUsuario_id()},{$this->getCategoria_id()},'{$this->getTitulo()}','{$this->getDescripcion()}',CURDATE(),'{$this->getEstado()}','{$this->getImagen()}');";

            $añadir = $this->db->query($sql);
            $result=true;
        }catch(Exception $e){
            $result = false;
        }

        return $result;
    
    }

    public function getAll($estado){

        try{
            $sql = "SELECT t.*, c.nombre as cat_nombre FROM tareas t INNER JOIN categorias c WHERE t.usuario_id = {$this->getUsuario_id()} AND c.id = t.categoria_id AND t.estado='{$estado}' ORDER BY t.id DESC;";

            $tareas = $this->db->query($sql);
            
            return $tareas;

        }catch(Exception $e){
            
            return false;
        }
    }

    public function delete(){

        $sql="SELECT estado FROM tareas WHERE id = {$this->id}";

        $resul = $this->db->query($sql);
        $tarea =  $resul->fetch_object();

        $final_resul=false;

        if($tarea->estado === 'publicada'){
            $sql = "UPDATE tareas SET `estado`='papelera' WHERE id = {$this->id}";
            $resul = $this->db->query($sql);
            if($resul){
                $resul=true;
            }

        }elseif($tarea->estado === 'papelera'){
            $sql = "DELETE FROM `tareas` WHERE id = {$this->id}";
            $resul = $this->db->query($sql);
            if($resul){
                $resul=true;
            }
        }else{
            // manejo error
        }

        return $final_resul;
    }
}