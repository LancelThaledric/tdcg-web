<?php
/*
    Entete du site + menu principal
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        
*/

$£link_Jouer = genlink('/play/');
if(!$_SESSION['current_user']->isConnected())
    $£link_Jouer = genlink('/register/');
    
$£link_Accueil = genlink('/');
$£link_Forum = genlink('/forum/');
$£link_Contact = genlink('/contact/');

//render
require 'tpl/inc/header.php';

?>