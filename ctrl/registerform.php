<?php
/*
    Page d'accueil du site.
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        
*/

require_once 'mdl/account.php';

if($_SESSION['current_user']->isConnected()){
    $_SESSION['msg'][] = 'Vous êtes déjà connecté, normalement vous n\'avez pas besoin de vous inscrire.<br/>Mais comme on est gentils, on vous laisse créer un compte quand même, pour un ami.';
}



$£msgbox = getrender('ctrl/inc/msg.php');

$£header = getrender('ctrl/inc/header.php');
$£sidebar = getrender('ctrl/inc/sidebar.php');
$£footer = getrender('ctrl/inc/footer.php');

$£registerscripturl = genlink('/register/newaccount/');
//render

require 'tpl/registerform.php';

?>