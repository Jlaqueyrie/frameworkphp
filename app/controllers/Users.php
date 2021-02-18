<?php

class Users extends Controller{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->postModel = $this->model('Post');
    }
    public function register(){
        //example de destination
        
        //control si le formulaire a appelé la méthode post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //validation formulaire    
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $avatar_dest_dir = "C:\\xampp\htdocs\blogPOO\public\img\avatar\\".
           $data=[
               'name' => trim($_POST['f_u_name']),
               'email'=>trim($_POST['f_u_email']),
               'pseudo'=>trim($_POST['f_u_pseudo']),
               'password'=>trim($_POST['f_u_password']),
               'confirm_password'=>trim($_POST['f_u_password_conf']),
               'err_name'=>'',
               'err_email'=>'',
               'err_pseudo'=>'',
               'err_password'=> '',
               'err_confirm_password'=>''];

            //validation champ vide
            if(empty($data['name'])){
                $data['err_name'] = "compléter le nom";
            }
            if(empty($data['pseudo'])){

                $data['err_pseudo'] = "veuillez remplir le champ pseudo";
            }
            if(empty($data['email'])){

                $data['err_email'] = "comptéter l'email";
            }
            else{
                if($this->userModel -> findUserById($data['email'], "Email")){
                    $data['err_email'] = "adresse email déjà utilisé";
                }
            }
            if(empty($data['pseudo'])){

                $data['err_pseudo'] = "veuillez remplir le champ pseudo";
            }
            else{
                if($this->userModel -> findUserById($data['pseudo'], "Pseudo")){
                    $data['err_email'] = "adresse pseudo déjà utilisé";
                }
            }
            if(empty($data['password'])){

                $data['err_password'] = "password vide, merci de compéter";
            }
            elseif(strlen($data['password']) < 8){
                $data['err_password'] = "password doit être supérieur à 8 caractères";
            }

            if(empty($data['confirm_password'])){

                $data['err_confirm_password'] = "confirmation password vide, merci de compléter";
            }
            else{
                if($data['password'] != $data['confirm_password']){
                    $data['err_confirm_password'] = "les mots de passe de sont pas identiques";
                }
            }
            //control image avatar
            if(empty($data['err_name']) && empty($data['err_email']) && empty($data['err_pseudo']) && empty($data['err_password']) && empty($data['err_confirm_password'])){
                //pas d'erreur après control
                //chiffrage mdp et validation formulaire
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //envoi donnée au bdd pour sauvegarde bdd
                if($this->userModel->setUserDataInBdd($data)){
                    redirect('users\login');
                }
                else{
                    die('erreur');
                }
            }
            else{
                //affichage de la vue avec les erreurs
                $this->view('users\register', $data);
            }
       } 
       else{
           //donnée formulaire
           $data=[
               'name'=>'',
               'email'=>'',
               'password'=> '',
               'pseudo'=>'',
               'confirm_password'=>'',
               'err_name'=>'',
               'err_pseudo'=>'',
               'err_email'=>'',
               'err_password'=> '',
               'err_confirm_password'=>'',
           ];
       }
        $this->view('users\register', $data);
    }
    public function login(){
        //control si le formulaire a appelé la méthode post
        if($this->isLoggedIn()){
            redirect('page/index');
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //validation formulaire    
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
            'auth_type'=>$_POST['f_u_auth'],
            'id'=>trim($_POST['f_u_id']),
            'password'=>trim($_POST['f_u_password']),
            'err_id'=>'',
            'err_password'=>''];

            //validation champ vide
            if(empty($data['id'])){
                $data['err_id'] = "compléter l'identifiant";
            }
            if(empty($data['password'])){
                $data['err_password'] = "password vide, merci de compléter";
            }
            //verification de l'identifiant en base de donnée !!
            if($this->userModel->findUserById($data['id'], $data['auth_type'])){
                
            }
            else{
                $data['err_id']= "identifiant non enregistré en base de donnée";
            }

            //gestion des erreurs
            if(empty($data['err_id'])&&empty($data['err_password'])){
                $isCredentialValid = $this->userModel->checkCredential($data['id'],$data['auth_type'], $data['password']);
                if($isCredentialValid){
                    $this->createUserSession($isCredentialValid);
                    $this->view('user/login', $data);
                    }
                else{
                    $data['err_password'] = 'mdp incorect';
                    $this->view('users/login', $data);
                }
            }
            else{
                $this->view('users/login', $data);
            }
        }
        else{
           //donnée formulaire
           $data=[
               'id'=>'',
               'password'=> '',
               'err_email'=>'',
               'err_password'=> '',
           ];
        //chargement de la vue
            $this->view('users/login', $data);
       }
    }
    //méthode de création de la session
    public function createUserSession($obj_user){
        $_SESSION['user_id'] = $obj_user -> id;
        $_SESSION['user_email'] = $obj_user -> email;
        $_SESSION['user_name'] = $obj_user -> name;
        $_SESSION['user_role'] = $obj_user->id_role;
        redirect('index.php');
    }
    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }
        else{
            return false;
        }
    }
    public function isAdmin(){
        if(isset($_SESSION['user_role']) AND $_SESSION['user_role']==1){
            return true;
        }
        else{
            return false;
        }
    }
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        session_destroy();
        redirect('users/login');
    }

    public function author(){
        if(isset($_SESSION['user_name'])){
            //affiche les statistiques de l'auteur
            //recupère l'emplacement de l'avatar
            $data = [
                'src_img_avatar'=>"a path",
                'author_name' => $_SESSION['user_name'],
                'author_n_article'=>'',
                'author_posts'=>'',
                'description'=>''
            ];
            //recupère img avatar
            $data['src_img_avatar'] = $this->userModel->getUserAvatarById($_SESSION['user_id']);
            //récupère bio auteur
            $data['description'] = $this->userModel->getUserBiography($_SESSION['user_id']);
            //récupère nombre article utilisateur
            $data['author_n_article'] = $this->userModel->getNumberArticleById($_SESSION['user_id']);
            //réupère les articles à afficher de l'auteur

            $data['author_posts'] = $this->postModel->getPostByAuthor($_SESSION['user_id']);
            $this->view('users/author', $data);

        }
        else{
            //redirige vers la page de login
            redirect('users/login');
        }
    }
}