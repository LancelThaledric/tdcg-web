<?php //home
    /* vars:
        
    */?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tu t'inscris ? - <?php echo C::site_name; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>style.css" />
    </head>
    <body>
        <?php echo $£header; ?>
        <div id="main-container" class="main-container">
        
            <div id="content" class="content">
                <?php echo $£msgbox; ?>
                
                <!-- Page content -->
                <div class="content-section" id="content-register">
					<h1>Remplis-ça pour t'inscrire !</h1>
					<form method="post" action="<?php echo $£registerscripturl; ?>">
						<label for="username">Pseudo: <br/><input type="text" name="username" id="username"/></label><br/> <br/>
						<label for="password">Mot de passe:  <br/><input type="password" name="password" id="password"/></label><br/> <br/>
						<label for="password_confirm">Confirmation du mot de passe: <br/> <input type="password" name="password_confirm" id="password_confirm"/></label><br/> <br/>
						<label for="email">Adresse e-mail:  <br/><input type="text" name="email" id="email"/></label><br/> <br/>
						<input type="submit" value="M'inscrire"/>
					</form>
				</div>
				
                <!--  /Page content -->
                
            </div>
            
            <?php echo $£sidebar; ?>
        </div>
        <?php echo $£footer; ?>
    </body>
</html>

