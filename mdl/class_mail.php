<?php

	include_once(InfoServ::getUrlHost().'modeles/class.phpmailer.php');

	class Email {
		public static function mail($to, $subject, $mess, $role, $pseudo = NULL) {
			$msg = '
				<html>
					<head></head>
					<body style="margin: 10px 0 0;">
						<header style="background: #ab24ec;">
							<p style="display:inline-block; vertical-align:bottom; margin-left: 10px; margin-right: 20px;">
								<a href="'.InfoServ::getUrlServ().'accueil.html">
									<img src="http://localhost/stalnom/img/logo/serveur/logoX128.png" alt="Stalnom\'s Traces" title="Stalnom\'s Traces" />
								</a>
							</p>
							<h1 style="display:inline-block; vertical-align:bottom; margin-right: 10px;">
								<a href="'.InfoServ::getUrlServ().'accueil.html" style="color: black; text-decoration: none;">Stalnom\'s Traces</a>
							</h1>
						</header>
						<div style="margin: 10px 0; padding: 0 10px;">
							<section style="background: #a9adda; padding: 10px 0; width: 100%">
								<aside style="float: left; margin: 0 10px; vertical-align: top;">
									<p style="margin: 0; text-align: center;">';
										if(!empty($pseudo))
											$msg .= '<img src="'.InfoServ::getUrlServ().'img/users/'.$pseudo.'/avatar.png" alt="'.$pseudo.'"/><br />
											'.$pseudo.'<br />';
										else $msg .= '<img src="'.InfoServ::getUrlServ().'img/default_user/avatar.png" alt="'.$role.'"/><br />';
										$msg .= $role.'
									</p>
								</aside>
								<article style="overflow: auto; margin-right: 10px;">
									<div style="margin: 0;">
										<h1 style="margin: 0; padding: 10px; background: #fa987a;">'.$subject.'</h1>
										<div style="margin: 0; padding: 0 10px; background: #a789af;">'.$mess.'</div>
									</div>
								</article>
								<div style="clear:both;"></div>
							</section>
						</div>
						<footer style="text-align: center; background: #fa3f4d;">
							<p style="margin: 0;">
								Site du serveur minecraft Stalnom\'s Traces - Taleia NOSSET & Lanscel Thaledric -
								Tous droits réservés sur le site, le serveur et leurs composantes.
							</p>
						</footer>
					</body>
				</html>
			';

			$mail = new PHPmailer();
			$mail->SetLanguage('fr');
			$mail->IsSMTP();
			$mail->IsHTML(true);
			$mail->SMTPDebug=0;
			$mail->SMTPAuth=true;
			$mail->SMTPSecure='ssl';
			$mail->Host='smtp.gmail.com';
			$mail->Port='465';
			$mail->Username='stalnom.s.traces@gmail.com';
			$mail->Password='StalnomsTraces-94';
			$mail->From='stalnom.s.traces@gmail.com';
			$mail->FromName="Stalnom's Spirit";
			if(is_string($to))
				$mail->AddAddress($to);
			else
				foreach($to as $value)
					$mail->AddAddress($value);
			$mail->CharSet="utf-8";  
			$mail->Subject=$subject;
			$mail->Body=$msg;
			$send = $mail->Send();
			$mail->SmtpClose();
			return $send;
		}
		public static function inscript($mail, $pseudo, $pass, $token) {
			$msg = "<h4>Bonjour et bienvenue sur le serveur de Stalnom's Traces,</h4>";
			$msg .= "<p>Vous venez de vous inscrire sur le site du serveur minecraft et ceci est votre mail de confirmation. Voici vos identifiants :</p>";
			$msg .= "<ul><li>Pseudo : ".$pseudo."</li><li>Mot de passe temporaire : ".$pass."</li></ul>";
			$msg .= '<p>Veuillez valider votre compte en cliquant sur le lien suivant : <br />';
			$msg .= '<a href="'.InfoServ::getUrlServ().'activation-'.$pseudo.'&'.$token.'.html">';
			$msg .= InfoServ::getUrlServ().'activation-'.$pseudo.'&'.$token.'.html</a><br />';
			$msg .= 'Si vous ne confirmez pas votre inscription dans les 10 jours qui suivent, votre compte sera supprimé et vous aurez tout à refaire.<br />';
			$msg .= "N'oubliez pas également de modifier vos identifiants après avoir confirmé votre inscription.</p>";
			$msg .= "<p>Nous vous souhaitons un bon jeu sur nos serveurs</p>";
			$msg .= '<p style="text-align: right;">Les admins</p>';
			
			return self::mail($mail, 'Inscription', $msg, 'Les admins');
		}
		public static function modification($mail, $pseudo, $pass) {
			$msg = "<h4>Bonjour ".$pseudo.",</h4>";
			$msg .= "<p>La modification de vos informations de compte a bien été prise en considération :</p>";
			$msg .= "<ul><li>Pseudo : ".$pseudo."</li><li>Mot de passe : ".$pass."</li><li>E-m@il : ".$mail."</li></ul>";
			$msg .= '<p>Vous pourrez à nouveau modifier vos données comme bon vous semble.</p>';
			$msg .= "<p>Nous vous souhaitons un bon jeu sur nos serveurs</p>";
			$msg .= '<p style="text-align: right;">Les admins</p>';
			
			return self::mail($mail, 'Modification du mot de passe', $msg, 'Les admins');
		}
		public static function forgot($mail, $pseudo, $pass) {
			$msg = "<h4>Bonjour ".$pseudo.",</h4>";
			$msg .= "<p>Un petit oubli de votre part ? Ce n'est pas grave ; voici vos identifiants temporaires :</p>";
			$msg .= "<ul><li>Pseudo : ".$pseudo."</li><li>Mot de passe : ".$pass."</li></ul>";
			$msg .= "<p>N'oubliez pas de modifier vos identifiants pour éviter tout souci de sécurité.</p>";
			$msg .= "<p>Nous vous souhaitons un bon jeu sur nos serveurs</p>";
			$msg .= '<p style="text-align: right;">Les admins</p>';
			
			return self::mail($mail, 'Modification du mot de passe', $msg, 'Les admins');
		}

		public static function messInternal($titre, $contenu) {
			$user = User::getUser();
			$req = coda::query('SELECT `user`.`mail` FROM `user`, `userrole`
								WHERE `user`.`id` = `userrole`.`user`
								AND `userrole`.`role` >= (
									SELECT `id` FROM `role` WHERE `role` = \'root\'
								)');//admin
			$to = array();
			while($data = $req->fetch())
				array_push($to, $data['mail']);
			self::mail($to, $titre, $contenu, $user->getRole(), $user->getPseudo());
		}
	}
