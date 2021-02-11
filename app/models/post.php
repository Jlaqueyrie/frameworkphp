<?php

class Post {
    // déclaration de l'objet handle conn bdd
    private $conndb;

    public function __construct(){
        //instanciation d'une handle pour la conn bdd
        //ajout des attribut de gestion des erreurs et warnings
            $this-> conndb = new Database;
    }
    public function setPostDataInBdd($postData){
        try{
            //préparation de la requête INSERT de l'article avec les données traité par le controleur
            $this->conndb->query('INSERT INTO posts(user_id,title, content) VALUES(:sql_req_author,:sql_req_title,:sql_req_content)');
            //liaison des paramètres données d'entrée article aux paramètre de la requête
            $this->conndb->bind(':sql_req_author', $postData['author']);
            $this->conndb->bind(':sql_req_title', $postData['title']);
            $this->conndb->bind(':sql_req_content', $postData['articleContent']);
            //execution de la requête
            if($this->conndb->execute()){
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
    public function getPostDataFrombdd(){
        $this->conndb->query('SELECT * FROM posts');
        $resultPosts = $this->conndb->getDataSet();

        return $resultPosts;
    }
}