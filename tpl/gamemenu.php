<?php //gamemenu
    /* vars:
        
    */?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des niveaux - <?php echo C::site_name; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>style.css" />
    </head>
    <body>
        <?php echo $£header; ?>
        <div id="main-container" class="main-container">
        
            <div id="content" class="content">
                <?php echo $£msgbox; ?>
                
                <!-- Page content -->
                
                <?php echo $£levellist; ?>
                
                <!--  /Page content -->
                
            </div>
            
            <?php echo $£sidebar; ?>
        </div>
        <?php echo $£footer; ?>
    </body>
</html>

