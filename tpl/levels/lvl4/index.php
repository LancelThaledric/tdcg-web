<?php //LVL 4
    /* vars:
        
    */?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_SESSION['level']->title(); ?> - <?php echo C::site_name; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>style.css" />
    </head>
    <body>
        <?php echo $£msgbox; ?>
        <h1 id="timestamp"><?php echo $£solutiontime; ?></h1>
        <!-- C'est moi ou c'est pas à l'heure ? -->
        
        <script type="text/javascript">
            function timer(){
                var e = document.getElementById('timestamp');
                var n = parseInt(e.innerHTML) + 1;
                e.innerHTML = n;
                
                var e = document.getElementById('now');
                var n = parseInt(e.innerHTML) + 1;
                e.innerHTML = n;
            }
            window.setInterval(timer,1000);
        </script>
        <h1 id="now" style="display : none;"><?php echo $£time; ?></h1>
    </body>
</html>

