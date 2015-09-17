<?php
/*
Author: 2020 Creative
URL: htp://2020creative.com
*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////// 2020 Shortcodes


//////////////////////////////////////////////////////// TT Post Content

add_shortcode( 'post_info', 'post_info' );
function post_info ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => '',
            'id' => '',
		), $atts )
	);
    
    $tt_post_content = get_post_field( 'post_content', $id );
    
// code
return $tt_post_content;    
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Button

// [hsr_btn size="lg" link="#" color="#003764" fcolor="#ffffff" float="none" target="" class=""]Button Name[/hsr_btn], homes_for_sale_btn

add_shortcode( 'tt_btn', 'tt_btn' );
function tt_btn($atts, $content = null) {
    extract(shortcode_atts(array(
        'size'   => 'lg',
        'color'  => '#ee1d24', //#003764
        'fcolor'  => '#ffffff', //#ffffff
        'link'    => '#',
        'float'    => 'none',
        'target'    => '',
        'class' => '',
        'block' => 'n',
        'margin' => '1.0em',
    ), $atts ) );
    
    $classes = 'btn btn-default ' . $class . ' btn-' . $size;
    
    if ($block == 'y') {
    	$classes .= ' btn-block';
    }

    return '<a type="button" class="' . $classes . '" href="' . $link . '" style="' . $margin . ';padding:0.75em 2.0em;background:' . $color . ';color:'. $fcolor . ';float:' . $float . ';" target="' . $target . '">' . $content . '</a>';
}

//////////////////////////////////////////////////////// TT rule

add_shortcode( 'tt_rule', 'tt_rule' ); //line
function tt_rule($atts, $content = null) {
    extract(shortcode_atts(array(
        'size'   => '1px',
        'color'  => '#ccc',
        'classes'  => 'col-sm-12 rule',
        'id' => '',
        'top' => 'n',
    ), $atts ) );

    if ($top == 'n') {
    
    return '<div id="' . $id . '" class="' . $classes . '" style="margin:1.0em 0;border-top:' . $size . ' solid ' . $color .';padding:1.0em 0;"></div>';
    
    } else {
        
        // nothing
    }
     
    if ($top == 'y') {
    
    return '<div id="' . $id . '" class="' . $classes . '" style="margin:1.0em 0;border-top:' . $size . ' solid ' . $color .';padding:1.0em 0;"> <a href="#top" class="top"><i class="fa fa-arrow-circle-up pull-right"></i></a></div>';
        
    } else {
        
        // nothing
    }
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT spacer

add_shortcode( 'tt_spacer', 'tt_spacer' ); //line
function tt_spacer($atts, $content = null) {
    extract(shortcode_atts(array(
        'size'   => '1.0em',
        'classes'  => 'col-sm-12',
    ), $atts ) );

    return '<div class="' . $classes . '" style="height:'.$size.';"></div>';
        
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Post Feed

add_shortcode( 'tt_posts', 'tt_posts' ); // echo do_shortcode('[tt_posts limit="-1" cat_name="home"]');
function tt_posts ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => 'post',
            'cat' => '-1',
            'cat_name' => '',
            'limit' => '10',
            'type' => 'post',
            'layout' => 'norm',
            'style' => '',
            'orderby' => 'post_date',
            'order' => 'DSC',
            'term' => '',
            'taxonomy' => 'Type',
            'offset' => '',
            'col' => '3',
            'post_name' => '',
		), $atts )
	);
    
/////////////////////////////////////// Variables
$user_ID = get_current_user_id();
$user_data = get_user_meta( $user_ID );
$user_photo_id = $user_data[photo][0];
$user_photo_url = wp_get_attachment_url( $user_photo_id );
$user_photo_img = '<img src="' . $user_photo_url . '">';

/////////////////////////////////////// All Query    
if ($name == 'post') {

    $args = [
		'post_type' => $type,
		'post_status' => 'publish',
        'name' => $post_name,
		'orderby' => $orderby,
		'order' => $order,
		'posts_per_page' => $limit,
	    'cat' => $cat,
    ];

	if ( !empty($term) ) {
        $args['tax_query'] = [ [ 'taxonomy' => $taxonomy, 'field' => 'slug', 'terms' => $term ] ];
    }
}

remove_all_filters('posts_orderby');
$the_query = new WP_Query( $args );

    
global $post;

// pre loop
$post_ordinal = 0;

// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
        $post_ordinal++;
		$the_query->the_post();
		// pull meta for each post
		$post_id = get_the_ID();
		$permalink = get_permalink( $id );
        $post = get_post();
        $size = '250,125';
        $image = get_the_post_thumbnail( $post_id, $size, $attr );
        if (empty( $image )) {
            $image = '<img src="' . get_template_directory_uri() . '/images/img-fpo.png">';
        }
         
		
//HTML


            
if ($type == 'speaker' && $layout == 'grid' ) {

    $output .= '<div class="gallery-wrap">';

    $output .= '<dl class="gallery-item';
    $output .= ' col-sm-' . $col;

    if ( !empty($offset) && $post_ordinal === 1 ) {
        $output .= " col-sm-offset-$offset";
    }

    // close the class attribute
    $output .= '">';
	
    //get section html
    ob_start();
        get_template_part('content', 'gallery-grid');
        $output .= ob_get_contents();
    ob_end_clean();

    $output .= '</dl></div>';

} 
else if ($type == 'speaker' || $type == 'testimonial' && $layout == 'norm' ) {
	
    //get section html
    ob_start();
        get_template_part('content', 'speaker');
        $output .= ob_get_contents();
    ob_end_clean();

} else {
    //get section html
    ob_start();
        get_template_part('content', 'default');
        $output .= ob_get_contents();
    ob_end_clean();
}
}    // after loop
    //$output .= '</ul>';
    
/* Restore original Post Data */
wp_reset_postdata();
return $output;
}}


////////////////////////////////////////////////////////


//////////////////////////////////////////////////////// TT Forms table

add_shortcode( 'tt_form', 'tt_form' ); 
function tt_form ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => 'Form name',
            'link' => '#',
            'target' => '',
            'row' => '',
            'desc' => 'description',
            'file' => 'file-o',
            
		), $atts )
	);
    // classes
    if ( $row == 'header' ) {
        $style = 'margin-top:0;border-top:1px solid #cccccc;padding:0.5em 0;background:#cccccc;';
        $col2 = $desc;
        } 
    else if ( $row == 'last' ) {
        $style = 'margin-top:0;border-top:1px solid #cccccc;padding:0.5em 0;border-bottom:1px solid #cccccc;margin-top:-1.3em;';
        $col2 = '<a class="btn btn-primary" href="'.$link.'"><i class="fa fa-download"></i> Download</a>';
        }
    else if ( $row == 'first' ) {
        $style = 'margin-top:0;border-top:0px solid #cccccc;padding:0.5em 0;border-bottom:0px solid #cccccc;margin-top:-1.3em;';
        $col2 = '<a class="btn btn-primary" href="'.$link.'"><i class="fa fa-download"></i> Download</a>';
        }
    else {
        $style = 'margin-top:0;border-top:1px solid #cccccc;padding:0.5em 0;margin-top:-1.3em;';
        $col2 = '<a class="btn btn-primary" href="'.$link.'"><i class="fa fa-download"></i> Download</a>';
    }
    
    
        
    //get section html
    ob_start(); ?>
        <div class="row hover" style="<?php echo $style ?>">
            <div class="col-sm-8" style="font-size:1.1em;margin-top:0.5em;">
                 <i class="fa fa-<?php echo $file ?>" style="color:#802528;width:2.0em;"></i><?php echo $name ?>
            </div>
            <div class="col-sm-4 pull-right">
                 <?php echo $col2 ?>
            </div>
        </div>
        <?php
        $output .= ob_get_contents();
    ob_end_clean();
    return $output;
}
  

//////////////////////////////////////////////////////// TT Section

add_shortcode( 'tt_section_row', 'tt_section_row' );
function tt_section_row ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => '',
            'id' => '',
		), $atts )
	);
    
    if (name == 'start') {
    	return '<div id="'.$id.'" class="row">';
    	}
    if (name == 'end') {
    	return '</div>';
    	}	
       
}

//////////////////////////////////////////////////////// Displays client notes in Admin

add_shortcode( 'tt_note', 'tt_note' ); // [tt_bracket dir="l"]
function tt_note ($atts, $content = null) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id' => '',
		), $atts )
	);
    
    return '<span style="background-color:yellow;">Hello</span>';
}
//////////////////////////////////////////////////////// Displays shortcode with brackets for instructions

add_shortcode( 'tt_short', 'tt_short' ); // [tt_bracket dir="l"]
function tt_short ($atts, $content = null) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => '',
			'type' => '1',
		), $atts )
	);
    
    if ( $type == 2 ) {
    	return '<pre>&#91;'.$name.' '.$content.'&#91;/'.$name.'&#93;</pre>';
    }
    if ( $type == 1 ) {
    	return '<pre>&#91;'.$name.' '.$content.'&#93;</pre>';
    }   
}


