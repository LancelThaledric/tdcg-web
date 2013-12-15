<?php
    /*
    msg
    affiche chaque message d'exécution.
    variables :
        - £msg : array des messages à afficher.
    */
?>
<div id="leveltoolbar" class="leveltoolbar">
    <form id="formsolution" onsubmit="checkSolution()">
        <input type="text" placeholder="Réponse" name="inputsolution" id="inputsolution"/>
        <input type="submit" value="Check !"/>
    </form>
</div>
<script type="text/javascript" src="<?php echo $£js_leveltoolbar; ?>"></script>