<?php
/*
Plugin Name: WPCoordonnees
Description: Petit plugin affichant les coordonnées d'une entreprise ou autre
Version: 1.0
License: GPL
Author: Morgan JOURDIN (METACOM)
Author URI: http://mj-web.fr/
*/

//VARIABLE GLOBAL FOOTER
$footer = '<div class="footer-ephemeria">Créer par <strong><a target="_blanc" href="http://mj-web.fr/" title="PortFolio de Morgan JOURDIN">METACOM</a></strong></div>';

//==================================================================================================================================================
	//=================================================================================
	//Mise en forme des données
	//=================================================================================
//==================================================================================================================================================
	function metacom_pannel()
	{
		add_menu_page(
			'WpCoordonnées',  // le titre de la page
			'WpCoordonnées',  // le nom de la page dans le menu d'admin
			'administrator',  // le rôle d'utilisateur requis pour voir cette page
			'Présentation',   // un identifiant unique de la page
			'WpPresentation', // le nom d'une fonction qui affichera la page
			get_bloginfo('url').'/wp-content/plugins/WpCoordonnees/img/coordonnees.png',
			24
		);

		add_submenu_page(
			'Présentation', 				
			'Coordonnées',
			'Coordonnées',   
			'administrator',       
			'coordonnees',        	
			'Wpdonnees'
		);

		$pluginsActive = get_option('active_plugins');
	}

	add_action( 'admin_menu', 'metacom_pannel' );

//==================================================================================================================================================
	//=================================================================================
	//Menu WpCoordonnees
	//=================================================================================
//==================================================================================================================================================
	function WpPresentation()
	{
		?>
		<div class="wrap theme-options-menu clearfix">
			<div class="header-ephemeria" style="margin-top:-2px;"><h1>METACOM</h1></div>
			<h2 class="h2-ephemeria">WPCoordonnées</h2>
				<div class="tab clearfix" style="width:500px;height:auto;">
					<div class="center" style="padding:15px; position: relative;">
					<h3>Insérer en php</h3>
					<p>Insérer le code php ou vous le souhaitez comme ceci :<br /> <span style="background:white; padding:5px; margin-top:10px; display: inline-block; color:gray;">&lt;?php WpCoordonnees(); ?&gt;</span></p>
					
					<h3>Insérer en shortcode</h3>
					<ul>
						<li style="background: white; padding:5px; display: inline-block;">[adresse_postale]</li>
						<li style="background: white; padding:5px; display: inline-block; margin:5px;">[code_postal]</li>
						<li style="background: white; padding:5px; display: inline-block; margin:5px;">[ville]</li>
						<li style="background: white; padding:5px; display: inline-block; margin:5px;">[email]</li>
						<li style="background: white; padding:5px; display: inline-block; margin:5px;">[telephone]</li>
						<li style="background: white; padding:5px; display: inline-block;">[siret]</li>
					</ul>

					<h3>Widget</h3>
					<p>Le widget se nomme <strong>"WpCoordonnees"</strong>.</p>
					<p>Vous pouvez l'insérer en tant que widget <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wp-admin/widgets.php">ici</a></p>
				</div>
			</div>
			<?php Global $footer; echo $footer; ?>
		</div>
		<?php
	}

//==================================================================================================================================================
	//=================================================================================
	//Menu Coordonnees
	//=================================================================================
//==================================================================================================================================================
	function Wpdonnees()
	{
		if(isset($_POST['panel_update']))
		{
			foreach($_POST['coordonnees'] as $name => $value)
			{
				update_option($name,$value);
			}
			?>
			<div id="message" class="updated fade">
				<p><strong>Bravo !</strong> Les paramètres sont sauvegardés avec succès</p>
			</div>
			<?php
		}

	?>
			<div class="wrap theme-options-menu clearfix">
			<div class="header-ephemeria" style="margin-top:-2px;"><h1>METACOM</h1></div>
			<h2 class="h2-ephemeria">WPCoordonnées</h2>
				<div class="tab clearfix" style="width:500px;height:auto;">
					<div class="center" style="padding:15px; position: relative;">
					<form method="post" action="#">
						<label for="entreprise_post">Nom entreprise</label><br />
						<input type="text" id="entreprise_post" name="coordonnees[entreprise_post]" class="large-text" value="<?php echo get_option( 'entreprise_post' ); ?>" /><br /><br />

						<label for="adresse_post">Adresse postale</label><br />
						<input type="text" id="adresse_post" name="coordonnees[adresse_post]" class="large-text" value="<?php echo get_option( 'adresse_post' ); ?>" /><br /><br />

						<label for="code_post">Code postal</label><br />
						<input type="text" id="code_post" name="coordonnees[code_post]" class="medium-text" value="<?php echo get_option( 'code_post' ); ?>" /><br /><br />

						<label for="ville_post">Ville</label><br />
						<input type="text" id="ville_post" name="coordonnees[ville_post]" class="medium-text" value="<?php echo get_option( 'ville_post' ); ?>" /><br /><br />
										
						<label for="email_post">Email</label><br />
						<input type="text" id="email_post" name="coordonnees[email_post]" class="medium-text" value="<?php echo get_option( 'email_post' ); ?>" /><br /><br />
						
						<label for="tel_post">Téléphone</label><br />
						<input type="text" id="tel_post" name="coordonnees[tel_post]" class="medium-text" value="<?php echo get_option( 'tel_post' ); ?>" /><br /><br />

						<label for="siret_post">SIRET</label><br />
						<input type="text" id="siret_post" name="coordonnees[siret_post]" class="medium-text" value="<?php echo get_option( 'siret_post' ); ?>" /><br />
						
						<p class="submit">
							<input type="submit" class="button-primary" name="panel_update" value="Sauvegarder">
						</p>
					</form>
				</div>
			</div>
			<?php Global $footer; echo $footer; ?>
		</div>
	<?php
	}

//==================================================================================================================================================
	//=================================================================================
	//Mise en forme des données
	//=================================================================================
//==================================================================================================================================================
	function WpCoordonnees(){
		$entreprise_post   = get_option('entreprise_post');
        $adresse_post   = get_option('adresse_post');
        $code_post   = get_option('code_post');
        $ville_post   = get_option('ville_post');
        $email_post   = get_option('email_post');
        $tel_post   = get_option('tel_post');
        $siret_post   = get_option('siret_post');
	?>
		<div class="coordonnees">
			<h2>Coordonnées</h2>
			<?php if(isset($entreprise_post)) : ?>
				<p class="entreprise">
					<strong>Nom entreprise :</strong>
					<?php echo $entreprise_post; ?>
				</p>
			<?php endif; ?>

			<?php if(!empty($adresse_post) && !empty($code_post) && !empty($ville_post)) : ?>
				<p class="adresse">
					<strong>Adresse Postale :</strong><br />
					<?php echo $adresse_post; ?><br />
					<?php echo $code_post; echo $ville_post; ?>
				</p>
			<?php endif; ?>

			<?php if(!empty($email_post)) : ?>
				<p class="email">
					<strong>Email :</strong>
					<?php echo $email_post; ?>
				</p>
			<?php endif; ?>

			<?php if(!empty($tel_post)) : ?>
				<p class="tel">
					<strong>Tél :</strong>
					<?php echo $tel_post; ?>
				</p>
			<?php endif; ?>

			<?php if(!empty($siret_post)) : ?>
				<p class="siret">
					<strong>SIRET :</strong>
					<?php echo $siret_post; ?>
				</p>
			<?php endif; ?>
		</div>
	<?php
	}

//==================================================================================================================================================
	//=================================================================================
	//Widget
	//=================================================================================
//==================================================================================================================================================
	include_once('widget.php');

//==================================================================================================================================================
	//=================================================================================
	//Shortcode
	//=================================================================================
//====================================================================================================================================
	include_once('shortcode.php')
?>