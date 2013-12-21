<?php
/*
    LEVEL 3
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        
*/

//tirée de la doc php
function shuffle_assoc(&$array) {
    $keys = array_keys($array);

    shuffle($keys);

    foreach($keys as $key) {
        $new[$key] = $array[$key];
    }

    $array = $new;

    return true;
}

$classes = array(
    'eppdieaq',
    'pelldmed',
    'ieivnsff',
    'oieruohg',
    'apozivxf',
    'zpeofvsf',
    'zsdpgibj',
    'apozisfd',
    'qsdfghja',
    'oiojieoj'
);

$solution = str_split($_SESSION['level']->solution());

$£tabsolution = array();
$limit = count($solution);
for($i = 0; $i<$limit ; ++$i){
    $key = $classes[$i];
    //var_dump($key);
    $£tabsolution[$key] = $solution[$i];
}
// $tabsolution : md5(i) => chiffre de la solution

shuffle_assoc($£tabsolution);
//var_dump($£tabsolution);


$£msgbox = getrender('ctrl/inc/msg.php');
//render

require 'tpl/levels/lvl3/index.php';

?>