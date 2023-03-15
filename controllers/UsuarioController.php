<?php

class UsuarioController{

    public function dashboard(){
        helper::isUserLogued();
        require_once 'views/layouts/page.php';
    }

    public function login(){
        
        require_once 'views/user/login.php';
    }

}