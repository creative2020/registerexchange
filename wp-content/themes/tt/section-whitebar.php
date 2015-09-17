<?php if ( is_page('speakers') || is_page('about') ) { ?>

	<!-- do nothing -->
	
<?php } else { ?>

<div class="row tt-whitebar">
	<div class="col-sm-offset-1 col-sm-10">
		<?php echo do_shortcode('[tt_posts type="testimonial" orderby="rand" limit="1"]'); ?>
	</div>
</div><!--/.row-->
	
<?php } ?>	


<!--
<div class="col-sm-4 col-md-offset-4 sidebar lower-sidebar">
    <?php dynamic_sidebar('tt-lower-sidebar'); ?>
</div>
-->