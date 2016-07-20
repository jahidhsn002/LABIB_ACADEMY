
<?php get_header(); ?>

<main class="container">
	<div class="row">
		<div class="col-sm-8">
			<section id="top_notice_board">
				<div id="brefing_heading"><div> <?php echo dash( 'home', 'latest_notices', 'Latest Notices' ); ?> </div></div>
				<div id="brefing_body">
					<ul id="news">
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
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>
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
					  <img src="<?php echo dash( 'slider', 'slider1', get_template_directory_uri(). '/images/slider/img1.jpg' ); ?>" alt="Chania">
					</div>

					<div class="item">
					  <img src="<?php echo dash( 'slider', 'slider2', get_template_directory_uri(). '/images/slider/img2.jpg' ); ?>" alt="Chania">
					</div>

					<div class="item">
					  <img src="<?php echo dash( 'slider', 'slider3', get_template_directory_uri(). '/images/slider/img3.jpg' ); ?>" alt="Flower">
					</div>

					<div class="item">
					  <img src="<?php echo dash( 'slider', 'slider4', get_template_directory_uri(). '/images/slider/img4.jpg' ); ?>" alt="Flower">
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
				<?php dynamic_sidebar('sidebar-2'); ?>
				<div class="page_nav clearfix">
					<a class="page-numbers pull-right" href="<?php echo dash( 'home', 'sea_link', '#' ); ?>"><?php echo dash( 'home', 'sea', 'See All' ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<p class="clear"></p>
	<div class="row">
		<div class="col-sm-4">
			<a class="btn btn-lg btn-block btn-primary text-uppercase" href="<?php echo dash( 'home', 'gallery_link', '#' ); ?>"><i class="glyphicon glyphicon-camera"></i> &nbsp; <?php echo dash( 'home', 'gallery', 'Gallery' ); ?></a>
		</div>
		<div class="col-sm-4">
			<a class="btn btn-lg btn-block btn-info text-uppercase" href="<?php echo dash( 'home', 'calender_link', '#' ); ?>"><i class="glyphicon glyphicon-calendar"></i> &nbsp; <?php echo dash( 'home', 'calender', 'Academic Calender' ); ?></a>
		</div>
		<div class="col-sm-4">
			<a class="btn btn-lg btn-block btn-danger text-uppercase" href="<?php echo dash( 'home', 'campus_link', '#' ); ?>"><i class="glyphicon glyphicon-education"></i> &nbsp; <?php echo dash( 'home', 'campus', 'Campus Tour' ); ?></a>
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
							<div class="modal-body text-justify">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 class="h1 text-center"><?php echo dash( 'home', 'intro', 'Introducing Our School' ); ?></h3>
								<div><?php echo dash( 'home', 'intro_short', '
									<p class="h3 text-center"> السلام عليكم و رحمة الله و بركة ه </p>
									<p>All praises belong to our lord Allah Subhanahu wa ta’ala who created us as Muslim. Acquiring knowledge is obligatory for every Muslim man and woman. In our society , the education is meant to general education. Every conscious parents try to admit their child to renowned educational institutions for better education. Parents try to find out the institutions according to their mentality. We all know that, there are two types of institutions prevailing in our society. One is general education, where students are taught general subjects like Bangla, English, and Physics etc excluding the Islamic knowledge. On the other hand, in Islamic education system the students learn only Islamic subjects. But, both are simultaneously essential. </p>
									<p>Labib Academy Bangladesh has been established in the year 2010 with the view to introduce an integrated approach of both the systems.   Presently, the academy is running its activities from Nursery to Class VIII. Besides, the academy made it obligatory to learn recitation from the Holy Quran accurately.   The students with brilliance have an opportunity to memorize the Holy Quran (Hifzul Quran). The academy offers both facilities of residential and non-residential.  </p>
									<p>We hope success of your children in the world and the hereafter.</p>
								' ); ?></div>
							</div>
						</div>

					</div>
				</div>
				<h4 class="text-center"><?php echo dash( 'home', 'intro', 'Introducing Our School' ); ?></h4>
				<div><?php echo dash( 'home', 'intro_dec', '
									<p class="text-justify">
										All praises belong to our lord Allah Subhanahu wa ta’ala who created us as Muslim. Acquiring knowledge is obligatory for every Muslim man and woman. In our society , the education is meant to general education. Every conscious parents try to admit their child to renowned educational institutions for better education. Parents try to find out the institutions according to their mentality . . . . .
									</p>
				' ); ?></div>
				<p><button class="btn btn-xs btn-default" data-toggle="modal" data-target="#home_about">Read More ... </button></p>
			</section>
		</div>
		<div class="col-sm-4">
			<section class="home_divider testimonial">
				<h4 class="text-center"><?php echo dash( 'home', 'test', 'Islam and Muslim' ); ?></h4>
				<div class="clearfix">
				<?php
					echo do_shortcode( dash( 'home', 'test_short', '[wpt_random]' ) );
					
				?>
				</div>
				</br>
				<p><a href="<?php echo dash( 'home', 'test_link', '#' ); ?>" class="btn btn-xs btn-default">Read More ... </a></p>
			</section>
		</div>
		<div class="col-sm-4">
			<section class="home_divider">
				<!-- Modal -->
				<div id="home_pp" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-body text-justify">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 class="h1 text-center"><?php echo dash( 'home', 'masage', 'Message From The Director' ); ?></h3>
								<div>
									<?php echo dash( 'home', 'masage_dec', '
										<p class="h3 text-center">بسم الله الرحمن الرحيم</p>
										<p><img style="width:100%" src="'. get_template_directory_uri() .'/images/pp.jpg"></p>
										<p>
											Al-hamdulillah. In 2010 Labib Academy Bangladesh was established with the view to offer integrated approach of both General and Islamic education. Since then, the academy is running under a committee with reputed educationists having religious mentality.
										</p>
										<p>
											In the initial stage, the academy started with a very few students from the adjacent locality. But now it attracted a huge number of students from all over the country. In the mean time, students from this academy faced PEC and JSC Examinations with excellent results. Besides, more than 30 students completed Hifzul Quran and around 80 students are going to be completed.
										</p>
										<p>
											We have a plan to expand academic level up to Class XII soon. Within the academic calendar our students will cover Arabic language (writing and spoken), interpretation of Holy Quran and Hadith (Riadus Salihin).
										</p>
										<p>
										We already introduced website in the name of http:labibacademy.net for easy communication and access to all. We welcome all sorts of suggestions, comments from our well wishers.
										</p>
										<p>
										May Allah accept our Endeavour and enlighten us here and hereafter.
										</p></br>
										<p>
											Regards,</br></br>
											<img src="'. get_template_directory_uri() .'/images/sign.png"></br>

											Md. Lutfar Rashid </br>
											Director </br>
											Labib Academy Bangladesh
										</p>
									' ); ?>
								</div>
							</div>
						</div>

					</div>
				</div>
				<h4 class="text-center"><?php echo dash( 'home', 'masage', 'Message From The Director' ); ?></h4>
				<div><?php echo dash( 'home', 'masage_short', '
					<p><img style="width:100%" src="'. get_template_directory_uri() .'/images/pp.jpg"></p>
					<p class="text-justify">
						Al-hamdulillah. In 2010 Labib Academy Bangladesh was established with the view to offer integrated . . . . .
					</p>
				' ); ?>
				</div>
				<p><button class="btn btn-xs btn-default" data-toggle="modal" data-target="#home_pp">Read More ... </button></p>
			</section>
		</div>
	</div>
	<p class="clear"></p>

</main>
	
<?php get_footer(); ?>