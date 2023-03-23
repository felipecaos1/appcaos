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

}