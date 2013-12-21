<?php //LVL 2
    /* vars:
        
    */?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_SESSION['level']->title(); ?> - <?php echo C::site_name; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>style.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>../levels/lvl3/dyslexia.css" />
    </head>
    <body>
    <?php echo $£msgbox; ?>
        <p>
        Your code is...
        <!--
        ... marvelous.
        You are the only one who have this code.
        This code was created for you, just you and noone else.
        
        This code is... Juste for you.
        -->
        </p>
        <p class="solution">
        <?php
            foreach($£tabsolution as $key=>$value){
                echo '
                <span class="'.$key.'">'.$value.'</span>
                ';
            }
        ?>
        
        <!--
            So... Is it YOUR code ?
        -->
        </p>
        
    </body>
</html>

