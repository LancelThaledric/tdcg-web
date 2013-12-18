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
					<h2>Qui sommes nous ?</h2>
					<div class="datebox">#posté le 27/11/2013</div>
					<div class="fromagefondu">
						<h3 class="center">The DuskCat</h3>
						<p class="center"><img src="<?php echo $£img_us; ?>" alt="" class="shadowed"></p>
						<p>Actuellement étudiant en deuxième année de DUT Informatique Imagerie Numérique du Puy-en-Velay(43), nous avons
						réalisé ce site dans le cadre d'un projet web en novembre 2013.</br>
						Nous nous sommes inspiré de CCDS <a href="http://ccds.neamar.fr/">http://ccds.neamar.fr/</a>
						pour le concepte du jeu.
						</p>
						<p>
						Nous avons réalisé d'autre projet notamenet de jeu vidéo:</br>
						- The DuskCat : Food attacks (Shooter arena dévoloppé sur Unity)</br>
						- JS Snake Survival (snake dévoloppé sur Unity également)</br>
						- Pompeii (Un application Kinect avec le SDK Microsoft)</br>
						- LOADING (en cours de développement d'un remake de BIT.TRIP Runner en C++)</br>
						</p>
						<p>
						Nous espérons que vous avez passé un bon moment en notre compagnie sur ce petit jeu .</br>
						<p class="right pnomargin">« Tendresse&amp;Chocolat »</p>
						<p class="right little pnomargin"><em>Le team The DuskCat</em></p>
						</p>
					</div>
				</div>
							
                
                <div class="content-section" id="content-findus">
					<h2>Retrouvez-nous</h2>
					<div class="datebox">#posté le 27/11/2013  </div>
					<div class="cell-container">
						<div class="barbara cell center">
						<img src="<?php echo $£img_bab; ?>" alt="" class="shadowed"></br>
						
						Barbara SCHIAVI</br></br>
						<div class="cell-container">
							<div class="aime cell">
							Aime:</br>
							- la musique electro</br>
							- les chocomallows</br>
							- les chatons mignons</br>
							</div>
							<div class="aimepas cell">
							Aime pas:
							</div>
						</div>
						<p>
						site internet: KittyPonote.fr</br>
						</p>
						</div>
						<div class="valentin cell center">
						<img src="<?php echo $£img_val; ?>" alt="" class="shadowed"></br>
						
						Valentin MOUROT</br></br>
						<div class="cell-container">
							<div class="aime cell">
							Aime:</br>
							- le rouge et doré</br>
							- les jeux indé</br>
							- tous les chats sauf ceux qui n'ont pas de poils</br>
							</div>
							<div class="aimepas cell">
							Aime pas:
							</div>
						</div>
						<p>
						site internet: Thaledric.fr</br>
						</p>
						</div>
					</div>
				</div>
                <!--  /Page content -->
                
				
            </div>
            
            <?php echo $£sidebar; ?>
        </div>
    </body>
</html>

