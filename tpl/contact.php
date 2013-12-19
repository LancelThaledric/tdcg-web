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
					<div class="datebox">#posté le 18/12/2013</div>
					<div class="fromagefondu">
						<h3 class="center">The DuskCat</h3>
                        
						<p class="center"><img src="<?php echo $£img_us; ?>" alt="" class="shadowed"></p>
                        
						<p>
                            Actuellement étudiants en deuxième année de DUT Informatique Imagerie Numérique du Puy-en-Velay(43), nous avons
                            réalisé ce site dans le cadre d'un projet web en novembre 2013.</br>
                            Nous nous sommes inspiré de CCDS <a href="http://ccds.neamar.fr/">http://ccds.neamar.fr/</a>
                            pour le concept du jeu.
						</p>
						<p>Nous avons réalisé d'autres projets notamment des jeux-vidéo:</p>
                        <ul>
                            <li>The DuskCat : Food attacks (Shooter arena dévoloppé sur Unity)</li>
                            <li>JS Snake Survival (Snake dévoloppé sur Unity également)</li>
                            <li>Pompeii (Une application Kinect avec le SDK Microsoft)</li>
                            <li>LOADING (En cours de développement : inspiré de BIT.TRIP Runner)</li>
                        </ul>
						<p>Nous espérons que vous avez passé un bon moment en notre compagnie sur ce petit jeu.</p>
						<p class="right pnomargin">« Tendresse &amp; Chocolat »</p>
						<p class="right little pnomargin"><em>- La team <strong>The DuskCat</strong></em></p>
					</div>
				</div>
							
                
                <div class="content-section" id="content-findus">
					<div class="cell-container">
						<div class="barbara cell center">
                            <img src="<?php echo $£img_bab; ?>" alt="" class="shadowed"></br>
                            
                            <h3>~ Barbara Schiavi ~</h3>
                            <div class="cell-container">
                                <div class="aime cell left">
                                    <h4>Aime:</h4>
                                    <ul>
                                        <li>la musique electro</li>
                                        <li>les chocomallows</li>
                                        <li>les chatons mignons</li>
                                    </ul>
                                </div>
                                <div class="aimepas cell left">
                                    <h4>Aime pas :</h4>
                                </div>
                            </div>
                            <p>
                                Site internet: KittyPonote.fr
                            </p>
						</div>
						<div class="valentin cell center">
                            <img src="<?php echo $£img_val; ?>" alt="" class="shadowed"></br>
                            
                            <h3>~ Valentin Mourot ~</h3>
                            <div class="cell-container">
                                <div class="aime cell left">
                                    <h4>Aime:</h4>
                                    <ul>
                                        <li>La musique sauf rap et jazz</li>
                                        <li>Les jeux vidéo quand ils sont bien</li>
                                        <li>les chats quand ils sont beaux</li>
                                        <li>&lt;-- Elle</li>
                                    </ul>
                                </div>
                                <div class="aimepas cell left">
                                        <h4>Aime pas :</h4>
                                </div>
                            </div>
                            <p>
                                Site internet: Thaledric.fr
                            </p>
						</div>
					</div>
				</div>
                <!--  /Page content -->
                
				
            </div>
            
            <?php echo $£sidebar; ?>
        </div>
        <?php echo $£footer; ?>
    </body>
</html>

