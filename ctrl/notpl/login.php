<?php
/*
    login.php
    connecte l'utilisateur grâce aux données _POST.
    args :
        _POST['username']
        _POST['password']
        _SESSION['redirect_url']
        
*/

$logres = $_SESSION['current_user']->login($_POST['username'], $_POST['password']);

if($logres == 0){
    $_SESSION['msg'][] = 'Le pseudo et/ou le mot de passe est incorrect. Connexion avortée.';
}
elseif($logres == -1){
    $_SESSION['msg'][] = 'Votre compte n\'est pas validé ou vous avez été banni.';
}
else{
    //connexion effectuée.
}

//redirection:
redirectPreviousPage();

?>