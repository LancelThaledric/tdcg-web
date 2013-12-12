<?php
/*
    Barre werticale des widgets
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        
*/
if($_SESSION['current_user']->isConnected())
    $£logbox = getRender('ctrl/inc/userbox.php');
else
    $£logbox = getRender('ctrl/inc/loginform.php');

//render

require 'tpl/inc/sidebar.php';

?>