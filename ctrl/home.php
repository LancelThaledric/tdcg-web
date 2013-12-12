<?php
/*
    Page d'accueil du site.
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        
*/

require_once 'mdl/account.php';

$£msgbox = getrender('ctrl/inc/msg.php');

$£header = getrender('ctrl/inc/header.php');
$£sidebar = getrender('ctrl/inc/sidebar.php');
$£footer = getrender('ctrl/inc/footer.php');

$£logintest = new Account();
$£logintest->login('sdgf', 'sdfg');

//render

require 'tpl/home.php';

?>