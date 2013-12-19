<?php
/*
    register.php
    inscrit l'utilisateur grâce aux données _POST.
    args :
        _POST['username']
        _POST['password']
		_POST['password_confirm']
		_POST['email']
        _SESSION['redirect_url']
        
*/

//toute les cases pas rempli
if(!isset($_POST['username']) || empty($_POST['username'])
    || !isset($_POST['password']) || empty($_POST['password'])
    || !isset($_POST['password_confirm']) || empty($_POST['password_confirm'])
    || !isset($_POST['email']) || empty($_POST['email'])){
    
    $_SESSION['msg'][] = 'Merci de remplir tous les champs, sinon ça marche pas.';
    redirectPreviousPage();
}

if($_POST['password'] != $_POST['password_confirm']){
    $_SESSION['msg'][] = 'Mot de passe de confirmation invalide.';
	redirectPreviousPage();
}

$regres = Account::insertAccount($_POST['email'],$_POST['username'], $_POST['password']);


if($regres === false){
    $_SESSION['msg'][] = 'Le pseudo et/ou l\'adresse mail existe déjà. Sorry!';
}
else{
    Level::unlockLevels($regres);
    $_SESSION['msg'][] = 'Inscription validée, vous faites désormais partie de notre secte. Félicitations !';
    unset($_SESSION['redirect_url']);   //pour rediriger vers l'accueil
}

//redirection:
redirectPreviousPage();

?>