<?php

class Pages extends Controller{

    public function __construct(){
        // printf('Page trouvé');
        $this->postModel = $this->model('Post');
    }

    public function index(){
        $data = ['title'=>'bienvenue sur index'];
        $this->view('pages\index',$data);
    }

    public function contact(){
        $data = ['title'=>'bienvenue sur contact'];
        $this->view('pages\contact',$data);
    }
}