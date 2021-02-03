<?php

class Pages extends Controller{

    public function __construct(){
        // printf('Page trouvé');
    }

    public function index(){

        $data = ['title'=>'bienvenue sur le blog POO'];

        $this->view('pages\index',$data);
    }

    public function contact(){
        $data = ['title'=>'bienvenue sur contact'];
        $this->view('pages\contact',$data);
    }
}