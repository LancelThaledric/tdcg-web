<?php
    /*
    userbox
    affiche l'avatar, bouton déconnecter, lien continu la partie
    */
?>
<div id="userbox" class="userbox">


	<h2>Hello <?php echo $_SESSION['current_user']->username(); ?></h2>
	Comment va-t-on aujourd'hui ?</br></br>
	Encore un jour au paradis :)</br>
	<em>- Oblivion, 2013.</em></br></br></br>


	<form method="post" action="<?php echo $£logouturl; ?>">
        <input type="submit" value="Déconnexion" />
    </form>

</div>