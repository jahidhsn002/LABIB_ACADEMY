
<?php 
// Template Name: News & Events
get_header(); ?>

<main class="container">
	<div class="row">
		<div class="col-sm-12">
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
							<h3 class="h2"><a class="mm_cc" href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a></h3>
							<h5>Posted By <small><?php the_author(); ?></small></h5>
							<p><?php the_content(); ?></p>
						</div>
						<p class="col-sm-12"></p>
					<?php endwhile; ?>
					<div class="page_nav pager">
						<?php
							$big = 999999999; // need an unlikely integer
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages
							) );
						?>
					</div>
				<?php endif; ?>
			</section>
		</div>
	</div>
</main>

<?php get_footer(); ?>