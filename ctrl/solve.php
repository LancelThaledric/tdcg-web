<?php
/*
    login.php
    connecte l'utilisateur grâce aux données _POST.
    args :
        $args['key'] : clé du level
        $args['solution'] : solution proposée par le joueur
        
        
*/
protectForMembers('Connecte-toi pour jouer, petit inculte.');

//On regarde si l'utilisateur a le droit de jouer à ce level.
$solved = false;
$level = new Level();
$level->loadLevelFromKey($args['key']);
if($level->isLoaded()){
    if($level->state() == LevelUserState::UNAVAILABLE){
        $_SESSION['msg'][] = 'Ce niveau n\'est pas disponible pour vous.';
    }
    if($level->state() == LevelUserState::VALIDATED){
        $solved = true;
    }
    elseif($level->solution() != $args['solution']){
        $_SESSION['msg'][] = 'Ce n\'est pas la bonne solution.';
    }
    elseif(!$level->validLevel()){
        $_SESSION['msg'][] = 'Erreur dans la validation du level.';
    }
    else{
        $_SESSION['msg'][] = 'Félicitations ! Vous avez vaincu le niveau !';
        $solved = true;
    }
}
else{
    $_SESSION['msg'][] = 'Ce niveau n\'est pas disponible pour vous. Ou bien il existe pas. Niveau non chargé.';
}

if(!$solved) redirectPreviousPage();

// à partir d'ici, seuls les joueurs ayant vraiment résolu le niveaux verrront ce qui suit. Ceux à qui leur tentative a échoué ont été redirigés.
$unlockret = Level::unlockLevels($level->idaccount());
var_dump($unlockret);

$£solved = $level->getIncludeSolvedLevel();
$£msgbox = getrender('ctrl/inc/msg.php');

//render
require 'tpl/solve.php';

?>