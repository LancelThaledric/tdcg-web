<?php
/*
    Page contenant un niveau. Ces pages ne respectent pas le design, mais ont un dossier bien à elles.
    Ce controlleur charge le niveau d'après la clé envoyée en argument.
    Cette clé dépend du joueur : chacun d'eux a ses propres id de niveau et ses propres solutions de niveau.
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        $args['key'] la clé du niveau à charger.
*/

protectForMembers('Vous devez vous connecter ou vous inscrire pour jouer. Vous auriez pu le deviner, non ?');

//On regarde si l'utilisateur a le droit de jouer à ce level.
$level = new Level();
$level->loadLevelFromKey($args['key']);
if($level->isLoaded()){
    $_SESSION['level'] = $level;
    $£level = $level->getIncludeLevel();
    unset($_SESSION['level']);
}
else{
    $_SESSION['msg'][] = 'Ce niveau n\'est pas disponible pour vous. Ou bien il existe pas.';
    redirectPreviousPage();
}

$£msgbox = getrender('ctrl/inc/msg.php');
$£leveltoolbar = getrender('ctrl/inc/leveltoolbar.php');

//render

require 'tpl/level.php';

?>