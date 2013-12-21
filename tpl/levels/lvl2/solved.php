<?php //LVL 2 SOLVED
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
        <div id="main-container" class="main-container">
        
            <div id="content" class="content">
                <?php echo $£msgbox; ?>
                <h1>Vaincu !</h1>
                <p class="little">Pas toi, le niveau...</p>
                <p>
                    C'est plus compliqué quand on n'a pas les couleurs pour nous aider ?<br/>
                    Et encore là c'est simple, tout est lisible directement dans le code source...
                </p>
                <p>
                    <a href="<?php echo $£return_link; ?>">Revenir à la liste des niveaux</a>
                </p>
                <!-- Tranchant, n'est-ce pas ? C'est un indice pour le niveau suivant.
                    Profites-en, les indices, nous n'en donnons que très peu...-->
            </div>

        </div>
    </body>
</html>
