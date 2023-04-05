<?php

require_once 'models/usuario.php';

class UsuarioController{

    public function dashboard(){
        helper::isUserLogued();
        $lista_categoria = helper::getCategorias();
        $lista_tareas = helper::getTareas('publicada');
        
        require_once 'views/layouts/page.php';
    }

    public function login(){
        
        require_once 'views/user/login.php';
    }

    public function register(){
       
        require_once 'views/user/register.php';
    }

    public function registroSave(){

        if(isset($_POST)){
            
            $nombre = isset($_POST['nombre'])?$_POST['nombre']:'false';
            $apellido = isset($_POST['apellido'])?$_POST['apellido']:'false';
            $email = isset($_POST['email'])?$_POST['email']:'false';
            $password = isset($_POST['password'])?$_POST['password']:'false';

            if($nombre && $apellido && $email && $password){

                $usuario = new usuario();

                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($email);
                $usuario->setContraseña($password);
                $usuario->setRol('user');

                $resul = $usuario->save();
               
                if($resul){
                   
                    $_SESSION['registro']=true;
                    $_SESSION['identity']=$resul;
                    
                    header('location:'.BASE_URL.'usuario/dashboard');
                }else{
                  

                    $_SESSION['registro']=false;
                    header('Location:'.BASE_URL.'usuario/register');
                }

            }else{
                
                $_SESSION['registro']=false;
                header('Location:'.BASE_URL.'usuario/register');
            }

        }else{
           

            $_SESSION['registro']=false;
            header('Location:'.BASE_URL.'usuario/register');
        }
    }

    public function login_access(){

        if(isset($_POST)){
            $email = isset( $_POST['email'])?$_POST['email']:'false';
            $password= isset( $_POST['password'])?$_POST['password']:'flase';

            if($email && $password){

                $usuario = new usuario();

                $usuario->setEmail($email);
                $identity = $usuario->login($password);

                if($identity && is_object($identity)){
                    $_SESSION['identity'] = $identity;
                    
                    if($identity->rol == 'admin'){
                        $_SESSION['admin']=true;
                    }

                    header('location:'.BASE_URL.'usuario/dashboard');
                }else{
                $_SESSION['login'] = false;
                header('location:'.BASE_URL.'usuario/login');
                }

            }else{
                $_SESSION['login'] = false;
                header('location:'.BASE_URL.'usuario/login');
            }
        }else{
            $_SESSION['login'] = false;
            header('location:'.BASE_URL.'usuario/login');
        }

        
    }

    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header('Location:'.BASE_URL);
    }

}