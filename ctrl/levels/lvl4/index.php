<?php
/*
    LEVEL 4
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        
*/

$£solutiontime = time() + (float)$_SESSION['level']->solution();
$£time = time();

$£msgbox = getrender('ctrl/inc/msg.php');

//render

require 'tpl/levels/lvl4/index.php';

?>