
<?php get_header(); ?>

<main class="container">
	<div class="row">
		<div class="col-sm-8">
			<section id="top_notice_board">
				<div id="brefing_heading"><div> Latest Notices </div></div>
				<div id="brefing_body">
					<ul id="news">
						<?php 
							// The Query
							$ary = array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'posts_per_page' => 4
							);
							$wp_query = new WP_Query( $ary );
						?>
						<?php if ( $wp_query->have_posts() ) : ?>
							<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
								<li><?php the_title(); ?></li>
							<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
			</section>
			<p class="clear"></p>	
			<div id="home_slider" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#home_slider" data-slide-to="0" class="active"></li>
					<li data-target="#home_slider" data-slide-to="1"></li>
					<li data-target="#home_slider" data-slide-to="2"></li>
					<li data-target="#home_slider" data-slide-to="3"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
					  <img src="<?php echo get_template_directory_uri(); ?>/images/slider/img1.jpg" alt="Chania">
					</div>

					<div class="item">
					  <img src="<?php echo get_template_directory_uri(); ?>/images/slider/img2.jpg" alt="Chania">
					</div>

					<div class="item">
					  <img src="<?php echo get_template_directory_uri(); ?>/images/slider/img3.jpg" alt="Flower">
					</div>

					<div class="item">
					  <img src="<?php echo get_template_directory_uri(); ?>/images/slider/img4.jpg" alt="Flower">
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#home_slider" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#home_slider" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="col-sm-4 notice">
			<div class="body">
				<div class="heading h4 text-center"><b> Latest Notices </b></div>
				<?php 
					// the query
					$ary = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 4,
						'paged' => get_query_var( 'paged' )
					);
					$wp_query = new WP_Query( $ary );
				?>
				<?php if ( $wp_query->have_posts() ) : ?>
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<div class="clearfix">
							<h5><b><?php the_post_thumbnail( 'thumbnail', array( "class"=>"pull-left" ) ); ?></b></h5>
							<h5><b><?php the_title(); ?></b></h5>
							<p class="text-right"><?php the_time('j/F/Y') ?></p>
						</div>
					<?php endwhile; ?>
					<div class="page_nav">
						<?php
							$big = 999999999; // need an unlikely integer
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages
							) );
						?>
						<a class="page-numbers pull-right" href="http://localhost/page/2/">See All</a>
					</div>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
	<p class="clear"></p>
	<div class="row">
		<div class="col-sm-4">
			<a class="btn btn-lg btn-block btn-primary" href="#"><i class="glyphicon glyphicon-eye-open"></i> Campus Tour</a>
		</div>
		<div class="col-sm-4">
			<a class="btn btn-lg btn-block btn-info" href="#"><i class="glyphicon glyphicon-calendar"></i> Academic Calender</a>
		</div>
		<div class="col-sm-4">
			<a class="btn btn-lg btn-block btn-danger" href="#"><i class="glyphicon glyphicon-education"></i> Campus Tour</a>
		</div>
	</div>
	<p class="clear"></p>
	<div class="row">
		<div class="col-sm-4">
			<section class="home_divider">
				<!-- Modal -->
				<div id="home_about" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 class="h1 text-center">Introducing Our School</h3>
								<p>
									Bangladesh International Tutorial was opened in August 1983, by the Founder-Principal Ms. Lubna Choudhury.
								</p>
								<p>
									The first buildings were situated in Gulshan and classes were from IX to XII.
								</p>
								<p>
									B.I.T. through the years has acquired land of five and a half acres (16.5 bighas) in Uttara Model Town and two large buildings have been constructed-- the Junior School and the Senior School -- classes range from Play Group to XII. Girl's School is under construction.
								</p>
								<p>
									However, the Uttara buildings have been made to accommodate 1800 students and as the school has well over 2000 students, we have retained three buildings in Gulshan. Classes begin from Play Group to VIII in the KG & COED campus -- the Girl's Section is from I -- XII.
								</p>
								<p>
									The new Senior School in Uttara was initially opened as The Red Brick School -- a sister concern of B.I.T. -- following the Cambridge Curriculum (CIE) in 2005. Later, this was merged with B.I.T. in 2012 which follows IGCSE & GCE Curriculum under EDEXCEL and University of London.
								</p>
								<p>
									A great emphasis is given to sports in this school -- hence three acres (9 bighas) has been allotted for games
								</p>
							</div>
						</div>

					</div>
				</div>
				<h4 class="text-center">Introducing Our School</h4>
				<p class="text-justify">
				Bangladesh International Tutorial was opened in August 1983, by the Founder-Principal Ms. Lubna Choudhury.
				The first buildings were situated in Gulshan and classes were from IX to XII.
				Bangladesh International Tutorial was opened in August 1983, by the Founder-PrincipalThe first buildings were situated in Gulshan and classes were from IX to XII.
				</p>
				<p><button class="btn btn-xs btn-default" data-toggle="modal" data-target="#home_about">Read More ... </button></p>
			</section>
		</div>
		<div class="col-sm-4">
			<section class="home_divider">
				<h4 class="text-center">Bulletin</h4>
				<?php 
					// the query
					$ary = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 4
					);
					$wp_query = new WP_Query( $ary );
				?>
				<?php if ( $wp_query->have_posts() ) : ?>
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<div class="home_item">
							<h5 class="text-center h5"><a href="#" class="link"><b><?php the_title(); ?></b></a></h5>
							<h5 class="text-center h5 small"><a href="#" class="link"><u><?php the_time('j/F/Y') ?></u></a></h5>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
				<p><button class="btn btn-xs btn-default">Read More ... </button></p>
			</section>
		</div>
		<div class="col-sm-4">
			<section class="home_divider">
				<!-- Modal -->
				<div id="home_pp" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 class="h1 text-center">Message From The Principal</h3>
								<p><img style="width:100%" src="<?php echo get_template_directory_uri(); ?>/images/pp.jpg"></p>
								<p>
									Bangladesh International Tutorial was opened in August 1983, by the Founder-Principal Ms. Lubna Choudhury.
								</p>
								<p>
									The first buildings were situated in Gulshan and classes were from IX to XII.
								</p>
								<p>
									B.I.T. through the years has acquired land of five and a half acres (16.5 bighas) in Uttara Model Town and two large buildings have been constructed-- the Junior School and the Senior School -- classes range from Play Group to XII. Girl's School is under construction.
								</p>
								<p>
									However, the Uttara buildings have been made to accommodate 1800 students and as the school has well over 2000 students, we have retained three buildings in Gulshan. Classes begin from Play Group to VIII in the KG & COED campus -- the Girl's Section is from I -- XII.
								</p>
								<p>
									A great emphasis is given to sports in this school -- hence three acres (9 bighas) has been allotted for games
								</p>
							</div>
						</div>

					</div>
				</div>
				<h4 class="text-center">Message From The Principal</h4>
				<p><img style="width:100%" src="<?php echo get_template_directory_uri(); ?>/images/pp.jpg"></p>
				<p class="text-justify">
				The first buildings were situated in Gulshan and classes were from IX to XII.
				</p>
				<p><button class="btn btn-xs btn-default" data-toggle="modal" data-target="#home_pp">Read More ... </button></p>
			</section>
		</div>
	</div>
	<p class="clear"></p>

</main>
	
<?php get_footer(); ?>