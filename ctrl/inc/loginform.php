<?php
/*
    Formulaire de connexion
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
    £redirect_url : url donnée pour la redirection
*/

$£redirect_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$£registerurl = genlink('/register/');
$£loginurl = genlink('/login/');

//render

require 'tpl/inc/loginform.php';

?>