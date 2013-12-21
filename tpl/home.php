<?php //home
    /* vars:
        
    */?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Accueil - <?php echo C::site_name; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>style.css" />
    </head>
    <body>
        <?php echo $£header; ?>
        <div id="main-container" class="main-container">
        
            <div id="content" class="content">
                <?php echo $£msgbox; ?>
                
                <!-- Page content -->
                
                
                <div class="content-section" id="content-welcome">
					<h2>Bienvenue à toi !</h2>
					
					<div class="datebox">#posté le 27/11/2018</div>
					<p>Aaaaah te voilà enfin. Quoi? Tu penses être tombé sur cette page web par hasard? JE NE CROIS PAS, le destin t'a conduit ici et c'est pour y passer un très bon moment !</br></br>
					
					Tu as envie de t'amuser tout en faisant marcher tes méninges (mais pas trop non plus), voici LE JEU Web qu'il te faut: <strong>The DuskCat game</strong>.</br>
					C'est un jeu ludique d'énigmes (et pas celles du Père Fourasse ! Ah nan), d'énigmes diaboliques et fichtrement bien tournées qui se transmettent de génération
					en génération <em>(« et je parle pas d'herpès putain !»)</em>. </br>
					Ton défi sera donc de les résoudre une par une afin de progresser dans les abîmes du code obcure de la
					for... oula il serait temps de prendre la pillule rouge. </br>
					</br>
					<div class="center">Es-tu prêt à relever le défi, jeune paddawan?</div>
					</p>
					
					
				</div>
                
                <div class="content-section" id="content-howtoplay">
					<h2>Comment jouer ?</h2>
					
					<div class="datebox">#posté le 27/11/2024</div>
					<p> Tout d'abord pour jouer il faut t'inscrire si ce n'est pas déjà fait : <a href="<?php echo $£register_link ?>">là</a>,
					<a href="<?php echo $£register_link ?>">là</a> ou <a href="<?php echo $£register_link ?>">là</a>,
					à toi de voir, tu choises. :)</br></br>
					Bref, le jeu se déroule par niveau. Tu as de base trois niveaux débloqués. Un nouveau niveau se débloquera à chaque niveau résolu.</br>
					Voilà pour ce qui est du déroulement du jeu. </br>
					Maintenant pour la pratique:
					La réponse se trouve dans le code source de la page en faisant tout simplement <u>Ctrl+U</u>. A partir de là, des indices seront
					dissimuler dans les commentaires html. </br>Pour passer au niveau suivant il te suffit de taper ou de copire/collire la solution (code à 10 chiffres)
					dans la petite barre en bas de ton écran.</br></br>
					
					
					Pour commencer, rends-toi dans l'onglet JOUER ! puis click sur le NIVEAU 1.
					
					<div class="center">Et ENJOY :)</div></br></br>
					
					
					
					</p>
					
					
				</div>
				
				
				<div class="content-section" id="content-news">
					<h2>Copyrights</h2>
					
					<div class="datebox">#posté dans la 4<sup>e</sup> dimension</div>
					<p>Les illustrations en arrière-plan ont été faites par <a href="http://af-studios.deviantart.com/">Ana Fagarazzi</a>. Les couelurs y ont été modifiées.<br/>
                    Merci à elle d'avoir mis en ligne ce stock d'images à disposition du monde.</p>
                    <p>L'image de header est provisoire. Sera là plus tard une bannière faire en WebGL par nos soins. L'illustration présente nous vient de <a href="http://mikaelwang.deviantart.com/">Michael Wang</a>.</p>
					
					
				</div>
                <!--  /Page content -->
                
            </div>
            
            <?php echo $£sidebar; ?>
        </div>
        <?php echo $£footer; ?>
    </body>
</html>

