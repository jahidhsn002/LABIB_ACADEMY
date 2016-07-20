<?php get_header(); ?>

<div class="page_back_image container-fluid" style="background:url('<?php if( has_post_thumbnail() ){ echo the_post_thumbnail_url('full'); }else{ echo get_template_directory_uri().'/images/banner.jpg'; } ?>')">
	<div class="page_back clearfix">
		<p><br/><br/><br/></p>
		<h1 class="h2 text-center text-uppercase"><?php the_title(); ?></h1>
		<p><br/><br/><br/></p>
	</div>
</div>

<main class="container">
	<div class="row">
		<div class="col-sm-3">
			<section id="sidebar">
				<?php dynamic_sidebar('sidebar-1'); ?>
			</section>
		</div>
		<div class="col-sm-6">
			<section id="main">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</section>
		</div>
		<div class="col-sm-3">
			<section id="sambol">
				<img width="100%" src="<?php echo do_shortcode(dash( 'contact', 'sidebar_img', get_template_directory_uri().'/images/right-long.png' )); ?>" alt="Sidebar Image">
			</section>
		</div>
	</div>
</main>

<?php get_footer(); ?>