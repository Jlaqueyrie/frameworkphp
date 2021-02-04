<?php

/*
controlleur qui charge les modèle et les vues
*/

class Controller{
    //chargement modèle (communication des données)
    public function model($model){
        //chemin vers le modèle
        require_once '..\app\models\\'.$model.'.php';

        return new $model;
    }
    //chargement vue

    public function view($view, $data = []){
        if(file_exists('..\app\views\\'.$view.'.php')){
            require_once '..\app\views\\'.$view.'.php';
        }
        else{
            print('..\app\views\\'.$view.'.php');
            die("la vue n'existe pas");
        }


    }
}