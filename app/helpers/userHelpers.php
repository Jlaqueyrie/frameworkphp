<?php

//redirection de page

function redirect($page){
    header('Location:'.URLROOT.'/'.$page);
}