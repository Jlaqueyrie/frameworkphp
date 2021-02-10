<?php

class User{
    //connexion à la base de donnée
                
    private $h_db;

    public function __construct(){
        $this -> h_db  = new Database;
    }
    //sauvegarde info utilsiateur en bdd
    public function setUserDataInBdd($data){
        //préparation de la requête
        try{
            $this->h_db->query('INSERT INTO users(name,pseudo,email,password) VALUES(:sql_req_name,:sql_req_pseudo,:sql_req_email,:sql_req_password)');
            //liés les info utilisateur à celle de la requête
            $this->h_db->bind(':sql_req_name', $data['name']);
            $this->h_db->bind(':sql_req_pseudo', $data['pseudo']);
            $this->h_db->bind(':sql_req_email', $data['email']);
            $this->h_db->bind(':sql_req_password', $data['password']);
            //execution de la requête:w
            
            if($this->h_db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        catch(Exception $e){
            die('Erreur sauvegarde utilisateur:'.$e->getMessage());
        }
    }
    public function findUserById($i_id, $auth_type){
        //préparation de la requête en fonction du type d'identifiant passé
        switch ($auth_type){
            case "Email":
                // die('Email');
                $this->h_db ->query("SELECT * FROM users WHERE email = :sql_req_id");
                break;
            case "Pseudo":
                // die('Pseudo');
                $this->h_db ->query("SELECT * FROM users WHERE pseudo = :sql_req_id");
                break;
        }
        //bind des entrées
        $this->h_db->bind(':sql_req_id',$i_id);
        //execution de la requête et stockage de la retournées
        $row = $this->h_db->getSingleData();
        //contage du nombre de ligne
        if($this->h_db->countRow() > 0) {
            return true;
        }
        else{
           return false; 
        }
    }

    public function checkCredential($u_id, $auth_type, $u_password){
       //préparation requête
        switch ($auth_type){
            case "Email":
            $this->h_db->query('SELECT * FROM users WHERE email=:sql_req_id');
            break;
        case "Pseudo":
            $this->h_db->query('SELECT * FROM users WHERE pseudo=:sql_req_id');
            break;
        }
       //liaison des paramètres
       $this->h_db->bind(':sql_req_id', $u_id);
       //execution
       $row = $this->h_db->getSingleData();
       //déchifrage du mot de passe
       $hashed_password = $row -> password;
       if(password_verify($u_password,$hashed_password)){
           return $row;
       }
       else{
           return false;
       }

    }
}