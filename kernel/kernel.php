<?php
/*
        kernel.php
    fonctions et mécanismes de base de l'application.
*/


//! Renvoie l'uri du contrôleur en fonction de l'uri passée en paramètre. Place les arguments de la route dans l'array $args.
function routing($url, $routes, $default, &$args){
    header("Status: 200 OK", false, 200);
    $result = null;
    $selected = null;
    $matches = array();
    foreach($routes as $pattern => $target){
        $pattern = '#^'.$pattern.'$#';
        if(preg_match($pattern, $url, $matches)){
            //si on est ici c'est qu'on a trouvé le bon pattern
        
            //matches contient alors les captures en double : une avec une clé numérique et une avec un clé assosciative(si spécifiée dans la regex).
            //Le but ici est de supprimmer les clés numériques parce qu'on ne pourra pas les utiliser facilement (il aurait fallu traiter chaque page au cas par cas).
            //On ne garde que les clés textuelles et on les met directement dans $args
            foreach($matches as $key => $value){
                if(is_string($key)) $args[$key] = $value;
            }
            //ensuite on sort de la fonction, on n'a pas besoin d'examiner les autres routes.
            //On retourne le controleur cible.
            $selected = $target;
            break;
        }
    }
    //si on n'a trouvé aucune route dans le tableau, alors la page n'existe pas. On renvoie alors la route par defaut.
    if(!$selected)
        $selected = $default;
    
    //On a note array contenant la route, il faut maintenant générer l'uri.
    
    return genUri($selected);
}

//génère l'URI de la route envoyée en paramètre. Renvoie true si la route pointe sur une page, False sinon (si elle pointe sur un script redirigé).
function genUri($route){
    $res = C::ctrl_dir . $route[0]. $route[1];
    
    return $res;
}

//! Permet d'inclure un contrôleur.
function getrender($src){
    global $args;
    ob_start();
    require $src;
    return ob_get_clean();
}

//! Renvoie une instance de pdo.
function pdo(){
    static $pdo;
    if(!isset($pdo)){
        try{
            $pdo = new PDO('mysql:host='.C::db_host.';dbname='.C::db_dbname, C::db_user, C::db_pass);
        }
        catch(Exception $e)
        {
            trigger_error('Echec de connexion à PDO', E_USER_ERROR);
        }
    }
    return $pdo;
}

//! Renvoie l'url de redirection : la page précédente ou le visiteur était.
function getRedirectUrl(){
    return $£redirect_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
}

//! Redirige l'utilisateur sur la page où il était avant.
function redirectPreviousPage(){
    $redirect_url_default = 'http://' . $_SERVER['SERVER_NAME'] . C::site_root_uri;

    //redirection:
    if(isset($_SESSION['redirect_url'])){
        //$_SESSION['msg'][] = 'redirect prev url' . $_SESSION['redirect_url'];
        header('Location:'.$_SESSION['redirect_url']);
        unset($_SESSION['redirect_url']);
    }
    else{
        $_SESSION['redirect_url'] = $redirect_url_default;
        //$_SESSION['msg'][] = 'redirect DEFAULT url';
        header('Location:'.$redirect_url_default);
    }
    
    exit;
}

//Protège une page de la visite pour les non-membres. Redirige vers la page précédente.
function protectForMembers($msg){
    if(!isset($msg) || empty($msg)) $msg = 'Vous devez être connecté pour aller là.';

    if(!$_SESSION['current_user']->isConnected()){
        $_SESSION['msg'][] = $msg;
        redirectPreviousPage();
    }
}

//retourne le chemin vers le design;
function cssdir(){
    return C::site_root_uri . C::design_dir;
}

//génère un lien absolu. A utiliser pour chaque url destinée au client.
function genlink($s){
    return C::site_root_uri . $s;
}

//varèdump la variable selon la configuration.
function debug($var, $key = 1){
    if(C::debug_mode === true || C::debug_mode === $key){
        var_dump($var);
    }
}

?>
 
 