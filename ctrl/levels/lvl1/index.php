<?php
/*
    LEVEL 1
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        
*/

require_once 'mdl/account.php';

$£msgbox = getrender('ctrl/inc/msg.php');

$£header = getrender('ctrl/inc/header.php');
$£sidebar = getrender('ctrl/inc/sidebar.php');
$£footer = getrender('ctrl/inc/footer.php');

$£register_link = genlink('/register/');

//render

require 'tpl/levels/lvl1/index.php';

?>