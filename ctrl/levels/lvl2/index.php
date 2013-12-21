<?php
/*
    LEVEL 2
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        
*/

require_once 'mdl/account.php';
$£msgbox = getrender('ctrl/inc/msg.php');

//render

require 'tpl/levels/lvl2/index.php';

?>