<?php
/* Template Name: Gallery */

get_header(); 
?>	

    <section class="section-block">
      <h3 class="section-block-title"><span><?php the_title(); ?></span></h3>
      <div class="post-list post-masonry">	  
		<?php 
		
		if(get_post_meta($post->ID,'meta_style_gallery',true)=='photograph'){
		$photograph = new WP_Query(array('post_type' => 'photograph', 'paged' => $paged ));		
			while ($photograph->have_posts()) : $photograph->the_post();			
				get_template_part('content','photograph');				
			endwhile;
			if (  $photograph->max_num_pages > 1 ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'colabsthemes' ) ); ?></div>
			<?php endif;
		
		}elseif(get_post_meta($post->ID,'meta_style_gallery',true)=='pinterest'){
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
						</div>
					</article>';
					
				endforeach;
			}
		}elseif(get_post_meta($post->ID,'meta_style_gallery',true)=='picasa'){
			$feed_url= "http://picasaweb.google.com/data/feed/base/user/".get_option('colabs_username_picasa')."?alt=rss&kind=photo&hl=id&imgmax=1600&max-results=".get_option('colabs_piccount_picasa')."&start-index=1";
			$limit = get_option('colabs_piccount_picasa');
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
						</div>
					</article>';
					
				endforeach;
			}
		}elseif(get_post_meta($post->ID,'meta_style_gallery',true)=='instagram'){
			$user = get_post_meta($post->ID,'colabs_type_instagram',true);
			$limit = get_post_meta($post->ID,'colabs_piccount_instagram',true);
			$tag = get_post_meta($post->ID,'colabs_tag_instagram',true);
			$address = get_post_meta($post->ID,'colabs_address_instagram',true);
			$getlatlang = getLatLng($address);
			if(empty($limit))$limit=10;
			$nextMaxId = '';
			$max_id = $nextMaxId;
			$piccounter = 1;
			$token = ColabsInstagram::getAccessToken();
				
			if(!empty($getlatlang))
				$data = ColabsInstagram::getLocationBasedFeed($getlatlang);
			else{
				if(empty($tag)) $data = ColabsInstagram::getFeedByUserId($user, $max_id, $nextMaxId);
				else $data = ColabsInstagram::getFeedByTag($tag, $max_id, $nextMaxId);					
			}
			
			if(count($data) > 0){ 
				if(get_post_meta($post->ID,'colabs_random_instagram',true)=='true') shuffle($data);	
				foreach($data as $obj){ if(intval($limit) > 0 && $piccounter > $limit) break;		
								
					$title = $obj->caption->text;
					$urlimg= $obj->images->low_resolution->url;
					$urlimgori= $obj->images->standard_resolution->url;
					$likes = $obj->likes->count;
					$time = date(get_option('date_format'), $obj->created_time);

					echo 	'<article class="entry-post">
								<div class="innercontainer">
								<div class="entry-top">
								<a href="'.$urlimgori.'" title="'.$title.'" rel="lightbox">
								'.colabs_image('width=280&link=img&return=true&src='.$urlimg).'
								</a>
								</div>';
							 
					echo 	'<h3 class="entry-title"><a href="'.$urlimgori.'" target="_blank">'.$title.'</a></h3>
									<p class="entry-likes"><i class="icon-heart "></i> <span>'.$likes.'</span> Loves</p>
								';	
					echo 	'</div>
								</article>';	
						  
									
					$piccounter++;
				}
			}
		}elseif(get_post_meta($post->ID,'meta_style_gallery',true)=='flickr'){
			$f = new phpFlickr(get_option('colabs_api_flickr'),get_option('colabs_secret_flickr'));
			$recent = $f->people_getPublicPhotos(get_post_meta($post->ID,'colabs_username_flickr',true), NULL, NULL, get_post_meta($post->ID,'colabs_piccount_flickr',true), $paged);
			
			foreach ($recent['photos']['photo'] as $photo) { 

				$title 	= $photo['title'];
				$urlimg	= $f->buildPhotoURL($photo,"small");
				$urlimgori = $f->buildPhotoURL($photo,"large");
				
				$info = $f->photos_getInfo($photo['id']);
				$date = date(get_option('date_format'),$info['photo']['dateuploaded']);
				$view = $info['photo']['views'];
				 
					echo '<article class="entry-post">
								<div class="innercontainer">
								<div class="entry-top">
							<a href="'.$urlimgori.'" title="'.$title.'" rel="lightbox">
								'.colabs_image('width=280&link=img&return=true&src='.$urlimg).'
							</a>
							</div>
							<h3 class="entry-title"><a href="'.$urlimgori.'" target="_blank">'.$title.'</a></h3>
									<p class="entry-likes"><i class="icon-heart "></i> <span>'.$view.'</span> Loves</p>
									<p class="entry-time">
									<i class="icon-time"></i> 
									<span>'.$date.'</span> 
								</p>
						  </div>
								</article>';	
			}
		}elseif(get_post_meta($post->ID,'meta_style_gallery',true)=='dribbble'){
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
			$cat_id = get_post_meta($post->ID, "cat",true);
			if($cat_id > 0):
				$args = array('post_type' => 'post', 'post__not_in' =>get_option('sticky_posts'), 'paged' => $paged, 'cat' => $cat_id);
			else:
				$args =array('post_type' => 'post', 'post__not_in' =>get_option('sticky_posts'), 'paged' => $paged );
			endif;
			$latest = new WP_Query( $args ); 
			if($latest->have_posts()): while($latest->have_posts()): $latest->the_post();
				get_template_part('content','photograph');	
			endwhile; endif;
			if (  $wp_query->max_num_pages > 1 ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'colabsthemes' ) ); ?></div>
			<?php endif;
		}	
		
		wp_reset_postdata();
        ?>
      </div><!-- .post-masonry -->
	  
    </section><!-- .section-block -->
	
<?php get_footer(); ?>