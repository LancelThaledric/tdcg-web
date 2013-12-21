<?php //LVL 2
    /* vars:
        
    */?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Second pas - <?php echo C::site_name; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>style.css" />
    </head>
    <body>
    <?php echo $£msgbox; ?>
        <div id="main-container" class="main-container">
            <div id="content" class="content">
                <h1>Les commentaires HTML c'est bien...</h1>
                <!-- Mais il n'y a pas. Sauf celui-ci.-->
                <p>
                    Il semblerait que cette page ne contienne pas de commentaires... Ou alors tout ce qui était commentaire ne l'est plus.<br/>
                    Traditionnellement, nous avions l'habitude de mettre les solutions dans les commentaires HTML. C'était une mauvaise idée.<br/>
                    <span style="visibility : hidden">
                        Je sais que tu lis ça. Tu ne le vois pas, mais tu pas peut-être affiché la source avant même de lire la page en elle-même.
                        Tricheur.
                        Tricheuse.
                    </span><br/>
                    Dorénavant les commentaires, c'est Niet. A pu. Fini.<br/>
                    <!-- Mensonge ! Tout n'est que mensonge ! -->
                    <span style="display:none">
                        Ce message est caché. C'est pas un commentaire. Mais ce n'est pas parce qu'il n'est pas en vert qu'il t'es inutile. Enfin si, celui-ci, il est inutile. Mais pas les autres !
                    </span><br/>
                </p>
                
                <p>
                    Il semblerait que cette page ne contienne pas de commentaires... Ou alors tout ce qui était commentaire ne l'est plus.<br/>
                    Traditionnellement, nous avions l'habitude de mettre les solutions dans les commentaires HTML. C'était une mauvaise idée.<br/>
                    <span style="visibility : hidden">
                        Tu lis ça. C'est certain. J'en ai la preuvre. Elle aussi.
                    </span><br/>
                    Dorénavant les commentaires, c'est Niet. A pu. Fini.<br/>
                    <!-- Mensonge ! Tout n'est que mensonge ! -->
                    <span style="display:none">
                        Ce message est caché. C'est pas un commentaire. Mais ce n'est pas parce qu'il n'est pas en vert qu'il t'es inutile. Enfin si, celui-ci, il est inutile. Mais pas les autres !
                    </span><br/>
                </p>
                
                <p>
                    Il semblerait que cette page ne contienne pas de commentaires... Ou alors tout ce qui était commentaire ne l'est plus.<br/>
                    Traditionnellement, nous avions l'habitude de mettre les solutions dans les commentaires HTML. C'était une mauvaise idée.<br/>
                    <span style="visibility : hidden ; width : <?php echo $_SESSION['level']->solution(); ?>">
                        Tu lis ça. C'est certain. J'en ai la preuvre. Elle aussi.
                    </span><br/>
                    Dorénavant les commentaires, c'est Niet. A pu. Fini.<br/>
                    <!-- Mensonge ! Tout n'est que mensonge ! -->
                    <span style="display:none">
                        Ce message est caché. C'est pas un commentaire. Mais ce n'est pas parce qu'il n'est pas en vert qu'il t'es inutile. Enfin si, celui-ci, il est inutile. Mais pas les autres !
                    </span><br/>
                </p>
                
            </div>
        </div>
		
    </body>
</html>

