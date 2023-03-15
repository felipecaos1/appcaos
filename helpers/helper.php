<?php

class helper{

    public static function isUserLogued(){

        if(!isset($_SESSION['user-logued'])){
            header('Location:'.BASE_URL.'usuario/login');
            die();
        }
    }

}