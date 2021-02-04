<?php
require_once '../app/config/config.php';
require_once '../app/helpers/userHelpers.php';

spl_autoload_register(function($classname){
    require_once 'librairies/'.$classname.'.php';
    });