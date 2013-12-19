<?php
/*
    Entete du site + menu principal
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
    £msg : array des messages.
*/

$£msg = $_SESSION['msg'];
$_SESSION['msg'] = array();


//render
if(!empty($£msg))
    require 'tpl/inc/msg.php';

?>