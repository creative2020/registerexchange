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

<div class="row">

<div class="col-sm-6 col-sm-offset-1 tt-search-container">
<?php if ( have_posts() ) :

    // Start the loop.
    while ( have_posts() ) : the_post();
        get_template_part('content', 'excerpt');
    endwhile;

endif;
?>
</div>

<div class="col-sm-4 sidebar main-sidebar">
    <?php dynamic_sidebar('tt-sidebar'); ?>
</div>

</div><!--/.row-->

<?php get_footer() ?>
