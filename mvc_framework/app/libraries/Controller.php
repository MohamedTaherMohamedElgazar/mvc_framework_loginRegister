<?php

class Controller{
    // load model
    public function model($model){
        // require it
        require_once('../app/models/' . $model . '.php');
        // inatialize it
        return new $model;
    }


    // load view
    public function view($view, $data = []){
        if(file_exists('../app/views/' . $view . '.php')){
            // require it
            require_once('../app/views/' . $view . '.php');
        }else{
            die('view file does not exist');
        }
    }


}




?>