<?php
/*
    Box de profil
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
*/

$£redirect_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$£logouturl = genlink('/logout/');

//render

require 'tpl/inc/userbox.php';

?>