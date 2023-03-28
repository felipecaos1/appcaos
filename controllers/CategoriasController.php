<?php
require_once 'models/categoria.php';
class categoriasController{

    public function gestion(){
        helper::isUserLogued();

        $categorias =new categoria();
        $lista_categorias = $categorias->getAll();
        require_once 'views/notas/gestion-categorias.php';
    }

    public function guardar(){
        helper::isUserLogued();
        if(isset($_POST)){

            $nombre = isset($_POST['nombre'])? $_POST['nombre'] : false;

            if($nombre){
                $categoria = new categoria();
                $categoria->setNombre($nombre);

                $result = $categoria->save();

                if($result){
                    $_SESSION['guardar_categoria']='complete';
                }else{
                    $_SESSION['guardar_categoria']='failed';
                }
                
            }else{
                $_SESSION['guardar_categoria']='failed';
            }


        }else{
            $_SESSION['guardar_categoria']='failed';
        }

        header('location:'.BASE_URL.'categorias/gestion');
    }

    public function delete(){
        helper::isUserLogued();

        if(isset($_GET)){

            $id = isset($_GET['id'])? $_GET['id'] : false;
    
            if($id){
                $categoria = new categoria();
                $categoria->setId($id);
    
                $result = $categoria->delete();
    
                if($result){
                    $_SESSION['delete']='complete';
                }else{
                    $_SESSION['delete']='Failed';
                }
            }
    
        }
        header('location:'.BASE_URL.'categorias/gestion');
    }

    
}