<?php
/*
Template Name: Single
*/
?>
<?php get_header(); ?>

<div class="row">
    <img class="center-block img-responsive"
        src="<?php echo get_stylesheet_directory_uri(); ?>/images/single-banner.jpg" />
</div>

<div id="page" class="row">
	
	<div class="col-sm-offset-1 col-sm-10">

		<?php if ( have_posts() ) :
		    while ( have_posts() ) : the_post();
		        get_template_part('content');
		    endwhile;
		endif;
		?>
	
	</div>

</div><!--/.row-->


<?php get_footer() ?>
