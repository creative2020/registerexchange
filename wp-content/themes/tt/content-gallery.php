<?php
    $img_url = wp_get_attachment_image_src(get_the_ID())[0];
?>

<a href="<?php echo $img_url; ?>" class="fbx-link wp-caption">
    <img src="<?php echo $img_url; ?>"
        class="tt-gallery-thumb img-responsive" />
</a>
