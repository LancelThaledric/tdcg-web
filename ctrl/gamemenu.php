<?php
/*
    Liste des niveaux disponibles + liens (jouer/rejouer, forum associé).
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    z
    params :
        
*/

require_once 'mdl/account.php';
require_once 'mdl/level.php';

protectForMembers('Vous devez vous connecter ou vous inscrire pour jouer. Vous auriez pu le deviner, non ?');

$£msgbox = getrender('ctrl/inc/msg.php');

$£header = getrender('ctrl/inc/header.php');
$£sidebar = getrender('ctrl/inc/sidebar.php');
$£footer = getrender('ctrl/inc/footer.php');


$£levellist = getrender('ctrl/inc/levellist.php');

//render

require 'tpl/gamemenu.php';

?>