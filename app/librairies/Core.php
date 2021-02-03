<?php

/*
*Classe => noyau de l'app
*Création des urls et charge le controleur
*gestion du chemin des urls => controlers/méthod/paramètre
 */
class Core{

    //déclaration des paramètres de la class
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];
    //déclaration des méthodes

    public function __construct(){
        $url = $this->getUrl();
        // print_r($this->getUrl());
        if(file_exists('..\app\controllers\\'.ucwords($url[0]).'.php')){
            $this-> currentController = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '..\app\controllers\\'.$this->currentController.'.php';

        //on instancie le controleur ave la nouvelle valeur
        $this->currentController = new $this->currentController;

        //control si la méthode existe
        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //gestion des autres paramètre de l'url
        $this->params = $url? array_values($url) : [];
        //retourne le tableaux des paramètre
        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
    }


    public function getUrl(){
        if(isset($_GET['url'])){

            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}