<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/css?family=Arima+Madurai|Merienda" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	
	<?php wp_head(); ?>
	
	<style>
		
		body{
			background:<?php echo dash( 'color', 'color1', '#ffffff' ); ?>;
			color:<?php echo dash( 'color', 'color2', '#222222' ); ?>;
		}
		header #nav_bar,
		#top_notice_board #brefing_heading div,
		.notice .heading,
		.page_nav .page-numbers{
			background-color: <?php echo dash( 'color', 'color3', '#0a8bff' ); ?>;
			color: <?php echo dash( 'color', 'color1', '#ffffff' ); ?>;
		}
		.home_divider h4 {
			border-left: 5px solid <?php echo dash( 'color', 'color3', '#0a8bff' ); ?>;
		}
		.navbar-default .navbar-nav li:hover a,
		.navbar-default .navbar-nav li.open a,
		.navbar-default .navbar-nav li.active a,
		.navbar-default .navbar-nav li:hover ul li:hover a,
		.navbar-default .navbar-nav li.open ul li.open a,
		.navbar-default .navbar-nav li.active ul li.active a{
			background-color: <?php echo dash( 'color', 'color4', '#d02121' ); ?> !important;
		}
		ul.newsticker a,.p_title a, #actions a {
			color: <?php echo dash( 'color', 'color4', '#d02121' ); ?>;
		}
		.notice .prev {
			border-right: 1px solid <?php echo dash( 'color', 'color4', '#d02121' ); ?>;
			color: <?php echo dash( 'color', 'color3', '#0a8bff' ); ?>;
		}
		.notice .next {
			color: <?php echo dash( 'color', 'color3', '#0a8bff' ); ?>;
		}
		.notice .item{
			border-bottom: 1px solid <?php echo dash( 'color', 'color4', '#d02121' ); ?>;
		}
		.notice .vertical{
			border-top: 1px solid <?php echo dash( 'color', 'color4', '#d02121' ); ?>;
		}
		.navbar-default .navbar-nav li:hover ul,
		.navbar-default .navbar-nav li:hover ul a,
		.navbar-default .navbar-nav li.open ul,
		.navbar-default .navbar-nav li.open ul a,
		.navbar-default .navbar-nav li.active ul,
		.navbar-default .navbar-nav li.active ul a{
			background: <?php echo dash( 'color', 'color5', '#222222' ); ?> !important;
		}
		.tickercontainer,
		.home_divider{ 
			background: <?php echo dash( 'color', 'color6', '#f5f5f5' ); ?>; 
		}
		#wptRandom #wptTestimonials blockquote {
			color: <?php echo dash( 'color', 'color2', '#222222' ); ?>;
			border-left: 5px solid <?php echo dash( 'color', 'color7', '#80b808' ); ?>;
			border-right: 5px solid <?php echo dash( 'color', 'color7', '#80b808' ); ?>;
		}
		footer {
			background: <?php echo dash( 'color', 'color8', '#363636' ); ?>;
			color: <?php echo dash( 'color', 'color1', '#ffffff' ); ?>;
		}
	</style>
</head>
<body>
<header class="clearfix">
	<section id="top_nav">
		<div class="container">
			<div class="row">
				<div class="hidden-xs col-sm-8">
					<span class="align"><span class="glyphicon glyphicon-earphone"></span> <?php echo dash( 'top_headder', 'phone', '+8801788909010' ); ?></span>
					<span class="align"><span class="glyphicon glyphicon-envelope"></span> <?php echo dash( 'top_headder', 'email', 'labib2010@gmail.com' ); ?></span>
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="top_social">
						<a class="social-icon" href="<?php echo dash( 'top_headder', 'facebook', '#' ); ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Facebook">
						</a>
						<a class="social-icon" href="<?php echo dash( 'top_headder', 'google', '#' ); ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/google-plus.png" alt="Google Plus">
						</a>
						<a class="social-icon" href="<?php echo dash( 'top_headder', 'twitter', '#' ); ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Twitter">
						</a>
						<div class="clear"></div>					
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="main_head">
		<div class="container">
			<h1 class="title text-uppercase"><a href="<?php echo bloginfo("url"); ?>"><img class="logo" src="<?php echo dash( 'headder_logo', 'logo', get_template_directory_uri().'/images/logo.png' ); ?>"></a> <?php echo bloginfo("name"); ?> </h1>
		</div>
	</section>
	<nav id="nav_bar" class="navbar navbar-default text-uppercase">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".site_nav_top">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
			</div>
			<?php 
				$args = array('theme_location' => 'primary', 
					'container_class' => 'site_nav_top navbar-collapse collapse', 
					'menu_class' => 'nav navbar-nav',
					'fallback_cb' => '',
			        'menu_id' => 'main-menu',
			        'walker' => new Upbootwp_Walker_Nav_Menu()); 
				wp_nav_menu($args);
			?>
		</div>
	</nav>
</header>