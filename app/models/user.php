<?php

class User{
    //connexion à la base de donnée
                
    private $h_db;

    public function __construct(){
        $this -> h_db  = new Database;
    }

    public function findUserByEmail($i_email){
        //préparation de la requête
        $this->h_db ->query("SELECT * FROM users WHERE email = :sql_req_email");
        //bind des entrées
        $this->h_db->bind(':sql_req_email',$i_email);
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
}