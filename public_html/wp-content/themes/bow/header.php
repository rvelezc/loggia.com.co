<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> > <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--[if ie]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
	
<title><?php wp_title( '|', true, 'right' ); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- wrapper -->
	<div class="wrapper">

		<!-- navigation -->
		<nav class="navigation">

			<div class="menu"><?php bow_top_nav_menu(); ?></div>

			<div class="footer">

				<div class="socials">

					<ul class="social">
						<?php bow_social_profile(); ?>
					</ul>

				</div>

				<div class="copyright">

					<div class="title"><?php bloginfo( 'name' ); ?></div>
					<div class="subtitle"><?php bow_footer_copyright(); ?></div>

				</div>

			</div>

		</nav>
		<!-- navigation -->


		<!-- header -->
		<header class="header">

			<div class="inner">

				<div class="logo"><?php bow_logo_type() ?></div>

				<div class="menu"></div>

			</div>

		</header>
		<!-- header -->


