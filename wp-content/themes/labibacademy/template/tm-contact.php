
<?php 
// Template Name: Contacts
get_header(); ?>

<div class="page_back_image container-fluid" style="background:url('<?php if( has_post_thumbnail() ){ echo the_post_thumbnail_url('full'); }else{ echo get_template_directory_uri().'/images/banner.jpg'; } ?>')">
	<div class="page_back clearfix">
		<p><br/><br/><br/></p>
		<h1 class="h2 text-center text-uppercase"><?php the_title(); ?></h1>
		<p><br/><br/><br/></p>
	</div>
</div>

<main class="container">
	<div class="row">
		<div class="col-sm-8">
			<div>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
			</br>
			<section id="GoogleMap">
				<div id="googleMap" style="width:100%;height:300px;"></div>
				<script src="http://maps.googleapis.com/maps/api/js"></script>
				<script>
					var myCenter=new google.maps.LatLng(<?php echo dash( 'contact', 'gmap', '23.769092, 90.362907' ); ?>);

					function initialize(){
						var mapProp = {
							center:myCenter,
							zoom:12,
							mapTypeId:google.maps.MapTypeId.ROADMAP
						};

						var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

						var marker=new google.maps.Marker({
							position:myCenter
						});
						
						marker.setMap(map);
						
						var infowindow = new google.maps.InfoWindow({
							content:"<div class='text-center'><h4><?php echo bloginfo("name"); ?></h4><?php echo bloginfo("title"); ?></div>"
						});

						infowindow.open(map,marker);

						
					}

					google.maps.event.addDomListener(window, 'load', initialize);
				</script>
			</section>
			</br>
		</div>
		<div class="col-sm-4">
			<section id="main">
				<?php echo do_shortcode(dash( 'contact', 'gmap', '[contact-form-7 id="6" title="Contact form 1"]' )); ?>
			</section>
		</div>
	</div>
</main>

<?php get_footer(); ?>