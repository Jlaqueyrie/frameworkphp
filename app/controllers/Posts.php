<?php

class Posts extends Controller{
    public function index(){
        $data = [];

        //chargement page
        $this->view('posts/index', $data);
        
    }
}