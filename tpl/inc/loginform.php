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
		<p>
            Pseudo :</br>
            <input type="text" name="username" id="username"/>
        </p>
        <p>
            Mot de passe :</br>
            <input type="password" name="password" id="password" />
        </p>
        <p class="center">
            <input type="submit" value="Connexion" />
        </p>
        <p><a class="abutton" href="<?php echo $£registerurl; ?>">Pas encore inscrit ?</a></p>
    </form>
	
	
</div>