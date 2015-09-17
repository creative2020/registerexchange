<?php
    $post_id = get_the_ID();
    $size = 'full';
    $post_thumbnail_id = get_post_thumbnail_id( $post_id );
    $image_info = wp_get_attachment_image_src( $post_thumbnail_id, $size, $icon );
    $format = get_post_format( $post_id );    
    
    if ( empty($format) ) {
	    $format = 'standard';
    }
    if ( in_category('uncategorized') ) {
	    $display_categories = 'n';
    } else {
	    $display_categories = 'y';
    }
    
    
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    
	<header class="col-sm-12 text-center entry-header format-<?php echo $format ?>">
			
			<?php if ( $format == 'standard' ) { 
	        		echo '<div class="tt-'.$format.'-title">',
		        		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					echo '</div>';
					} else {
		    	} ?>
	
	        <?php if ( $display_categories == 'y' ) { ?>
	        	
	        	<div class="entry-sub-header">
		            <?php echo get_the_date(); ?><span class="tt-separator">|</span> <?php echo get_the_category_list( ' | ' ); ?>
		        </div>	        	
	        	
	        <?php } else { ?>
		        
			<?php } ?>
	
	</header><!-- .entry-header -->
		
		
	
	<div class="entry-content row">
			
			<div id="tt-feature-img" class="row text-center"><!-- entry img -->
			
				<?php if ( has_post_thumbnail() ) { ?>
					
		        		<img src="<?php echo $image_info[0]; ?>" class="img-responsive">
					
				<?php } ?>
	    
			</div> <!-- #entry img -->
			
			<div class="col-sm-12 text-center">
			
			<?php the_content(); ?>
			<?php
	
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
			</div> <!-- col -->
	</div><!-- .entry-content -->
	
</article>