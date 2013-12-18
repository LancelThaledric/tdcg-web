<?php
/*
    Page d'accueil du site.
    
    CONVENTION : les variables utilisées dans le template commencent par '£'.
    PS : du coup les fichiers doivent être impérativement encodées en UTF8 sans BOM.
    
    params :
        
*/

require_once 'mdl/account.php';
//require_once 'mdl/forum_category.php';

$£msgbox = getrender('ctrl/inc/msg.php');

$£header = getrender('ctrl/inc/header.php');
$£sidebar = getrender('ctrl/inc/sidebar.php');
$£footer = getrender('ctrl/inc/footer.php');

//forum
//$categories = ForumCategory::getAll();
//debug($categories, 'cat');


//render

require 'tpl/forumindex.php';

?>