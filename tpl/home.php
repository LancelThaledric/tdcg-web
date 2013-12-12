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
					
					<div class="datebox">#posté le 27/11/2013</div>
					<p>Tu es un chanceux toi, tu es tombé sur cette page web par hasard ? et bien NON, le destin ta conduit ici et c'est pour y passé un moment !</br>
					
					Tu as envie de t'amuser tout en faisant marcher tes méninges (mais pas trop non plus), voici LE JEU Web qu'il te faut: <strong>The DusKcat game</strong>.</br>
					C'est un jeu d'énigmes.</br>
					</br>
					Es-tu pret à relever le défi ?
					</p>
					.</br>
					.</br>
					
					
				</div>
                
                <div class="content-section" id="content-howtoplay">
					<h2>Comment jouer ?</h2>
					
					<div class="datebox">#posté le 27/11/2013  </div>
					<p>Le jeu ce déroule par niveau. Tu as de base 3 niveaux débloqués. Un niveau se débloquera à chaque niveau résolu.</br>
					La réponse se trouve dans le code source de la page en faisant tout simplement <u>Ctrl+U</u>.</br>
					.</br>
					.</br>
					
					
					</p>
					
					
				</div>
				
				
				<div class="content-section" id="content-news">
					<h2>News</h2>
					
					<div class="datebox">#posté le 27/11/2013  </div>
					<p> De nouveaux niveaux à débloquer !!!!!!!!!</br>
					.</br>
					.</br>
					
					
					</p>
					
					
				</div>
                <!--  /Page content -->
                
            </div>
            
            <?php echo $£sidebar; ?>
        </div>
        <?php echo $£footer; ?>
    </body>
</html>

