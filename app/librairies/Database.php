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
                dbname='.$this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE=>PDO::ATTR_ERRMODE_EXCEPTION);


        //créer la connection pdo 

        try{
            $this->dbh = new PDO($dns, $this->user, $this->password, $options);
        }
        catch(PDOException $e){
            $this->error = $e ->getMessage();
            printf("erreur connecteur PDO : %s", $e);

        }
    }
}