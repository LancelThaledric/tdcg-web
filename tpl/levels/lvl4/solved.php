<?php //LVL 4 SOLVED
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
        <?php echo $£msgbox; ?>
    
        <h1>Félicitations, vous êtes à l'heure !</h1>
        <p>
            Timestamp !<br/>
            Non, ce n'est pas un timbre.
        </p>
        
        <p>
            Le timestamp donne l'heure à la seconde près depuis le 1<sup>er</sup> janvier 1970 à minuit du matin.<br/>
            Votre montre est bien réglée ?
        </p>
        
        <p>
            <a href="<?php echo $£return_link; ?>">Revenir à la liste des niveaux</a>
        </p>
    </body>
</html>