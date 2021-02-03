<?php

class Pages extends Controller{

    public function __construct(){
        // printf('Page trouvé');
        $this->postModel = $this->model('Post');
    }

    public function index(){
        $posts = $this->postModel->getPosts();

        $data = ['title'=>'bienvenue sur index',
                'posts'=>$posts];

        $this->view('pages\index',$data);
    }

    public function contact(){
        $data = ['title'=>'bienvenue sur contact'];
        $this->view('pages\contact',$data);
    }
}