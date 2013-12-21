<?php //LVL 1 SOLVED
    /* vars:
        
    */?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Niveau réussi ! - <?php echo C::site_name; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>style.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>../levels/lvl3/dyslexia.css" />
    </head>
    <body>
        <h1>Félicitations, vous avez terminé le niveau !</h1>
        <p>
            Les Media Queries.<br/>
            Ou "discrimination" pour les intimes. C'est l'art de changer le style d'une page en fonction du navigateur.<br/>
            Seuls les petites fenêtres ont pu voir le véritable code.<br/>
            Vous en faites partie.
        </p>
        
        <p>
            <a href="<?php echo $£return_link; ?>">Revenir à la liste des niveaux</a>
        </p>
    </body>
</html>