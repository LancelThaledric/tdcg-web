<?php
/*
    Entete du site + menu principal
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
*/

$£js_leveltoolbar = genlink('ressource/js/leveltoolbar.js');

//render

require 'tpl/inc/leveltoolbar.php';

?>