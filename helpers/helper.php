<?php

class helper{

    public static function isUserLogued(){

        if(!isset($_SESSION['identity'])){
            header('Location:'.BASE_URL.'usuario/login');
            die();
        }
    }

    public static function delete_session($term){

        if(isset($_SESSION[$term])){
            unset($_SESSION[$term]);
        }

        return $term;

    }

    public static function getNoCategorias(){
        require_once 'models/categoria.php';

        $categoria = new categoria();

        $no_categorias = $categoria->getAll();

        $no_categorias = $no_categorias->num_rows;

        return $no_categorias;
    }

    public static function getCategorias(){
        require_once 'models/categoria.php';

        $categoria = new categoria();

        $categorias = $categoria->getAll();

        return $categorias;
    }


}