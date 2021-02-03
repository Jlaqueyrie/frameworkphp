<?php

class Users extends Controller{

    public function register(){
    //    echo 'inscription debug' ;
    //chargement de la vue
        $data = ['title' =>"s'enregistrer"];
        $this->view('users\register', $data);
    }
    public function login(){
    //    echo 'login debug' ;
    //chargement de la vue
        $data = ['title' =>"se logguer"];
        $this->view('users\register', $data);
    }
}