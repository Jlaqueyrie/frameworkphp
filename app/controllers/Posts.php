<?php

class Posts extends Controller{

    public function __construct(){
        if(!isUserLoggedIn()){
            redirect('users/login');
        }
        else{
            //instanciation du modèle "post" pour la gestion de la com bdd pour le controler Posts
            $this->userModel = $this->model('post');
        }
    }

    public function index(){
        $data = [];

        //chargement page
        $this->view('posts/index', $data);
        
    }

    public function addPost(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //ajout article en bdd
            //structure de stockage des informations lié à l'article
            $dataPost = [
                "title" => $_POST["f_u_title"],
                "author" => $_SESSION["user_name"],
                "articleContent" => $_POST["f_u_content"],
                "err_title" => "",
                "err_articleContent"=>""
            ];
            //control champ vide
            if(empty($dataPost['title'])){
                $dataPost['err_title'] = "veuillez donner un titre à l'article";
            }
            if(empty($dataPost['articleContent'])){
                $dataPost['err_articleContent'] = "compléter l'article à publier";
            }
            //si aucun champ vide dans le formualaire
            if(empty($dataPost['err_title']) && empty($dataPost['err_articleContent'])){
                if($this->postModel->setPostDataInBdd($dataPost)){
                    //redirection vers la page d'affichages des articles
                    redirect('posts/index');
                }
                else{
                    //chargement de la vue avec les erreurs de sauvegarde
                    print("erreur de sauvegarde de l'article en base de donnée");
                }
            }
        }
        else{
            //affichage du formulaire vide pour ajout article
            $dataPost = [
                "title" => "",
                "author" => "",
                "articleContent" =>"" ,
                "err_title" => "",
                "err_content"=>""
            ];
        }
    }
}