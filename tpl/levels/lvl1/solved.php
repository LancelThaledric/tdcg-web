<?php //LVL 1 SOLVED
    /* vars:
        
    */?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Accueil - <?php echo C::site_name; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>style.css" />
    </head>
    
    <!--Tu crois que t'es revenu sur la page d'accueil ? Haha ! Détrompe-toi ! Tu est bel et bien sur le premier niveau !!
    Allez, bonne chance pour la suite et n'oublie pas ton seul et unique allié ! KonrtolU !-->
    
    <body>
        <?php echo $£header; ?>
        <div id="main-container" class="main-container">
        
            <div id="content" class="content">
                <?php echo $£msgbox; ?>
                <p>
                    Bien joué, tu as terminé le premier niveau !<br/>
                    Maintenant que tu as compris le truc des commentaires du vas pouvoi/... <pre>EOF</pre>
                </p>
                <p>
                    <a href="<?php echo $£return_link; ?>">Revenir à la liste des niveaux</a>
                </p>
            </div>

            <?php echo $£sidebar; ?>
        </div>
        <?php echo $£footer; ?>
    </body>
    
</html>
