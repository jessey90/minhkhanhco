<?php get_header(); ?>
	
    
    <section class="section-block">
      <h3 class="section-block-title"><span><?php _e("Photographs","colabsthemes"); ?></span></h3>
      <div class="post-list post-masonry">
        
        <?php 
		$photograph = new WP_Query( array( 'post_type' => 'photograph' ) );
		
		if ( $photograph->have_posts() ):		
			while ($photograph->have_posts()) : $photograph->the_post();
			
			get_template_part('content','photograph');
				
			endwhile;
			if (  $photograph->max_num_pages > 1 ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'colabsthemes' ) ); ?></div>
			<?php endif;
		else:
			echo	'<h2>'. __('No posts found. Try a different search?','colabsthemes').'</h2>';
		endif;
		wp_reset_postdata();
        ?>
      </div><!-- .post-masonry -->
			
    </section><!-- .section-block -->

<?php get_footer(); ?>
