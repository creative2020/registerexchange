<?php
    $post_id = get_the_ID();
    $size = 'thumbnail';
    $post_thumbnail_id = get_post_thumbnail_id( $post_id );
    $image_info = wp_get_attachment_image_src( $post_thumbnail_id, $size, $icon );
?>

<div class="row tt-search">
<?php
echo "<!-- dsp: " .(
    is_main_query() ?
'TRUE':'FALSE') . " -->\n";
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) { ?>
        <img src="<?php echo $image_info[0]; ?>" class="img-responsive col-sm-4">
    <?php } ?>
	<header class="entry-header">

		<?php
            the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
        ?>

        <div class="entry-sub-header">
            <?php echo get_the_date(); ?>
            <span class="tt-separator">|</span>
            <?php echo tt_the_category_list(['headline']); ?>
        </div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
            the_excerpt();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

</div><!--/.row-->
