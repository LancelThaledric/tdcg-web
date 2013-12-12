<?php
/*
    logout.php
    déconnecte l'utilisateur.
    args :
        _SESSION['redirect_url']
*/

$_SESSION['current_user']->logout();

//redirection:
redirectPreviousPage();

?>