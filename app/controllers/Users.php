<?php

class Users extends Controller{
    public function __construct()
    {
        
    }
    public function register(){
        //nettoyage donnée $_POST
        $_POST = filter_input_array(FILTER_SANITIZE_STRING);
        //control si le formulaire a appelé la méthode post
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
       //validation formulaire    
           $data=[
               'name' => trim($_POST['f_u_name']),
               'email'=>trim($_POST['f_u_email']),
               'password'=>trim($_POST['f_u_password']),
               'confirm_password'=>trim($_POST['f_u_password']),
               'err_name'=>'',
               'err_email'=>'',
               'err_password'=> '',
               'err_confirm_password'=>''];

            //validation champ vide
            if(empty($data['nom'])){
                $data['err_name'] = "compléter le nom";
            }
            if(empty($data['email'])){

                $data['err_email'] = "comptéter l'email";
            }
            if(empty($data['password'])){

                $data['err_password'] = "password vide, merci de compéter";
            }
            elseif(strlen($data['password']) < 8){
                $data['err_password'] = "password doit être supérieur à 8 caractères";
            }
            if(empty($data['confirm_password'])){

                $data['err_confirm_password'] = "confirmation password vide, merci de compéter";

                if($data['password'] != $data['confirm_password']){
                    $data['err_confirm_password'] = "les mot de passe de sont pas identique";
                }
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
        $_POST = filter_input_array(FILTER_SANITIZE_STRING);
        //control si le formulaire a appelé la méthode post
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
       //validation formulaire    
           $data=[
               'email'=>trim($_POST['f_u_email']),
               'password'=>trim($_POST['f_u_password']),
               'err_email'=>'',
               'err_password'=> ''];

            //validation champ vide
            if(empty($data['email'])){

                $data['err_email'] = "comptéter l'email";
            }
            if(empty($data['password'])){

                $data['err_password'] = "password vide, merci de compéter";
            }
            //gestion des erreurs
            if(empty($data['err_email'])&&empty($data['err_password'])){

            }
            else{
                $this->view('users\login', $data);

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
        //charement de la vue
            $this->view('users\login', $data);
       }
    }
}