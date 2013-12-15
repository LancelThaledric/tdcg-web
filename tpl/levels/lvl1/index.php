<?php //LVL 1
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
                
                <!-- Page content -->
                
                <p>Tu crois que t'es revenu sur la page d'accueil ? Haha ! Détrompe-toi ! Tu est bel et bien sur le premier niveau !!<br/>
                Allez, bonne chance pour la suite et n'oublie pas ton seul et unique allié ! <u>KonrtolU !</u></p>
                
                <!--  /Page content -->
                
            </div>
            
            <?php echo $£sidebar; ?>
        </div>
		
		<!-- HEEEEY BROTHER! Tu as réussi à trouver le code source! Nous sommes fiers de toi.
		Puisque c'est la première énigme et qu'il t'en reste pas mal d'autres, voici la première solution.
		La solution 1 est : -->
		<?php echo $level->solution();  ?>
		
    </body>
</html>

