<?php
    /*
    levellist
    Liste des niveaux disponibles
    */
?>
<div class="content-section" id="content-levellist">
    <h2>Niveaux disponibles</h2>
    <ul>
        <?php
        foreach($£levels['available'] as $level){
            ?>
            <li><a href="<?php echo genlink('/level/'.$level['link'].'/'); ?>"><?php echo utf8_encode($level['title']); ?></a></li>
            <?php
        }
        ?>
    </ul>
    
    <h2>Niveaux terminés</h2>
    <ul>
        <?php
        foreach($£levels['finished'] as $level){
            ?>
            <li><a href="<?php echo genlink('/level/'.$level['link'].'/'); ?>"><?php echo utf8_encode($level['title']); ?></a></li>
            <?php
        }
        ?>
    </ul>
    
</div>