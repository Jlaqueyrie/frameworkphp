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
        // $this->conndb->query('SELECT * FROM posts');
        $this->conndb->query('SELECT *,
                             posts.id as postId,
                             users.id as userId,
                             posts.created_at as postDate,
                             users.created_date as userDate
                             FROM posts
                             INNER JOIN users
                             ON posts.user_id = users.id
                             ORDER BY posts.created_at DESC
                             ');
        $resultPosts = $this->conndb->getDataSet();

        return $resultPosts;
    }

    public  function getPostById($id_article){
        $this->conndb->query('SELECT * FROM posts WHERE id=:sql_req_id');
        $this->conndb->bind('sql_req_id', $id_article);
        $row = $this->conndb->getSingleData();
        //que faire si l'id n'existe pas?
        return $row;
    }

    public function updatePost($data){
        $this->conndb->query('UPDATE posts SET title=:sql_req_title, content=:sql_req_content WHERE id=:sql_req_id');

        $this->conndb->bind(':sql_req_title', $data['title']);
        $this->conndb->bind(':sql_req_content',$data['content']);
        $this->conndb->bind( ':sql_req_id', $data['id']);

        if($this->conndb->execute()){
            return true;
        }
        else{
            return true;
        }
    }
    public function deletePost($id){
        $this->conndb->query ('DELETE FROM posts WHERE id=:id');
        $this->conndb->bind(':id', $id);
        
        if($this->conndb->execute()){
            return true;
        }
        else{
            return false;
        }
    
    }
    public function getPostByAuthor($id_author){
        $this->conndb->query('SELECT * FROM posts WHERE user_id=:sql_req_author_id');
        $this->conndb->bind(':sql_req_author_id', $id_author);

        if($this->conndb->execute()){
            $result = $this->conndb->getDataSet();
            return $result;
        }
        else{
            return false;
        }

    }
}