<?php
    /*
    header
    L'entête du site + le menu principal.
    */
?>
<div id="head-container" class="head-container">
    <header id="main-header" class="main-header">
        <h1><?php echo C::site_name; ?></h1>
    </header>
</div>
<nav id="mainmenu-container" class="mainmenu-container">
	<ul id="mainmenu" class="mainmenu">
		<li><a href="<?php echo $£link_Accueil; ?>">Accueil</a></li>
		<li><a href="<?php echo $£link_Jouer; ?>">Jouer !</a></li>
		<li><a href="<?php echo $£link_Forum; ?>">Forum</a></li>
		<li><a href="<?php echo $£link_Contact; ?>">Contact</a></li>
	</ul>
</nav>