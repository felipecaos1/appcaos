<?php
class usuario{

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $contraseña;
    private $rol;
    private $imagen_url;

    private $db;

    public function __construct()
    {
        $this->db = DataBase::connect();
    }


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;

        return $this;
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
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $this->db->real_escape_string($apellido);

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }

    /**
     * Get the value of contraseña
     */ 
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * Set the value of contraseña
     *
     * @return  self
     */ 
    public function setContraseña($contraseña)
    {
        $this->contraseña = password_hash($this->db->real_escape_string($contraseña),PASSWORD_BCRYPT,['cost'=>4]);

        return $this;
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get the value of imagen_url
     */ 
    public function getImagen_url()
    {
        return $this->imagen_url;
    }

    /**
     * Set the value of imagen_url
     *
     * @return  self
     */ 
    public function setImagen_url($imagen_url)
    {
        $this->imagen_url = $imagen_url;

        return $this;
    }


    public function save(){
       try{

           $save = $this->db->query("INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getContraseña()}','{$this->getRol()}',NULL);");
           
           $user = $this->db->query("SELECT * FROM usuarios WHERE email='{$this->getEmail()}';");
           
           if($user && $user->num_rows==1){

               $result = $user->fetch_object();
           }else{
            $result =false;
           }


        }catch(Exception $e){
           
            $result = false;
        }
        
        return $result;
    }

    public function login($pass){

        $user =$this->db->query("SELECT * FROM usuarios WHERE email = '{$this->getEmail()}';");

        if($user && $user->num_rows==1){
            $datos =  $user->fetch_object();
          

            $verify = password_verify($pass, $datos->password);
            $result= false;

            if($verify){
              
                return $datos;
            }else{
                return $result; 
            }
        }
    }
}