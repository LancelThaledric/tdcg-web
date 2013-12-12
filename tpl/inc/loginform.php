<?php
    /*
    loginform
    formulaire de connexion + lien d'inscription
    variables :
        - £redirect_url : url absolue de redirection du visiteur
    */
?>
<div id="login-form" class="login-form">
	<h2>Se connecter</h1>
	<form method="post" action="<?php echo $£loginurl; ?>">
		Pseudo :</br>
        <input type="text" name="username" id="username"/></br>
		Mot de passe :</br>
        <input type="password" name="password" id="password" /></br>
        <input type="submit" value="Connexion" />
    </form>
	<a class="abutton" href="<?php echo $£registerurl; ?>">Pas encore inscrit ?</a>
	
</div>