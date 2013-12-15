<?php //contact
    /* vars:
        
    */?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact - <?php echo C::site_name; ?></title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo cssdir(); ?>style.css" />
    </head>
    <body>
        <?php echo $£header; ?>
        <div id="main-container" class="main-container">
        
            <div id="content" class="content">
                <?php echo $£msgbox; ?>
                
                <!-- Page content -->
                <div class="content-section" id="content-us">
					<h2>Qui sommes nouuuuus ?</h2>
					<div class="datebox">#posté le 27/11/2013</div>
					<div class="fromagefondu center">
						<strong>Etudiants en IUT Informatique Imagerie Numerique.</strong></br>
						<img src="<?php echo $£img_us; ?>" alt="" class="shadowed">
						
					</div>
				</div>
				
				
				
				
				
				
                
                <div class="content-section" id="content-findus">
					<h2>Retrouvez-nous</h2>
					<div class="datebox">#posté le 27/11/2013  </div>
					<div class="cell-container">
						<div class="barbara cell center">
						<img src="<?php echo $£img_bab; ?>" alt="" class="shadowed"></br>
						
						Barbara SCHIAVI</br></br>
						
						site internet: KittyPonote.fr</br></br>
						</div>
						
						<div class="valentin cell center">
						<img src="<?php echo $£img_val; ?>" alt="" class="shadowed"></br>
						
						Valentin MOUROT</br></br>
						
						site internet: Thaledric.fr</br></br>
						</div>
					</div>
				</div>
                <!--  /Page content -->
                
				
            </div>
            
            <?php echo $£sidebar; ?>
        </div>
    </body>
</html>

