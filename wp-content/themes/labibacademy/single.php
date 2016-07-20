<?php get_header(); ?>

<main class="container">
	<div class="row">
		<div class="col-sm-9 height_22">
			<section id="main row">
				<?php if ( $wp_query->have_posts() ) : ?>
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<div class="col-sm-2">
							<h3 class="text-right">
								<span class="h5"><?php the_time('l') ?></span><br/>
								<span class="h2"><b><?php the_time('jS') ?></b></span><br/>
								<span class="h3"><b><?php the_time('F') ?></b></span><br/>
								<span class="h5"><?php the_time('Y') ?></span>
							</h3>
						</div>
						<div class="col-sm-10">
							<h3 class="h2"><b><?php the_title(); ?></b></h3>
							<h5>Posted By <small><?php the_author(); ?></small></h5>
							<p><?php the_content(); ?></p>
						</div>
						<p class="col-sm-12"></p>
					<?php endwhile; ?>
				<?php endif; ?>
			</section>
		</div>
		<div class="col-sm-3">
			<img width="100%" src="<?php echo do_shortcode(dash( 'contact', 'sidebar_img', get_template_directory_uri().'/images/right-long.png' )); ?>" alt="Sidebar Image">
		</div>
	</div>
</main>

<?php get_footer(); ?>