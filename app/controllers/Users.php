<?php

class Users extends Controller{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function register(){
        //nettoyage donnée $_POST
        
        //control si le formulaire a appelé la méthode post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //validation formulaire    
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

           $data=[
               'name' => trim($_POST['f_u_name']),
               'email'=>trim($_POST['f_u_email']),
               'password'=>trim($_POST['f_u_password']),
               'confirm_password'=>trim($_POST['f_u_password_conf']),
               'err_name'=>'',
               'err_email'=>'',
               'err_password'=> '',
               'err_confirm_password'=>''];

            //validation champ vide
            if(empty($data['name'])){
                $data['err_name'] = "compléter le nom";
            }
            if(empty($data['email'])){

                $data['err_email'] = "comptéter l'email";
            }
            else{
                if($this->userModel -> findUserByEmail($data['email'])){
                    $data['err_email'] = "adresse email déjà utilisé";
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
            if(empty($data['err_name']) && empty($data['err_email']) &&empty($data['err_password'])&&empty($data['err_confirm_password'])){
                //pas d'erreur après control
                //chiffrage mdp et validation formulaire
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if($this->userModel->setUserDataInBdd($data)){
                    redirect('users/login');
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
               'confirm_password'=>'',
               'err_name'=>'',
               'err_email'=>'',
               'err_password'=> '',
               'err_confirm_password'=>'',
           ];
       }
        $this->view('users\register', $data);
    }
    public function login(){
        //control si le formulaire a appelé la méthode post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //validation formulaire    
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
            'email'=>trim($_POST['f_u_email']),
            'password'=>trim($_POST['f_u_password']),
            'err_email'=>'',
            'err_password'=>''];

            //validation champ vide
            if(empty($data['email'])){
                $data['err_email'] = "comptéter l'email";
            }
            if(empty($data['password'])){
                $data['err_password'] = "password vide, merci de compéter";
            }
            //verification email !!continue l'execution même si $data['email'] est vide
            if($this->userModel->findUserByEmail($data['email'])){
                
            }
            else{
                $data['err_email']= "adresse email non enregistré en base de donnée";
            }

            //gestion des erreurs
            if(empty($data['err_email'])&&empty($data['err_password'])){
                $isCredentialValid = $this->userModel->checkCredential($data['email'], $data['password']);
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
               'email'=>'',
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
        redirect('pages/index');
    }
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isUserLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }
        else{
            return false;
        }
    }
}