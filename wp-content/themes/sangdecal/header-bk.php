<!doctype html>
<html <?php language_attributes(); ?>>
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php $options = get_option('salient'); ?>

<?php if(!empty($options['responsive']) && $options['responsive'] == 1) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

<?php } else { ?>
	<meta name="viewport" content="width=1200" />
<?php } ?>	

<!--Shortcut icon-->
<?php if(!empty($options['favicon'])) { ?>
	<link rel="shortcut icon" href="<?php echo nectar_options_img($options['favicon']); ?>" />
<?php } ?>


<title> <?php wp_title("|",true, 'right'); ?> <?php if (!defined('WPSEO_VERSION')) { bloginfo('name'); } ?></title>

<?php wp_head(); ?>

</head>

<?php
 global $post; 
 global $woocommerce; 

if($woocommerce && is_shop() || $woocommerce && is_product_category() || $woocommerce && is_product_tag()) {
	$header_title = get_post_meta(woocommerce_get_page_id('shop'), '_nectar_header_title', true);
	$header_bg = get_post_meta(woocommerce_get_page_id('shop'), '_nectar_header_bg', true);
	$header_bg_color = get_post_meta(woocommerce_get_page_id('shop'), '_nectar_header_bg_color', true);
} 
else if(is_home() || is_archive()){
	$header_title = get_post_meta(get_option('page_for_posts'), '_nectar_header_title', true);
	$header_bg = get_post_meta(get_option('page_for_posts'), '_nectar_header_bg', true); 
	$header_bg_color = get_post_meta(get_option('page_for_posts'), '_nectar_header_bg_color', true);
}  else {
	$header_title = get_post_meta($post->ID, '_nectar_header_title', true);
	$header_bg = get_post_meta($post->ID, '_nectar_header_bg', true); 
	$header_bg_color = get_post_meta($post->ID, '_nectar_header_bg_color', true);
}

//check if parallax nectar slider is being used
$parallax_nectar_slider = using_nectar_slider();
$force_effect = get_post_meta($post->ID, '_force_transparent_header', true);

//header vars
$logo_class = (!empty($options['use-logo']) && $options['use-logo'] == '1') ? null : 'class="no-image"'; 
$sideWidgetArea = (!empty($options['header-slide-out-widget-area'])) ? $options['header-slide-out-widget-area'] : 'off';
$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? 'true' : 'false';
$headerSearch = (!empty($options['header-disable-search']) && $options['header-disable-search'] == '1') ? 'false' : 'true';
$headerFormat = (!empty($options['header_format'])) ? $options['header_format'] : 'default';
$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? 'true' : 'false';
$headerColorScheme = (!empty($options['header-color'])) ? $options['header-color'] : 'light';
$userSetBG = (!empty($options['header-background-color'])) ? $options['header-background-color'] : '#ffffff';
if($headerColorScheme == 'dark') { $userSetBG = '#1f1f1f'; } 	

if($headerFormat == 'centered-menu-under-logo') $fullWidthHeader = 'false';

?>

<body <?php body_class(is_front_page() ? ' is-homepage ' : ''); ?> data-header-inherit-rc="<?php echo (!empty($options['header-inherit-row-color']) && $options['header-inherit-row-color'] == '1') ? "true" : "false"; ?>"
                             data-header-search="<?php echo $headerSearch; ?>"
                             data-animated-anchors="<?php echo (!empty($options['one-page-scrolling']) && $options['one-page-scrolling'] == '1') ? 'true' : 'false'; ?>"
                             data-ajax-transitions="<?php echo (!empty($options['ajax-page-loading']) && $options['ajax-page-loading'] == '1') ? 'true' : 'false'; ?>"
                             data-full-width-header="<?php echo $fullWidthHeader; ?>"
                             data-slide-out-widget-area="<?php echo ($sideWidgetArea == '1') ? 'true' : 'false';  ?>"
                             data-loading-animation="<?php echo (!empty($options['loading-image-animation'])) ? $options['loading-image-animation'] : 'none'; ?>"
                             data-bg-header="<?php echo (!empty($header_bg) || !empty($header_bg_color) || !empty($header_title) || $parallax_nectar_slider == 1 || $force_effect == 'on') ? 'true' : 'false'; ?>"
                             data-ext-responsive="<?php echo (!empty($options['responsive']) && $options['responsive'] == 1 && !empty($options['ext_responsive']) && $options['ext_responsive'] == '1') ? 'true' : 'false'; ?>"
                             data-header-resize="<?php if(!empty($options['header-resize-on-scroll'])) { echo $options['header-resize-on-scroll']; } else { echo '0'; } ?>"
                             data-header-color="<?php echo (!empty($options['header-color'])) ? $options['header-color'] : 'light' ; ?>" <?php
echo (!empty($options['transparent-header']) && $options['transparent-header'] == '1') ? null : 'data-transparent-header="false"'; ?>
                             data-smooth-scrolling="<?php echo $options['smooth-scrolling']; ?>"
                             data-responsive="<?php echo (!empty($options['responsive']) && $options['responsive'] == 1) ? '1'  : '0' ?>" >

<?php if(!empty($options['boxed_layout']) && $options['boxed_layout'] == '1') { echo '<div id="boxed">'; } ?>

<?php $using_secondary = (!empty($options['header_layout'])) ? $options['header_layout'] : ' '; 

if($using_secondary == 'header_with_secondary') { ?>

	<div id="header-secondary-outer" data-full-width="<?php echo (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? 'true' : 'false' ; ?>">
		<div class="container">
			<nav>
				<?php if(!empty($options['enable_social_in_header']) && $options['enable_social_in_header'] == '1') { ?>
					<ul id="social">
						<?php  if(!empty($options['use-twitter-icon-header']) && $options['use-twitter-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['twitter-url']; ?>"><i class="icon-twitter"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-facebook-icon-header']) && $options['use-facebook-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['facebook-url']; ?>"><i class="icon-facebook"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-vimeo-icon-header']) && $options['use-vimeo-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['vimeo-url']; ?>"><i class="icon-vimeo"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-pinterest-icon-header']) && $options['use-pinterest-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['pinterest-url']; ?>"><i class="icon-pinterest"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-linkedin-icon-header']) && $options['use-linkedin-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['linkedin-url']; ?>"><i class="icon-linkedin"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-youtube-icon-header']) && $options['use-youtube-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['youtube-url']; ?>"><i class="icon-youtube"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-tumblr-icon-header']) && $options['use-tumblr-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['tumblr-url']; ?>"><i class="icon-tumblr"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-dribbble-icon-header']) && $options['use-dribbble-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['dribbble-url']; ?>"><i class="icon-dribbble"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-rss-icon-header']) && $options['use-rss-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo (!empty($options['rss-url'])) ? $options['rss-url'] : get_bloginfo('rss_url'); ?>"><i class="icon-rss"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-github-icon-header']) && $options['use-github-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['github-url']; ?>"><i class="icon-github-alt"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-behance-icon-header']) && $options['use-behance-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['behance-url']; ?>"><i class="icon-be"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-google-plus-icon-header']) && $options['use-google-plus-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['google-plus-url']; ?>"><i class="icon-google-plus"></i> </a></li> <?php } ?>
						<?php  if(!empty($options['use-instagram-icon-header']) && $options['use-instagram-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['instagram-url']; ?>"><i class="icon-instagram"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-stackexchange-icon-header']) && $options['use-stackexchange-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['stackexchange-url']; ?>"><i class="icon-stackexchange"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-soundcloud-icon-header']) && $options['use-soundcloud-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['soundcloud-url']; ?>"><i class="icon-soundcloud"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-flickr-icon-header']) && $options['use-flickr-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['flickr-url']; ?>"><i class="icon-flickr"></i></a></li> <?php } ?>
						<?php  if(!empty($options['use-spotify-icon-header']) && $options['use-spotify-icon-header'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['spotify-url']; ?>"><i class="icon-salient-spotify"></i></a></li> <?php } ?>
					</ul>
				<?php } ?>
				
				<?php if(has_nav_menu('secondary_nav')) { ?>
					<ul class="sf-menu">	
				   	   <?php wp_nav_menu( array('walker' => new Nectar_Arrow_Walker_Nav_Menu, 'theme_location' => 'secondary_nav', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
					</ul>
				<?php }	?>
				
			</nav>
		</div>
	</div>

<?php } ?>

<div id="header-space"></div>

<?php 
	// header transparent option
	$transparency_markup = null;
	$activate_transparency = null;
	
	$using_fw_slider = using_nectar_slider();
    $using_fw_slider = (!empty($options['transparent-header']) && $options['transparent-header'] == '1') ? $using_fw_slider : 0;
    if($force_effect == 'on') $using_fw_slider = '1';
    $disable_effect = get_post_meta($post->ID, '_disable_transparent_header', true);

	if(!empty($options['transparent-header']) && $options['transparent-header'] == '1') {
		
		$starting_color = (empty($options['header-starting-color'])) ? '#ffffff' : $options['header-starting-color'];
		$activate_transparency = using_page_header($post->ID);
		$remove_border = (!empty($options['header-remove-border']) && $options['header-remove-border'] == '1') ? 'true' : 'false';
		$transparency_markup = ($activate_transparency == 'true') ? 'data-transparent-header="true" data-remove-border="'.$remove_border.'" class="transparent"' : null ;
	}
	
?>


<div id="header-outer" data-has-menu="<?php echo (has_nav_menu('top_nav')) ? 'true' : 'false'; ?>" <?php echo $transparency_markup; ?>
     data-user-set-bg="<?php echo $userSetBG; ?>" data-format="<?php echo $headerFormat; ?>"
     data-cart="<?php echo ($woocommerce && !empty($options['enable-cart']) && $options['enable-cart'] == '1') ? 'true': 'false';?>"
     data-transparency-option="<?php if($disable_effect == 'on') { echo '0'; } else { echo $using_fw_slider; } ?>"
     data-shrink-num="<?php echo (!empty($options['header-resize-on-scroll-shrink-num'])) ? $options['header-resize-on-scroll-shrink-num'] : 6; ?>"
     data-full-width="<?php echo $fullWidthHeader; ?>" data-using-secondary="<?php echo ($using_secondary == 'header_with_secondary') ? '1' : '0'; ?>"
     data-using-logo="<?php if(!empty($options['use-logo'])) echo $options['use-logo']; ?>"
     data-logo-height="<?php if(!empty($options['logo-height'])) echo $options['logo-height']; ?>"
     data-padding="0" data-header-resize="<?php if(!empty($options['header-resize-on-scroll'])) echo $options['header-resize-on-scroll']; ?>">
	
	<!-- <div class="container">
		<div class="row">
			<div class="phone-support text-right">
				NEED HELP? CALL US FREE: <strong>042 849 5316</strong>
			</div>
		</div>
	</div> -->
	<header id="top">
		<div class="header-logo">
			<div class="container">
				
				<div class="row">
					  
					<div class="col span_5 col_logo">
						<?php if( $options['slogan_align'] !== 'right' && !empty($options['slogan']) ): ?>
							<div class="slogan"><?php echo $options['slogan']; ?></div>
						<?php endif; ?>
						<?php if( $options['extra_text_align'] !== 'right' && !empty($options['extra_text']) ): ?>
							<div class="extra_text_align"><?php echo $options['extra_text']; ?></div>
						<?php endif; ?>
						<?php $options = get_option('salient'); ?>
						<a id="logo" href="<?php echo home_url(); ?>" <?php echo $logo_class; ?> title="Logo">
							<img src="<?php echo !empty($options['logo']) ? $options['logo'] : (get_template_directory_uri() . '/images/logo.jpg'); ?>" title="Logo" alt="Logo"/>
						</a>

					</div><!--/span_3-->
					<div class="col span_7 header-right">
						<?php if( $options['sub_slogan_align'] === 'right' && !empty($options['sub_slogan']) ): ?>
							<div class="sub_slogan"><?php echo $options['sub_slogan']; ?></div>
						<?php endif; ?>
						<?php if( $options['extra_text_align'] !== 'right' && !empty($options['extra_text']) ): ?>
							<div class="extra_text_align"><?php echo $options['extra_text']; ?></div>
						<?php endif; ?>

						<div class="row desktop-top-menu hidden-phone hidden-tablet col_menu_top">
							<?php if(has_nav_menu('top_nav')) : ?>
								<?php wp_nav_menu( array('theme_location' => 'top_nav', 'container' => 'nav', 'menu' => 'top_nav', 'walker' => new Nectar_Arrow_Walker_Nav_Menu, 'items_wrap' => '<ul  id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>' ) ); ?>
							<?php else: ?><nav><ul class="nav navbar-nav"><li><a href="">No menu assigned!</a></li></ul></nav>
							<?php endif; ?>
						</div>
						<div class="row line_blue"></div>
						<div class="row hidden-desktop mobile-top-menu">
							<a class="slicknav_btn slicknav_open" tabindex="0" aria-haspopup="true" href="#mobile-menu" style="outline: medium none;"><span class="slicknav_menutxt"></span><span class="slicknav_icon slicknav_no-text"><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a>
						</div>
					</div>
				</div><!--/row-->
			</div>
		</div>
		
	</header>
	
	
	<?php if (!empty($options['enable-cart']) && $options['enable-cart'] == '1') { ?>
		<?php
		if ($woocommerce) { ?>
			
		<div class="cart-outer">
			<div class="cart-menu-wrap">
				<div class="cart-menu">
					<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><div class="cart-icon-wrap"><i class="icon-salient-cart"></i> <div class="cart-wrap"><span><?php echo $woocommerce->cart->cart_contents_count; ?> </span></div> </div></a>
				</div>
			</div>
			
			<div class="cart-notification">
				<span class="item-name"></span> <?php echo __('was successfully added to your cart.', NECTAR_THEME_NAME); ?>
			</div>
			
			<?php
				// Check for WooCommerce 2.0 and display the cart widget
				if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
					the_widget( 'WC_Widget_Cart', 'title= ' );
				} else {
					the_widget( 'WooCommerce_Widget_Cart', 'title= ' );
				}
			?>
				
		</div>
		
	 <?php } 
	 
   } 
   
   
   echo '<div class="ns-loading-cover"></div>';
   
   ?>		
	

</div><!--/header-outer-->

<?php if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') { get_template_part('includes/header-search'); } ?> 

<div id="mobile-menu">
	
	<div class="container">
		<ul class="nav navbar-nav">
			<?php 
				if(has_nav_menu('top_nav')) {
					# wp_nav_menu( array('theme_location' => 'top_nav', 'container' => 'nav', 'menu' => 'top_nav', 'walker' => new Nectar_Arrow_Walker_Nav_Menu, 'items_wrap' => '<ul  id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>' ) );
				    wp_nav_menu( array('theme_location' => 'top_nav', 'menu' => 'top_nav', 'container' => '', 'items_wrap' => '%3$s' ) );

					echo '<li id="mobile-search">
					<form action="'.home_url().'" method="GET">
			      		<input type="text" name="s" value="" placeholder="'.__('Search..', NECTAR_THEME_NAME) .'" />
					</form>
					</li>';
				}
				else {
					echo '<li><a href="">No menu assigned!</a></li>';
				}
			?>
		</ul>
	</div>
	
</div>



<div id="ajax-loading-screen" data-method="<?php echo (!empty($options['transition-method'])) ? $options['transition-method'] : 'ajax' ; ?>"><span class="loading-icon <?php echo (!empty($options['loading-image-animation']) && !empty($options['loading-image'])) ? $options['loading-image-animation'] : null; ?>"> <?php if(empty($options['loading-image'])) { if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') { echo '<span class="default-loading-icon spin"></span>'; } else { echo '<span class="default-skin-loading-icon"></span>'; } } ?> </span></div>
<div id="ajax-content-wrap">
