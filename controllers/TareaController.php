<?php
require_once 'models/tarea.php';
class tareaController{

    public function añadir(){
        helper::isUserLogued();

        if(isset($_POST)){

            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false; 
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false; 
            $categoria_id = isset($_POST['categoria']) ? $_POST['categoria'] : false; 

            $usuario_id = isset($_SESSION['identity']) ? $_SESSION['identity']->id :false;

            
            if($titulo && $descripcion &&$categoria_id && $usuario_id){

                $tarea = new tarea();

                $tarea->setUsuario_id($usuario_id);
                $tarea->setCategoria_id($categoria_id);
                $tarea->setTitulo($titulo);
                $tarea->setDescripcion($descripcion);
                $tarea->setEstado('publicada');
                $tarea->setImagen(null);

                
                $result = $tarea->añadir();

                if($result){

                    $_SESSION['añadir-nota']=true;

                }else{
                    $_SESSION['añadir-nota']=false;
                }

            }else{
                $_SESSION['añadir-nota']=false;
            }


        }else{
            $_SESSION['añadir-nota']=false;
        }

        
        header('location:'.BASE_URL.'usuario/dashboard');
    }

    public function eliminar(){
        helper::isUserLogued();

        if(isset($_GET)){

            $id = isset($_GET['id']) ? $_GET['id']:false;

            if($id){

                $tarea = new tarea();
                $tarea->setId($id);
                $result = $tarea->delete();

                if($result){
                    $_SESSION['nota-eliminacion']='completed';
                }else{
                    $_SESSION['nota-eliminacion']='failed';
                }


            }else{
                // redirigir
                $_SESSION['nota-eliminacion']='failed';
            }


        }else{
            // redirigir
            $_SESSION['nota-eliminacion']='failed';
        }
        
     
        header('location:'.BASE_URL.'usuario/dashboard');

    }

    public function papelera(){
        helper::isUserLogued();

        $lista_tareas = helper::getTareas('papelera');
        
        require_once 'views/notas/papelera.php';
    }

}