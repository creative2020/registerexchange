<?php if ( !is_page('speakers') && !is_page('about') ) { ?>

<div class="row tt-whitebar">
	<div class="col-sm-offset-1 col-sm-10">
        <?php
            switch ($post->post_name) {
                case 'agenda':
                    echo do_shortcode('[tt_posts type="testimonial" post_name="best-business-decision-for-myself-and-my-advisors"]');
                    break;
                case 'awards':
                    echo do_shortcode('[tt_posts type="testimonial" post_name="exchange-is-the-best-experience"]');
                    break;
                case 'location':
                    echo do_shortcode('[tt_posts type="testimonial" post_name="quality-of-the-brand"]');
                    break;
                default:
                    echo do_shortcode('[tt_posts type="testimonial" orderby="rand" limit="1"]');
            }
        ?>
	</div>
</div><!--/.row-->

<?php } ?>	
