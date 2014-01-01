<?php
/* Template Name: Blog */

get_header(); 
?>	
    
    <div class="main-content-wrapper row">
      <div class="main-content column col8">
		<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$latest = new WP_Query(array('post_type' => 'post', 
			  'post__not_in' =>get_option('sticky_posts'), 
			  'paged' => $paged,
		)); 
		if($latest->have_posts()): while($latest->have_posts()): $latest->the_post();
			get_template_part('content','post');
		endwhile; endif;
		colabs_pagination('',$latest);
		?>
      </div><!-- .main-content -->
      
      <aside class="primary-sidebar column col4">
        <?php get_sidebar(); ?>
      </aside><!-- .primary-sidebar -->
    </div><!-- .main-content -->
    

<?php get_footer(); ?>