<?php
/*
    Liste des niveaux disponibles par le joueur
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        
*/

$levellist = Level::getLevelList($_SESSION['current_user']->idaccount());

//On créé l'array des niveaux à lister. (Deux catégories : finished et available)
$£levels = array();
$£levels['finished'] = array();
$£levels['available'] = array();

foreach($levellist as $level){
    if($level['state'] == LevelUserState::VALIDATED) $£levels['finished'][] = $level;
    elseif($level['state'] != LevelUserState::UNAVAILABLE) $£levels['available'][] = $level;
}

//render

require 'tpl/inc/levellist.php';

?>