<div class="row tt-gallery fbx-instance">

<div class="col-xs-12">

<?php
$the_query = new WP_Query([
    'post_type' => 'attachment',
    'post_status' => 'inherit',
    'posts_per_page' => 12,
    'category_name' => 'gallery',
    'orderby' => 'rand'
]);

if($the_query->have_posts()) {
    while ($the_query->have_posts()) {
        $the_query->the_post();
        echo '<div class="col-xs-4 col-sm-2 tt-gallery-cell">';
        get_template_part('content', 'gallery');
        echo '</div>';
    }
}

wp_reset_postdata();
?>

</div><!--/.col-*-->

</div><!--/.row-->
