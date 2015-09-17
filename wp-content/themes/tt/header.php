<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
<title>
<?php wp_title(); ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php wp_head(); ?>
</head>
<body>


    <div class="container-fluid">

        <div id="logo-header-row" class="row">
            <div id="logo-header-cell" class="max">
                <div class="col-xs-offset-1 col-xs-10 col-sm-offset-3 col-md-offset-1 col-sm-6 col-md-3 col-lg-offset-0">
	                <img id="logo-header" class="img-responsive"
	                    src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-h.png" />
	                    <div id="date-c" class="visible-xs visible-sm text-center">
		                
		                <span id="logo-header-subtitle">
		                    <span id="logo-header-subtitle-a">Dallas, Texas</span>
		                    <span id="logo-header-subtitle-b">– March 7 - 9, 2016</span>
		                </span>
	                </div>
                </div>
                <div class="col-lg-5 col-md-3 col-sm-12">
	                <br class="visible-xs">
	                
	                <div id="date-r" class="hidden-sm hidden-xs">
		                <span id="logo-header-subtitle">
		                    <span id="logo-header-subtitle-a">Dallas, Texas</span>
		                    <span id="logo-header-subtitle-b">– March 7 - 9, 2016</span>
		                </span>
	                </div>
                </div>
            </div>
        </div>

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <div id="navbar" class="navbar-collapse collapse max">
                  <ul class="nav navbar-nav">
                    <?php wp_nav_menu(['container' => false, 'items_wrap' => '%3$s']); ?>
                  </ul>
                </div>
            </div>
        </div>