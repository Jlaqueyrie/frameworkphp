<?php

class Users extends Controller{
    public function __construct()
    {
        
    }
    public function register(){
    //chargement de la vue
        $data = ['title' =>"s'enregistrer"];
        $this->view('users\register', $data);
        
    }
    public function login(){
    //chargement de la vue
        $data = ['title' =>"se logguer"];
        $this->view('users\register', $data);
    }
}