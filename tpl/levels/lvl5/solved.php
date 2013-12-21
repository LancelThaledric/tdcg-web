<?php //LVL 4 SOLVED
    /* vars:
        
    */?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Niveau réussi ! - <?php echo C::site_name; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>style.css" />
    </head>
    <body>
        <?php echo $£msgbox; ?>
    
        <h1>Le voici, votre café !</h1>
        
        <p>
            Pas facile d'aller voir une en-tête...<br/>
            C'est un bon moyen de cacher des choses pour qu'elles passent discrètement.
            Pensez-y la prochaine fois, on y cache facilement des indices.
        </p>
        
        <p>
            <a href="<?php echo $£return_link; ?>">Revenir à la liste des niveaux</a>
        </p>
    </body>
</html>