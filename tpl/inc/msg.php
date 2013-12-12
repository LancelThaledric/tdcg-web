<?php
    /*
    msg
    affiche chaque message d'exécution.
    variables :
        - £msg : array des messages à afficher.
    */
?>
<div id="msg-box" class="msg-box">
    <ul id="msg-list" class="msg-list">
        <?php
            //foreach sur $£msg pour les afficher.
            foreach($£msg as $value){
                echo '<li>' . $value . '</li>';
            }
        ?>
    </ul>
</div>