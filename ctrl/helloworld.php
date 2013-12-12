<?php
/*
    Affiche un hello world avec nom optionnel en paramètre !
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        £name : le nom à afficher.
*/

var_dump($args);

if(!isset($args['name']))
    $args['name'] = 'world';
$£name = $args['name'];

//render
require 'tpl/helloworld.php';
?>