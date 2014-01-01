<?php get_header(); ?>
	
	<?php
	$title = __("Most Popular ","colabsthemes").get_option('colabs_home');
	if(get_option('colabs_title')!='') $title = get_option('colabs_title');
	
	?>
    
    <section class="section-block">
      <h3 class="section-block-title"><span><?php echo $title; ?> </span></h3>
      <div class="post-list post-masonry">
        
        <?php 
		if(get_option('colabs_home')=='Photographs'){
		$photograph = new WP_Query(array('post_type' => 'photograph', 'paged' => $paged ));		
			while ($photograph->have_posts()) : $photograph->the_post();			
				get_template_part('content','photograph');				
			endwhile;
			if (  $photograph->max_num_pages > 1 ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'colabsthemes' ) ); ?></div>
			<?php endif; 
		
		}elseif(get_option('colabs_home')=='Pinterest'){
			$user=get_option('colabs_username_pinterest');
			$limit=get_option('colabs_piccount_pinterest');
			$board=get_option('colabs_board_pinterest');
			if(empty($limit))$limit=20;

			if(!empty($board))$feed_url = 'http://pinterest.com/'.$user.'/'.$board.'/rss'; 
			else $feed_url = 'http://pinterest.com/'.$user.'/feed.rss';	
			
			$latest_pins = colabs_pinterest_get_rss_feed( $limit, $feed_url );
			if(!empty( $latest_pins ) ){$ii=0;
				foreach ( $latest_pins as $item ):
							
					$rss_pin_description = $item->get_description();
					preg_match('/href="([^"]*)"/', $rss_pin_description, $link); $href = $link[1]; unset($link);	
					preg_match('/src="([^"]*)"/', $rss_pin_description, $image); $src = $image[1]; unset($image);				
					$pin_caption = strip_tags( $rss_pin_description );
					$date = $item->get_date('j F Y | g:i a');
				
					echo '
					<article class="entry-post">
						<div class="innercontainer">
							<div class="entry-top">
								<a href="'.str_ireplace('_b.jpg','_c.jpg',$src).'" title="'.$pin_caption.'" rel="lightbox-">
									'.colabs_image('width=222&link=img&return=true&src='.$src).'<span><i class="icon-search"></i></span>
								</a>
							</div>
							<h3 class="entry-title"><a href="'.$href.'" target="_blank">'.$pin_caption.'</a></h3>
							<p class="entry-tags"><i class="icon-calendar"></i>'.$date.'</p>
							</div>
					</article>';
					
				endforeach;
			}
		

		}elseif(get_option('colabs_home')=='Picasa'){
			$feed_url = "http://picasaweb.google.com/data/feed/base/user/".get_option('colabs_username_picasa')."?alt=rss&kind=photo&hl=id&imgmax=1600&max-results=".get_option('colabs_piccount_picasa')."&start-index=1";
			$latest_pins = colabs_pinterest_get_rss_feed( $limit, $feed_url );
			if(!empty( $latest_pins ) ){$ii=0;
				foreach ( $latest_pins as $item ):
							
					$rss_pin_description = $item->get_description();
					preg_match('/href="([^"]*)"/', $rss_pin_description, $link); $href = $link[1]; unset($link);	
					preg_match('/src="([^"]*)"/', $rss_pin_description, $image); $src = $image[1]; unset($image);				
					$pin_caption = strip_tags( $rss_pin_description );
					$date = $item->get_date('j F Y | g:i a');
				
					echo '
					<article class="entry-post">
						<div class="innercontainer">
							<div class="entry-top">
								<a href="'.str_ireplace('_b.jpg','_c.jpg',$src).'" title="'.$pin_caption.'" rel="lightbox-">
									'.colabs_image('width=222&link=img&return=true&src='.$src).'<span><i class="icon-search"></i></span>
								</a>
							</div>
							<h3 class="entry-title"><a href="'.$href.'" target="_blank">'.$pin_caption.'</a></h3>
							<p class="entry-tags"><i class="icon-calendar"></i>'.$date.'</p>
							</div>
					</article>';
					
				endforeach;
			}
		}elseif(get_option('colabs_home')=='Dribbble'){
			$feed_url = 'http://api.dribbble.com/players/'.get_option('colabs_username_dribbble').'/shots?per_page='.get_option('colabs_piccount_dribbble');
			$json = wp_remote_get($feed_url);
			$array = json_decode($json['body']);
			$shots = $array->shots;
			if(!empty( $shots ) ){
				foreach ( $shots as $item ):
					$src = $item->image_url;					
					$pin_caption = $item->title;
					$like = $item->likes_count;
					
					echo '
					<article class="entry-post">
						<div class="innercontainer">
							<div class="entry-top">
								<a href="'.$src.'" title="'.$pin_caption.'" rel="lightbox-">
									'.colabs_image('width=222&link=img&return=true&src='.$src).'<span><i class="icon-search"></i></span>
								</a>
							</div>
							<h3 class="entry-title"><a href="'.$src.'" target="_blank">'.$pin_caption.'</a></h3>
							<p class="entry-likes"><i class="icon-heart "></i> <span>'.$like.'</span> Loves</p>
							</div>
					</article>';
					
				endforeach;
			}
		}else{
			$latest = new WP_Query( array('post_type' => 'post', 'post__not_in' =>get_option('sticky_posts'), 'paged' => $paged ) ); 
			if($latest->have_posts()): while($latest->have_posts()): $latest->the_post();
				get_template_part('content','photograph');	
			endwhile; endif;
			if (  $latest->max_num_pages > 1 ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'colabsthemes' ) ); ?></div>
			<?php endif; 
		}		
		wp_reset_postdata();
        ?>
		
      </div><!-- .post-masonry -->
    </section><!-- .section-block -->

<?php get_footer(); ?>
