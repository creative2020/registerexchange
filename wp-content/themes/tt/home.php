<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<div class="row">
    <img class="center-block img-responsive"
        src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner.jpg" />
</div>

<div id="home" class="row">
	
<?php if ( have_posts() ) : ?>

    <!--loop-->
    	<?php while ( have_posts() ) : the_post(); ?>
    	
        	<?php get_template_part('content', 'home'); ?>
    
	    <?php endwhile; ?>
		<?php endif; ?>
	<!--/loop-->

</div><!--/row-->

<?php get_footer() ?>
