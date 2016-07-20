<?php
/*
Plugin Name: Newstastic Post Slider
Plugin URI: http://www.modus.ie
Description: This little widget will display your posts from all or selected categories in a horizonal or vertical format, you can select a few options on what you'd like to show and set the width, height etc. This is a first release so we welcome feedback. If you'd like us to customise it for your site, let us know. TIP! Images not working? On some servers you may need to reset the permissions of the cache folder, if that doesn't work, take a look at the /inc/timthumb-config.php file, add the correct path there and uncomment;)
Version: 1.2.3
Author: David Henry
Author URI: http://www.modus.ie
*/





add_action('init', 'ns_add_script_fn');
function ns_add_script_fn(){
$config = get_option('ds_config');

   if(!is_admin()){
  // Jquery slider
  wp_enqueue_script('j_tools_js',  plugins_url('/js/scroller.js', __FILE__ ), array( 'jquery' ), '1.0' ) ;

  // main JS and CSS
  wp_enqueue_script('main_js', plugins_url('/js/front.js', __FILE__ ), array( 'jquery' ), '1.0' ) ;
  wp_enqueue_style('main_css', plugins_url('/css/front.css', __FILE__ ) );
  wp_enqueue_style('join_css', plugins_url('/css/join.css', __FILE__ ) );
  }else{
    wp_enqueue_script('ds_admin_js', plugins_url('/js/admin.js', __FILE__ ), array( 'jquery' ), '1.0' ) ;
   wp_enqueue_style('ds_admin_css', plugins_url('/css/admin.css', __FILE__ ) );

   }
}

add_shortcode('show_slider', 'show_slider');
function show_slider(){
$config = get_option('ds_config');

}
function get_the_excerpt_id($post_id) {
  global $post;
  $save_post = $post;
  $post = get_post($post_id);
  $output = get_the_excerpt();
  $post = $save_post;
  return $output;
}

/**
 * Foo_Widget Class
 */
class news_slider extends WP_Widget {
	/** constructor */
	function __construct() {
		parent::WP_Widget( /* Base ID */'news_slider', /* Name */'News Slider', array( 'description' => 'News Slider' ) );
	}

	function use_scripts(){
		echo '!!!';
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		$args = array(
	    'show_option_all'    => 'All' ,
	    'orderby'            => 'ID',
	    'order'              => 'ASC',
	    'show_count'         => 0,
	    'hide_empty'         => 0,
	    'child_of'           => 0,
	    'echo'               => 0,
	    'selected'           => $cat,
	    'hierarchical'       => 0,
	    'name'               => $this->get_field_name('cat'),
	    'class'              => 'postform',
	    'depth'              => 0,
	    'tab_index'          => 0,
	    'taxonomy'           => 'category',
	    'hide_if_empty'      => false ); ?>
          <?php $cat_objects = get_categories( $args );		  ?>
          <?php
		  $cat[] = apply_filters( 'widget_title', $instance['all'] );
		  $cat['all'] = 	esc_attr( $instance[ 'all' ] );
		  foreach($cat_objects as $cat_objects_out){
				if($instance[$cat_objects_out->slug]) {
					$cat[] = apply_filters( 'widget_title', $instance[$cat_objects_out->slug] );
				}
		  }

		$args=array(
		  'public'   => true
		);
		$output = 'names';

		$post_types=get_post_types($args);
		$post_type[] = apply_filters( 'widget_title', $instance['pall'] );
		/* $post_type['pall'] = 	esc_attr( $instance[ 'pall' ] ); */
		 foreach($post_types as $post_types_out):
			$post_type[] = apply_filters( 'widget_title', $instance[$post_types_out] );
		 endforeach;

		$sl_width = apply_filters( 'widget_title', $instance['sl_width'] );
		$sl_height = apply_filters( 'widget_title', $instance['sl_height'] );
		$thumb_width = apply_filters( 'widget_title', $instance['thumb_width'] );
		$thumb_hight = apply_filters( 'widget_title', $instance['thumb_hight'] );
		$image_align = apply_filters( 'widget_title', $instance['image_align'] );
		$post_num = apply_filters( 'widget_title', $instance['post_num'] );
		$post_show = apply_filters( 'widget_title', $instance['post_show'] );
		$slider_align = apply_filters( 'widget_title', $instance['slider_align'] );

		//New Changes Start
		$article_layout = apply_filters( 'widget_title', $instance['article_layout'] );
		$article_image = apply_filters( 'widget_title', $instance['article_image'] );
		$article_content = apply_filters( 'widget_title', $instance['article_content'] );
		$article_start = apply_filters( 'widget_title', $instance['article_start'] );
		$autoscroll = apply_filters( 'widget_title', $instance['autoscroll'] );
		$autoscroll_delay = apply_filters( 'widget_title', $instance['autoscroll_delay'] );
		//New Changes End

		$display_image = apply_filters( 'widget_title', $instance['display_image'] );
		$show_title = apply_filters( 'widget_title', $instance['show_title'] );
		$show_content = apply_filters( 'widget_title', $instance['show_content'] );
		$show_author = apply_filters( 'widget_title', $instance['show_author'] );
		$show_date = apply_filters( 'widget_title', $instance['show_date'] );
		$cont_max = apply_filters( 'widget_title', $instance['cont_max'] );
		$title_max = apply_filters( 'widget_title', $instance['title_max'] );
		$ef_speed = apply_filters( 'widget_title', $instance['ef_speed'] );
		$extra_link_title = apply_filters( 'widget_title', $instance['extra_link_title'] );
		$extra_link_address = apply_filters( 'widget_title', $instance['extra_link_address'] );

		//echo '<link rel="stylesheet" type="text/css" media="all" href="'.plugins_url('/css/join.css', __FILE__ ).'" />';
		/*** Fixed IE issue */
		 if( $slider_align == 'hor' ){
		 echo '<link rel="stylesheet" type="text/css" media="all" href="'.plugins_url('/css/hor.css', __FILE__ ).'" />';
		 echo '<link rel="stylesheet" type="text/css" media="all" href="'.plugins_url('/css/button.css', __FILE__ ).'" />';
		 echo '<link rel="stylesheet" type="text/css" media="all" href="'.plugins_url('/css/nav.css', __FILE__ ).'" />';
  		}else{
				echo '<link rel="stylesheet" type="text/css" media="all" href="'.plugins_url('/css/vert.css', __FILE__ ).'" />';
		}
		 /***/
		add_action(  'init', 'use_scripts' );
		$rand_id =  rand(111, 999);
		//echo "<div id='scroll_slider_section_".$rand_id ."' >";
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }

		##########################################################################################################
		/*New Changes Start*/
	   $argss= array();
	   $argss['showposts']= $post_num;
	   if( (in_array('all', $cat)) ){
	   }
	   else{
	      $cat_slugs = implode(',', $cat);
		  if($cat_slugs!=',' ) {  $argss['category_name'] = $cat_slugs; }
	    }

	   if( in_array('all', $post_type) ){
			$aargs=array(
				'public'   => true,
			);
			$output = 'names';

			$post_types=get_post_types($aargs);
			foreach($post_types as $post_types_out):
				$argss['post_type'][] =   $post_types_out;
			 endforeach;
	   }
	   else {
			$argss['post_type'] = $post_type;
	   }

	   $all_posts = get_posts( $argss );
	   $total_index = 0;
	   $total_count = count( $all_posts );

	   $block_count = $total_count / (int)$post_show;

	   if( $total_count % (int)$post_show != 0 ){
			$block_count = floor($block_count) + 1;
	   }else{
			$block_count = floor($block_count);
	   }

       $list_cnt=0;
	   $list_array=array();
	   for($k=1; $k <= (int)$block_count ; $k++){
		   for( $j=1; $j <= (int)$post_show; $j++ ){
			    if( !$all_posts[ $total_index ] )
			     	break;
			    $cur_item = $all_posts[ $total_index ]; $total_index++;
	            ############################################################################################################
	   			if($display_image == 'on') {
	        		 $src = wp_get_attachment_image_src(get_post_thumbnail_id($cur_item->ID), 'thumbnail');

					 $files = get_children('post_parent='.$cur_item->ID.'&amp;post_type=attachment&amp;post_mime_type=image');
					 $this_image = null;
					 $first = 0;
					 foreach( $files as $files_out ){
					 	if( $first == 0 ){
							$this_image = $files_out;
							$first++;
						}
					 }

					 if( $src[0] ) {
					 	  $img_url=plugins_url('/inc/timthumb.php', __FILE__).'?src='.$src[0].'&amp;w='.$thumb_width.'&amp;h='.$thumb_hight;
					 }
					 elseif( $this_image->guid  ){
					 	$img_url=plugins_url('/inc/timthumb.php', __FILE__).'?src='.$this_image->guid.'&amp;w='.$thumb_width.'&amp;h='.$thumb_hight;
					 }
	     			 else{
          				if($article_image=='default'){
          					  $img_url=plugins_url('/inc/timthumb.php', __FILE__).'?src='.plugins_url('/images/no_image.jpg', __FILE__).'&amp;w='.$thumb_width.'&amp;h='.$thumb_hight;
          				}
	     			 }

					 if(!empty($img_url)){
					 	 if( $image_align == 'left' ) $img_align_class=' fl_l '; else $img_align_class=' fl_r ';
					 	$img_src='<img class="'.$img_align_class.'" src="'.$img_url.'"  alt="'.$cur_item->post_title.'" style="margin-top:5px;" />';
					 }
				}
	            ########################################################################################################
				if( $show_title == 'on' ) {
					$out_cont = substr($cur_item->post_title, 0, (int)$title_max -3 );

					$p_title_link='<a href="'.get_permalink($cur_item->ID).'">'.$out_cont.'</a>';
				}
				$p_title=$p_title_link;

				if( $show_author == 'on' ) {
					$user_info = get_userdata( $cur_item->post_author );
					$meta_author=$user_info->user_login;
				}
				if( $show_date == 'on' ) {
					$cur = strtotime( $cur_item->post_date );
					$meta_date=date( 'Y-m-d H:i', $cur );
				}
	            $p_meta=$meta_author." ".$meta_date;

	            if( $show_content == 'on' ) {
	            	if($article_content=='excerpt'){
                       $out_cont = substr( strip_tags( get_the_excerpt_id( $cur_item->ID ) ), 0, (int)$cont_max -3 );
                       if(empty($out_cont)){
                       	   $out_cont = substr( strip_tags( $cur_item->post_content ), 0, (int)$cont_max -3 );
                       }
	            	}else{
	            		$out_cont = substr( strip_tags( $cur_item->post_content ), 0, (int)$cont_max -3 );
	            	}
	            }
	            $p_content=$out_cont.'';

	            #######################################################################################################
	            if($article_start<=($list_cnt+1)) {
                     $first_array[]=array('p_title'=>$p_title,'p_meta'=>$p_meta,'p_content'=>$p_content,'p_img'=>$img_src);
	            }else{
                   	 $second_array[]=array('p_title'=>$p_title,'p_meta'=>$p_meta,'p_content'=>$p_content,'p_img'=>$img_src);
	            }

	            $list_cnt++;
	   	   }
		}
		if(!empty($first_array) && !empty($second_array)){
			$list_array = array_merge_recursive( $first_array , $second_array );
		}else if(!empty($first_array)){
            $list_array = $first_array;
		}else if(!empty($second_array)){
            $list_array = $second_array;
		}
        /*echo "<pre>";
        var_dump($list_array);
        echo "</pre>"; */

		/*New Changes End*/
       if($article_layout == 'no'){
       		$display_image = '';
       }
	   if( $slider_align == 'hor' ){
		 ?>
			<!-- Start Hor Block -->
			<div class="nav_block">
				<div class="navi"></div>
				<div id="actions_<?php echo $rand_id ; ?>">
					<a class="next">next</a>
				    <a class="prev">previous</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- Start Hor content -->
			<div class="scrollable" id="browsable_<?php echo $rand_id; ?>" >
			   <div class="items">
				   <?php
				   $list_cnt=0;
				   for($k=1; $k <= (int)$block_count ; $k++){
					  ?>
					  <div class="in_div">
						<?php
						for( $j=1; $j <= (int)$post_show; $j++ ) {
							if(empty($list_array[$list_cnt]['p_img'])){
					       		$display_image = '';
					        }
							?>
							<div class="over_div <?php if( $j != 1 ) echo ' br_r '; ?>">
									<?php
									if($article_layout == 'bottom') {
										?>
										<div class="p_title" style="margin-left:10px;margin-bottom:5px;"><?php echo $list_array[$list_cnt]['p_title']; ?></div>
										<?php
										if($display_image == 'on') { ?>
										 <div class="post_cont <?php if( $image_align == 'left' ) echo ' fl_r '; else echo ' fl_l '; ?>">
										<?php } else { ?>
											 <div class="post_wimg">
										<?php } ?>
											<div class="p_meta"><?php echo $list_array[$list_cnt]['p_meta']; ?></div>
											<div class="p_content"><?php echo $list_array[$list_cnt]['p_content']; ?></div>
										 </div>
										 <?php
										 if($display_image == 'on') {
						     			 	echo $list_array[$list_cnt]['p_img'];
						     			 }
									}
									else{
										if($display_image == 'on') { ?>
										 <div class="post_cont <?php if( $image_align == 'left' ) echo ' fl_r '; else echo ' fl_l '; ?>">
										<?php } else { ?>
											 <div class="post_wimg">
										<?php } ?>
											<div class="p_title"><?php echo $list_array[$list_cnt]['p_title']; ?></div>
											<div class="p_meta"><?php echo $list_array[$list_cnt]['p_meta']; ?></div>
											<div class="p_content"><?php echo $list_array[$list_cnt]['p_content']; ?></div>
										 </div>
										 <?php
										 if($display_image == 'on') {
						     			 	echo $list_array[$list_cnt]['p_img'];
						     			 }
					     			}
									?>
							 </div>
							 <?php
							 $list_cnt++;
						}
					  ?>
					  </div>
					  <?php
					}
				   ?>
			   </div>
			   <div class="clearfix" ></div>
			</div>
			<div class="clearfix" ></div>
		    <?php
	   }
	   if( $slider_align == 'vert' ){
		    ?>
			<!-- start Ver Block -->
			<div class="navi"></div>
			<div id="actions_<?php echo $rand_id; ?>">
			    <a class="prev">previous</a>
			    <a class="next">next</a>
			</div>

			<!-- root element for scrollable -->
			<div class="scrollable_ver vertical" id="vertical_<?php echo $rand_id; ?>">
			   <div class="items">
			      <?php
					   $list_cnt=0;
					   for($k=1; $k <= (int)$block_count ; $k++){ ?>
						<div class="in_div">
						   <?php
						   for( $j=1; $j <= (int)$post_show; $j++ ) {
							?>
							<div class="over_div">
								<?php
								if($article_layout == 'bottom') {
                                   ?>
									<div class="p_title" style="margin-left:10px;margin-bottom:5px;"><?php echo $list_array[$list_cnt]['p_title']; ?></div>
									<?php
									if($display_image == 'on') { ?>
									 <div class="post_cont <?php if( $image_align == 'left' ) echo ' fl_r '; else echo ' fl_l '; ?>">
									<?php } else { ?>
										 <div class="post_wimg">
									<?php } ?>
										<div class="p_meta"><?php echo $list_array[$list_cnt]['p_meta']; ?></div>
										<div class="p_content"><?php echo $list_array[$list_cnt]['p_content']; ?></div>
									 </div>
									 <?php
									 if($display_image == 'on') {
					     			 	echo $list_array[$list_cnt]['p_img'];
					     			 }
								}
								else{
									if($display_image == 'on') { ?>
									 <div class="post_cont <?php if( $image_align == 'left' ) echo ' fl_r '; else echo ' fl_l '; ?>">
									<?php } else { ?>
										 <div class="post_wimg">
									<?php } ?>
										<div class="p_title"><?php echo $list_array[$list_cnt]['p_title']; ?></div>
										<div class="p_meta"><?php echo $list_array[$list_cnt]['p_meta']; ?></div>
										<div class="p_content"><?php echo $list_array[$list_cnt]['p_content']; ?></div>
									 </div>
									 <?php
									 if($display_image == 'on') {
									 	echo $list_array[$list_cnt]['p_img'];
									 }
								 }
								 ?>
								 <div class="clearfix"></div>
							 </div>

						   <?php
						    $list_cnt++;
						   } ?>
						</div>
						<?php
					  }
					  ?>
			   </div>
			   <div class="clearfix" ></div>
			</div>
		     <?php
	   }
	   if($extra_link_title){
			 ?>
				<div id= "extra_link_<?php echo $rand_id; ?>" class="extra_link"><a href="<?php echo $extra_link_address; ?>"><?php echo $extra_link_title; ?></a> </div>
			<?php
	   }
		####################################################################################
		if( $slider_align == 'hor' ){
			$width = (int)$sl_width;
			$block_width = ($width / $post_show) -2;
			//
			$image_width_2count = (int)$thumb_width + 20;
			$content_width = $block_width - $image_width_2count -30 ;

			?>
			<style type="text/css">
				#browsable_<?=$rand_id?> .post_cont {
					width:<?=$content_width?>px;
				}
				#browsable_<?=$rand_id?> .over_div {
					width: <?=$block_width?>px;
				}
				#browsable_<?=$rand_id?> .nav_block{
					width: <?=$width?>px;
				}
				#browsable_<?=$rand_id?>{
					display: block;
					width: <?=$width?>px;
					height:<?=$sl_height?>px;
					/* padding: 10px; */
				}
				#browsable_<?=$rand_id?> .items .in_div {
					width:<?=$width?>px;
				}
				#extra_link_<?=$rand_id?>{
					float: right;
				    margin-right: 30px;
				    text-align: right;
					width:<?=$width?>px;
				}
				#scroll_slider_section_<?=$rand_id?>{
					width:<?=$width?>px;
				}
			</style>
			<script type="text/javascript">
				jQuery(function() {
					<?php
					if($autoscroll=='on' && !empty($autoscroll_delay)){
      					?>
      					jQuery("#browsable_<?php echo $rand_id; ?>").scrollable({circular: true,speed: <?php echo $ef_speed; ?>}).autoscroll(<?php echo $autoscroll_delay; ?>).navigator();
      					<?php /*jQuery("#browsable_<?php echo $rand_id; ?>").scrollable({speed: <?php echo $ef_speed; ?>}).autoscroll(<?php echo $autoscroll_delay; ?>).navigator(); */?>
      					<?php
					}else{
						?>
						jQuery("#browsable_<?php echo $rand_id; ?>").scrollable({ speed: <?php echo $ef_speed; ?>}).navigator();
						<?php
					}
					?>
				});
			</script>
			<?php
		}
		if( $slider_align == 'vert' ){
			$height_block = $sl_height;
			$width_block = $sl_width;

			$image_width_2count = (int)$thumb_width + 20;
			$content_width = $width_block - $image_width_2count -20 ;

			$in_div_height = ($height_block / $post_show) -2;
			?>
			<style type="text/css">
				#vertical_<?php echo $rand_id; ?> {
					position:relative;
					overflow:hidden;
					width: <?php echo $width_block ; ?>px;
					height:<?php echo  $sl_height; ?>px;
				}
				#actions_<?php echo $rand_id; ?> {
					width: <?php echo $width_block ; ?>px;
				}
				#actions_<?php echo $rand_id; ?> .next {
				    cursor: pointer;
				    float: none;
					width: <?php echo $width_block ; ?>px;
				}
				#actions_<?php echo $rand_id; ?> .prev {
				    cursor: pointer;
				    float: none;
					width: <?php echo $width_block ; ?>px;
				}
				.over_div {
					margin-bottom: 8px;
				}

				#extra_link_<?php echo$rand_id ?>{
					float: right;
				    margin-right: 30px;
				    text-align: right;
					width:<?php echo $width_block ; ?>px;
				}

				#vertical_<?php echo $rand_id; ?> .items {
				  position:absolute;
				  height:20000em;
				}
				#scroll_slider_section_<?php echo $rand_id; ?>{
					width:<?php echo $width_block ; ?>px;
				}
			</style>
			<script type="text/javascript">
				jQuery(function() {
					<?php
					if($autoscroll=='on' && !empty($autoscroll_delay)){
      					?>
      					jQuery("#vertical_<?php echo $rand_id; ?>").scrollable({vertical: true, circular: true,speed: <?php echo $ef_speed; ?>}).autoscroll(<?php echo $autoscroll_delay; ?>).navigator();
      					<?php /*jQuery("#vertical_<?php echo $rand_id; ?>").scrollable({vertical: true, speed: <?php echo $ef_speed; ?>}).autoscroll(<?php echo $autoscroll_delay; ?>).navigator();*/?>
      					<?php
					}else{
						?>
						jQuery("#vertical_<?php echo $rand_id; ?>").scrollable({ vertical: true, speed: <?php echo $ef_speed; ?>}).navigator();
						<?php
					}
					?>
				});
			</script>
			<?php
		}
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

			$args = array(
				'show_option_all'    => 'All' ,
				'orderby'            => 'ID',
				'order'              => 'ASC',
				'show_count'         => 0,
				'hide_empty'         => 0,
				'child_of'           => 0,
				'echo'               => 0,
				'selected'           => $cat,
				'hierarchical'       => 0,
				'name'               => $this->get_field_name('cat'),
				'class'              => 'postform',
				'depth'              => 0,
				'tab_index'          => 0,
				'taxonomy'           => 'category',
				'hide_if_empty'      => false ); ?>
          <?php $cat_objects = get_categories( $args );		  ?>
          <?php
		  $instance['all'] = strip_tags($new_instance['all']);
		  foreach($cat_objects as $cat_objects_out){
				//$cat[$cat_objects_out->slug] = 	esc_attr( $instance[ $cat_objects_out->slug ] );
				$instance[$cat_objects_out->slug] = strip_tags($new_instance[$cat_objects_out->slug]);
		  }

		$args=array(
		  'public'   => true
		);
		$output = 'names';

		$post_types=get_post_types($args);

		$instance['pall'] = strip_tags($new_instance['pall']);

		foreach($post_types as $post_types_out):
			$instance[$post_types_out] = strip_tags($new_instance[$post_types_out]);
		 endforeach;

			$instance['sl_width'] = strip_tags($new_instance['sl_width']);
			$instance['sl_height'] = strip_tags($new_instance['sl_height']);
			$instance['thumb_width'] = strip_tags($new_instance['thumb_width']);
			$instance['thumb_hight'] = strip_tags($new_instance['thumb_hight']);
			$instance['image_align'] = strip_tags($new_instance['image_align']);
			$instance['post_num'] = strip_tags($new_instance['post_num']);
			$instance['post_show'] = strip_tags($new_instance['post_show']);
			$instance['slider_align'] = strip_tags($new_instance['slider_align']);

			//New Changes Start
			$instance['article_layout'] = strip_tags($new_instance['article_layout']);
			$instance['article_image'] = strip_tags($new_instance['article_image']);
			$instance['article_content'] = strip_tags($new_instance['article_content']);
			$instance['article_start'] = strip_tags($new_instance['article_start']);
			$instance['autoscroll'] = strip_tags($new_instance['autoscroll']);
			$instance['autoscroll_delay'] = strip_tags($new_instance['autoscroll_delay']);
			//New Changes End

			$instance['display_image'] = strip_tags($new_instance['display_image']);
			$instance['show_title'] = strip_tags($new_instance['show_title']);
			$instance['show_content'] = strip_tags($new_instance['show_content']);
			$instance['show_author'] = strip_tags($new_instance['show_author']);
			$instance['show_date'] = strip_tags($new_instance['show_date']);
			$instance['cont_max'] = strip_tags($new_instance['cont_max']);
			$instance['title_max'] = strip_tags($new_instance['title_max']);
			$instance['ef_speed'] = strip_tags($new_instance['ef_speed']);
			$instance['extra_link_title'] = strip_tags($new_instance['extra_link_title']);
			$instance['extra_link_address'] = strip_tags($new_instance['extra_link_address']);

		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form( $instance ) {
		if ( $instance ) {



		$args = array(
			'show_option_all'    => 'All' ,
			'orderby'            => 'ID',
			'order'              => 'ASC',
			'show_count'         => 0,
			'hide_empty'         => 0,
			'child_of'           => 0,
			'echo'               => 0,
			'selected'           => $cat,
			'hierarchical'       => 0,
			'name'               => $this->get_field_name('cat'),
			'class'              => 'postform',
			'depth'              => 0,
			'tab_index'          => 0,
			'taxonomy'           => 'category',
			'hide_if_empty'      => false ); ?>
          <?php $cat_objects = get_categories( $args );		  ?>
          <?php
		  $cat['all'] = 	esc_attr( $instance[ 'all' ] );
		  foreach($cat_objects as $cat_objects_out){
				$cat[$cat_objects_out->slug] = 	esc_attr( $instance[ $cat_objects_out->slug ] );
		  }

		$args=array(
		  'public'   => true
		);
		$output = 'names';

		$post_types=get_post_types($args);
		$post_type['pall'] = 	esc_attr( $instance[ 'pall' ] );

		foreach($post_types as $post_types_out):
			$post_type[$post_types_out] = 	esc_attr( $instance[$post_types_out ] );
		 endforeach;


			$title = esc_attr( $instance[ 'title' ] );

			$sl_width = esc_attr( $instance[ 'sl_width' ] );
			$sl_height = esc_attr( $instance[ 'sl_height' ] );
			$thumb_width = esc_attr( $instance[ 'thumb_width' ] );
			$thumb_hight = esc_attr( $instance[ 'thumb_hight' ] );
			$image_align = esc_attr( $instance[ 'image_align' ] );
			$post_num = esc_attr( $instance[ 'post_num' ] );
			$post_show = esc_attr( $instance[ 'post_show' ] );
			$slider_align = esc_attr( $instance[ 'slider_align' ] );

			//New Changes Start
			$article_layout = esc_attr( $instance[ 'article_layout' ] );
			$article_image = esc_attr( $instance[ 'article_image' ] );
			$article_content = esc_attr( $instance[ 'article_content' ] );
			$article_start = esc_attr( $instance[ 'article_start' ] );
			$autoscroll = esc_attr( $instance[ 'autoscroll' ] );
			$autoscroll_delay = esc_attr( $instance[ 'autoscroll_delay' ] );
			//New Changes End

			$display_image = esc_attr( $instance[ 'display_image' ] );
			$show_title = esc_attr( $instance[ 'show_title' ] );
			$show_content = esc_attr( $instance[ 'show_content' ] );
			$show_author = esc_attr( $instance[ 'show_author' ] );
			$show_date = esc_attr( $instance[ 'show_date' ] );
			$cont_max = esc_attr( $instance[ 'cont_max' ] );
			$title_max = esc_attr( $instance[ 'title_max' ] );
			$ef_speed = esc_attr( $instance[ 'ef_speed' ] );
			$extra_link_title = esc_attr( $instance[ 'extra_link_title' ] );
			$extra_link_address = esc_attr( $instance[ 'extra_link_address' ] );

		}
		else {
			$title = __( 'New title', 'text_domain' );

			$cat['all'] = 'all';
			$sl_width = 900;
			$sl_height = 120;
			$thumb_width = 100;
			$thumb_hight = 100;
			$image_align = 'left';
			$display_image = 'on';
			$post_num = 5;
			$post_show = 3;
			$slider_align = 'hor';

			//New Changes Start
			$article_layout = 'top';
			$article_image = 'default';
			$article_content = 'article';
			$article_start = '1';
			$autoscroll='';
			$autoscroll_delay='';
			//New Changes End

			$show_title = 'on';
			$show_content = 'on';
			$show_author = 'on';
			$show_date = 'on';
			$cont_max = 100;
			$title_max = 100;
			$ef_speed = 300;

		}
		?>
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<table class="form-table">


	<tr valign="top">
        <th scope="row"><?php _e('Category'); ?></th>
        <td>
			<?php $args = array(
		    'show_option_all'    => 'All' ,
		    'orderby'            => 'ID',
		    'order'              => 'ASC',
		    'show_count'         => 0,
		    'hide_empty'         => 0,
		    'child_of'           => 0,
		    'echo'               => 0,
		    'selected'           => $cat,
		    'hierarchical'       => 0,
		    'name'               => $this->get_field_name('cat'),
		    'class'              => 'postform',
		    'depth'              => 0,
		    'tab_index'          => 0,
		    'taxonomy'           => 'category',
		    'hide_if_empty'      => false );
		    ?>
          <?php $cat_objects = get_categories( $args );		  ?>
		  <input type="checkbox" name="<?php echo $this->get_field_name('all'); ?>" value="all" <?php if( $cat['all'] == 'all' ) echo ' checked ';  ?> /> All<br/>
          <?php foreach($cat_objects as $cat_objects_out): ?>
		  <input type="checkbox" name="<?php echo $this->get_field_name( $cat_objects_out->slug ); ?>" value="<?php echo $cat_objects_out->slug; ?>" <?php if( $cat[$cat_objects_out->slug] == $cat_objects_out->slug ) echo ' checked ';  ?>  /> <?php echo $cat_objects_out->name; ?><br/>
		  <?php endforeach; ?>

        </td>
    </tr>


		<tr valign="top">
        <th scope="row"><?php _e('Post Type'); ?></th>
        <td>
		<?php
			$args=array(
			  'public'   => true,
			);
			$output = 'names';
		?>
		<?php $post_types=get_post_types($args); ?>

		  <input type="checkbox" name="<?php echo $this->get_field_name('pall'); ?>" value="all" <?php if( $post_type['pall'] == 'all' ) echo ' checked ';  ?> /> All<br/>



          <?php foreach($post_types as $post_types_out): ?>
		  <input type="checkbox" name="<?php echo $this->get_field_name($post_types_out); ?>" value="<?php echo $post_types_out; ?>" <?php if( $post_type[$post_types_out] == $post_types_out) echo ' checked ';  ?>  /><?php echo " ".$post_types_out ?><br/>
		  <?php endforeach; ?>

        </td>
    </tr>


	<tr valign="top">
        <th scope="row"><?php _e('Slider Width'); ?></th>
        <td>

          <input type="text"  name="<?php echo $this->get_field_name('sl_width'); ?>"  value="<?php echo $sl_width; ?>" />

        </td>
    </tr>

	<tr valign="top">
        <th scope="row"><?php _e('Slider Height'); ?></th>
        <td>

          <input type="text"  name="<?php echo $this->get_field_name('sl_height'); ?>"  value="<?php echo $sl_height; ?>" />

        </td>
    </tr>

	<tr valign="top">
        <th scope="row"><?php _e('Display Image?'); ?></th>
		<td>
          <input name="<?php echo $this->get_field_name('display_image'); ?>" type="checkbox" value="on" <?php  if( $display_image == 'on' ) echo ' checked '; ?> />

        </td>
    </tr>

	<tr valign="top">
        <th scope="row"><?php _e('Image size ?'); ?></th>
        <td>

          <input type="text" id="<?php echo $this->get_field_id('thumb_width'); ?>" name="<?php echo $this->get_field_name('thumb_width'); ?>"  value="<?php echo $thumb_width; ?>" />x
		  <input type="text"  name="<?php echo $this->get_field_name('thumb_hight'); ?>"  value="<?php echo $thumb_hight; ?>" />

          <p><?php _e('Images width x height.'); ?> </p>
        </td>
    </tr>


	 <tr valign="top">
        <th scope="row"><?php _e('Image Align'); ?></th>
        <td>
           <select name="<?php echo $this->get_field_name('image_align'); ?>">
          <option value="left" <?php if( $image_align == 'left' ) echo ' selected '; ?> >Left
		  <option value="right" <?php if( $image_align == 'right' ) echo ' selected '; ?> >Right
		  </select>

    </tr>

	 <tr valign="top">
        <th scope="row"><?php _e('Post Number'); ?></th>
        <td>

          <input type="text"  name="<?php echo $this->get_field_name('post_num'); ?>"  value="<?php echo $post_num; ?>" />

        </td>
    </tr>

	<tr valign="top">
        <th scope="row"><?php _e('Post Number To show at once'); ?></th>
        <td>

          <input type="text"  name="<?php echo $this->get_field_name('post_show'); ?>"  value="<?php echo $post_show; ?>" />

        </td>
    </tr>

	<tr valign="top">
        <th scope="row"><?php _e('Slider Orientation'); ?></th>
        <td>
          <select name="<?php echo $this->get_field_name('slider_align'); ?>">
          <option value="hor" <?php if( $slider_align == 'hor' ) echo ' selected '; ?> >Horizontal
		  <option value="vert" <?php if( $slider_align == 'vert' ) echo ' selected '; ?> >Vertical
		  </select>

        </td>
    </tr>

    <?php /*New Changes Start*/?>
    <tr valign="top" style="border-top:1px solid #cccccc;">
        <th scope="row" colspan="2"><b><?php _e('Article Layout'); ?></b></th>
    </tr>
    <tr valign="top">
        <th scope="row" colspan="2"><?php _e('Select the layout for each article displayed:'); ?></th>
    </tr>
    <tr valign="top">
    	<td></td>
        <td>
          <input type="radio" name="<?php echo $this->get_field_name('article_layout'); ?>" value="top" <?php if( $article_layout == 'top' ) echo ' checked '; ?> style="vertical-align:top;margin-top:15px;margin-right:12px;"><img src="<?php echo plugins_url('/images/layout-1.png', __FILE__);?>"/>
		  <br/><input type="radio" name="<?php echo $this->get_field_name('article_layout'); ?>" value="bottom" <?php if( $article_layout == 'bottom' ) echo ' checked '; ?> style="vertical-align:top;margin-top:15px;margin-right:12px;"><img src="<?php echo plugins_url('/images/layout-2.png', __FILE__);?>"/>
		  <br/><input type="radio" name="<?php echo $this->get_field_name('article_layout'); ?>" value="no" <?php if( $article_layout == 'no' ) echo ' checked '; ?> style="vertical-align:top;margin-top:15px;margin-right:12px;"><img src="<?php echo plugins_url('/images/layout-3.png', __FILE__);?>"/>
    </tr>
    <tr valign="top">
        <th scope="row" colspan="2"><?php _e('When an article does not have an image use'); ?></th>
    </tr>
    <tr valign="top">
        <td></td>
        <td>
          <select name="<?php echo $this->get_field_name('article_image'); ?>">
          <option value="default" <?php if( $article_image == 'default' ) echo ' selected '; ?> >Default Image
		  <option value="hide" <?php if( $article_image == 'hide' ) echo ' selected '; ?> >Hide Image
		  </select>
        </td>
    </tr>
    <tr valign="top" style="border-top:1px solid #cccccc;">
        <th scope="row" colspan="2"><b><?php _e('Article Content'); ?></b></th>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e('Use Article'); ?></th>
        <td><input type="radio" name="<?php echo $this->get_field_name('article_content'); ?>" value="article" <?php if( $article_content == 'article' ) echo ' checked '; ?> >
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e('Use Excerpt'); ?></th>
        <td><input type="radio" name="<?php echo $this->get_field_name('article_content'); ?>" value="excerpt" <?php if( $article_content == 'excerpt' ) echo ' checked '; ?> >
        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e('Start at article'); ?></th>
        <td>
        	<select name="<?php echo $this->get_field_name('article_start'); ?>">
              <?php
                for($i=1;$i<8;$i++){
                	?>
                	<option value="<?=$i?>" <?php if( $article_start == $i ) echo ' selected '; ?> ><?=$i?>
                	<?php
                }
              ?>
			</select>
        </td>
    </tr>
    <tr valign="top" style="border-top:1px solid #cccccc;">
        <th scope="row" colspan="2"><b><?php _e('Autoscroll Option'); ?></b></th>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e('Autoscroll?'); ?></th>
		<td>
          <input name="<?php echo $this->get_field_name('autoscroll'); ?>" type="checkbox" value="on" <?php  if( $autoscroll == 'on' ) echo ' checked '; ?> />

        </td>
    </tr>
    <tr valign="top">
        <th scope="row"><?php _e('Delay time for autoscroll'); ?></th>
        <td>
          <input type="text"  name="<?php echo $this->get_field_name('autoscroll_delay'); ?>"  value="<?php echo $autoscroll_delay; ?>" />E.g: 1000 (in milliseconds)
        </td>
    </tr>
    <tr valign="top" style="border-top:1px solid #cccccc;">
        <th scope="row" colspan="2">&nbsp;</th>
    </tr>
    <?php /*New Changes End*/?>

	<tr valign="top">
        <th scope="row"><?php _e('Display Title'); ?></th>
        <td>
          <input name="<?php echo $this->get_field_name('show_title'); ?>" type="checkbox" value="on" <?php  if( $show_title == 'on' ) echo ' checked '; ?> />

        </td>
    </tr>
	<tr valign="top">
        <th scope="row"><?php _e('Display Content'); ?></th>
        <td>
          <input name="<?php echo $this->get_field_name('show_content'); ?>" type="checkbox"  value="on" <?php  if( $show_content == 'on' ) echo ' checked '; ?> />

        </td>
    </tr>

	<tr valign="top">
        <th scope="row"><?php _e('Display Author'); ?></th>
        <td>
          <input name="<?php echo $this->get_field_name('show_author'); ?>" type="checkbox"  value="on" <?php  if( $show_author == 'on' ) echo ' checked '; ?> />

        </td>
    </tr>

	<tr valign="top">
        <th scope="row"><?php _e('Display Date'); ?></th>
        <td>
          <input name="<?php echo $this->get_field_name('show_date'); ?>" type="checkbox"  value="on" <?php  if( $show_date == 'on' ) echo ' checked '; ?> />

        </td>
    </tr>

    <tr valign="top">
        <th scope="row"><?php _e('Content max char'); ?></th>
        <td>

          <input type="text"  name="<?php echo $this->get_field_name('cont_max'); ?>"  value="<?php echo $cont_max; ?>" />

        </td>
    </tr>

	<tr valign="top">
        <th scope="row"> <?php _e('Title max char'); ?> </th>
        <td>

          <input type="text"  name="<?php echo $this->get_field_name('title_max'); ?>"  value="<?php echo $title_max; ?>" />

        </td>
    </tr>

	<tr valign="top">
        <th scope="row" > <?php _e('Effects Speed'); ?> </th>
        <td>

          <input type="text"  name="<?php echo $this->get_field_name('ef_speed'); ?>"  value="<?php echo $ef_speed; ?>" />
		<p><?php _e('E.g: 600'); ?></p>
        </td>
    </tr>

	<tr valign="top">
        <th scope="row" > <?php _e('Extra Link Title'); ?> </th>
        <td>
          <input type="text"  name="<?php echo $this->get_field_name('extra_link_title'); ?>"  value="<?php echo $extra_link_title; ?>" />
        </td>
    </tr>

		<tr valign="top">
        <th scope="row" > <?php _e('Extra Link Address'); ?> </th>
        <td>
          <input type="text"  name="<?php echo $this->get_field_name('extra_link_address'); ?>"  value="<?php echo $extra_link_address; ?>" />
        </td>
    </tr>


</table>

		<?php
	}

}
add_action( 'widgets_init', create_function( '', 'register_widget("news_slider");' ) );

?>