<?php
/*
        routes.php
    liste des routes.
    Chaque route est associée à un controleur (dossier ctrl/).
    Cela fait en gros un controleur par page (plus les contrôleurs qui redirigent).
    
    Mode d'emploi :
    
    $routes['<Regex de la route>'] = array('<sous-dossier de ctrl/>', '<nom du fichier>');
    [^/\s] signifie "Tout caractère sauf / ou un espace". Utiliser [^/\s]* pour matcher une série de caractères de l'url.
*/
$routes = array();

// Page d'accueil
$routes['/'] = array('', 'home.php');
$routes['/index.php'] = array('', 'home.php');
$routes['/home/?'] = array('', 'home.php');

// Helloworld : page de tests
$routes['/helloworld/?'] = array('', 'helloworld.php');
$routes['/helloworld/(?P<name>[^/\s]*)/?'] = array('', 'helloworld.php');

// Login/logout
$routes['/login/?'] = array('notpl/', 'login.php');
$routes['/logout/?'] = array('notpl/', 'logout.php');

$routes['/register/?'] = array('', 'registerform.php');
$routes['/register/newaccount/?'] = array('notpl/', 'register.php');

//Game menu : liste des niveaux focntionnalités liées
$routes['/play/?'] = array('', 'gamemenu.php');

//Niveaux
$routes['/level/(?P<key>[^/\s]*)/?'] = array('', 'level.php');
$routes['/level/(?P<key>[^/\s]*)/(?P<solution>.*)/?'] = array('', 'solve.php');

//Forum
$routes['/forum/?'] = array('', 'forumindex.php');
//$routes['/forum/(?P<category>[^/\s]*)/?'] = array('', 'forumcategory.php');
//$routes['/forum/post/(?P<postid>\d+)/?'] = array('', 'forumpost.php');

//Contact
$routes['/contact/?'] = array('', 'contact.php');
$default_route = array('', '404.php');
?>