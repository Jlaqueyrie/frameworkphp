<?php

/* classe bdd avec pdo
* Conencteur bdd
*sécurité des données
*retour des résultat
*/


class Database{
    //attributs
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $dbName = DB_NAME;
    //handle bdd
    private $dbh;
    //autres
    private $statement;
    private $error;

    public function __construct(){
        //déclaration (dns)

        $dns = 'mysql:host='.$this->host.';
                dbname='.$this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);


        //créer la connection pdo 

        try{
            $this->dbh = new PDO($dns, $this->user, '', $options);
        }
        catch(PDOException $e){
            $this->error = $e ->getMessage();
            printf("erreur connecteur PDO : %s", $e);

        }
    }
    //préparation des requêtes
    public function query($sql){
        $this->statement = $this-> dbh->prepare($sql);
    }
    public function bind($param, $value, $type=null){
        if(is_null($type)){
            switch (true){

                case is_int($value):

                    $type = PDO::PARAM_INT;
                    break;

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                
                default :
                    $type = PDO::PARAM_STR;
            }
            
        }
        $this-> statement -> bindValue($param,$value, $type);
    }
    //executer la commande préparé
    public function execute(){
        return $this->statement->execute();
    }
    //retourner les lignes d'une table dans un tableaux d'objet
    public function getDataSet(){
        $this->execute();

        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }
    //retourne une suel ligne du jeux
    public function getSingleData(){
        $this->execute();

        return $this->statement->fetch(PDO::FETCH_OBJ);
    }
    //retourne un nombre de ligne
    public function countRow(){

        return $this->statement->rowCount();
    }
}