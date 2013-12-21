<?php
/*
    LEVEL 4
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        
*/

header('HTTP/1.0 418 I\'m a teapot');
header('Solution:'.$_SESSION['level']->solution());

$£msgbox = getrender('ctrl/inc/msg.php');

//render

require 'tpl/levels/lvl5/index.php';

?>