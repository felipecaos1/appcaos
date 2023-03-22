<?php

class UsuarioController{

    public function dashboard(){
        helper::isUserLogued();
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
            var_dump($_POST);
        }
    }

}