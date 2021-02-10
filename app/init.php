<?php
session_start();
require_once '../app/config/config.php';
require_once '../app/helpers/userHelpers.php';
require_once '../app/helpers/sessionHelper.php';

spl_autoload_register(function($classname){
    require_once 'librairies/'.$classname.'.php';
    });