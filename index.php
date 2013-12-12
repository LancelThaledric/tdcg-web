<?php
/*
        index.php
    portail d'entrée du site. C'est toujours ce fichier qui est appelé quelque soit l'url donnée.
*/

require_once 'kernel/config.php';
require_once 'kernel/kernel.php';
require_once 'kernel/routes.php';

require_once 'mdl/account.php';
require_once 'mdl/level.php';

// session_start sécurisé
$sessid = session_id();
    if(empty($sessid))
        session_start();
session_regenerate_id();
// --

//routing : on cherche la page demadée par le visiteur d'après l'url, on l'incluera plus tard.
$uri = preg_replace('#^'.C::site_root_uri.'(.*)$#', "$1", $_SERVER['REQUEST_URI']);
$inc = routing($uri, $routes, $default_route, $args);

//Inisitalisation de l'utilisateur connecté. Si la session n'est aps présente, créée un visiteur en mémoire.
if(!isset($_SESSION['current_user'])) $_SESSION['current_user'] = new Account();

//Création de l'array où seront enregistrés les logs utilisateurs, affichés de page en page dès que cela est possible. Leur affichage ets géré dans le contrôleur inc/msg.php
if(!isset($_SESSION['msg'])) $_SESSION['msg'] = array();

//Var_dump de debug
/**///Ne pas faire confiance à ['redirect_url'], la valeur affichée est la valeur de la page précédente. La nouvelle valeur est calculée en fin de script.
/**/ echo '<b>$_SESSION</b>'; var_dump($_SESSION);
/**/ echo '<b>$inc</b>'; var_dump($inc);
/**/ echo '<b>$args</b>'; var_dump($args);

//On inclus la page routée. C'est ici que s'effectue le rendu de la page, où l'on appelle récursivement tous les contrôleurs nécessaires à la page.
ob_start();
echo getrender($inc);
ob_end_flush();

//Post-genration : 
//On calcule la nouvelle url de redirection, pour la prochaine page.
$_SESSION['redirect_url'] = getRedirectUrl();
/**/ echo '<b>REDIRECT : </b>'; var_dump($_SESSION['redirect_url']);

?>