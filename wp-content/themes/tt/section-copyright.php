<?php
	$get_copyright = get_page_by_title('copyright');	
?>


<div id="tt-copyright" class="col-sm-offset-1 col-sm-10">
	
	<?php if(get_page_by_title('copyright')) { ?>
	
		<?php echo $get_copyright->post_content; ?></br>
		<?php _e('&copy;','tt'); echo ' '.date('Y').' '; _e(''.bloginfo('name'). ' - All rights reserved.','tt'); ?>
		
		<?php } else { ?>
		
		<p>Customize this area by creating a page named "copyright".</p>
		
		<?php } ?>
</div>

<div class="col-sm-12">