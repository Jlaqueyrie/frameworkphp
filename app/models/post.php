<?php

class post {
    // déclaration de l'objet handle conn bdd
    private $h_db;

    private function _construct(){
        //instaciation d'une handle pour la conn bdd
        //ajout des attribut de gestion des erreurs et warnings
        try{
            $this->h_bdd = new Database;
            $this->h_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            printf("erreur de connexion à la base de donnée : %s", $e->getMessage());
        }
    }
    public function setPostDataInBdd($postData){
        try{
            //préparation de la requête INSERT de l'article avec les données traité par le controleur
            $this->h_db->query('INSERT INTO posts(user_id,title, content) VALUES(:sql_req_author,:sql_req_title,:sql_req_content)');
            //liaison des paramètres données d'entrée article aux paramètre de la requête
            $this->h_db->bind(':sql_req_author', $postData['author']);
            $this->h_db->bind(':sql_req_title', $postData['title']);
            $this->h_db->bind(':sql_req_content', $postData['content']);
            //execution de la requête
            if($this->h_db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        //control erreur
        catch(PDOException $e){
            printf("Erreur d'execution de la requête insertion post - erreur : %s", $e->getMessage());
        }

    }
}