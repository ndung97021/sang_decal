<?php 

$options = get_option('salient'); 
global $post;
$cta_link = ( !empty($options['cta-btn-link']) ) ? $options['cta-btn-link'] : '#';

$exclude_pages = (!empty($options['exclude_cta_pages'])) ? $options['exclude_cta_pages'] : array(); 
if(!empty($options['cta-text']) && current_page_url() != $cta_link && !in_array($post->ID, $exclude_pages)) { 

$cta_btn_color = (!empty($options['cta-btn-color'])) ? $options['cta-btn-color'] : 'accent-color'; ?>
	
<div id="call-to-action">
	<div class="container">
		<div class="triangle"></div>
		<span> <?php echo $options['cta-text']; ?> </span>
		<a class="nectar-button <?php if($cta_btn_color != 'see-through') echo 'regular-button '; ?> <?php echo $cta_btn_color;?>" data-color-override="false" href="<?php echo $cta_link ?>"><?php if(!empty($options['cta-btn'])) echo $options['cta-btn']; ?> </a>
	</div>
</div>

<?php } ?>

<div id="footer-outer">
		
		<div id="copyright">
			
			<div class="container">
				<div class="row">
					<div class="col span_6">
						<?php if(has_nav_menu('top_nav')) : ?>
							<?php wp_nav_menu( array('theme_location' => 'top_nav', 'container' => 'nav', 'menu' => 'top_nav', 'walker' => new Nectar_Arrow_Walker_Nav_Menu, 'items_wrap' => '<ul  id="%1$s" class="nav navbar-nav sf-menu %2$s">%3$s</ul>' ) ); ?>
						<?php else: ?><nav><ul class="nav navbar-nav"><li><a href="">No menu assigned!</a></li></ul></nav>
						<?php endif; ?>
					</div>
					<div class="col span_6">
						<?php if( !empty($options['footer-copyright-text']) ): ?>
							<div class="footer-copyright-text">
								<?php echo $options['footer-copyright-text']; ?>
							</div>
						<?php endif; ?>
						<?php if( !empty($options['footer-copyright-text-extra']) ): ?>
							<div class="footer-info-text">
								<?php echo $options['footer-copyright-text-extra']; ?>
							</div>
						<?php endif; ?>
					</div><!--/span_5-->
					<?php
					if( !empty($options['use-social-icons']) ) : ?>
					<div class="col span_4 social">
						<ul id="social" class="social-icons">
							<?php  if(!empty($options['use-google-plus-icon']) && $options['use-google-plus-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['google-plus-url']; ?>"><i class="icon-google-plus"></i> </a></li> <?php } ?>
							<?php  if(!empty($options['use-twitter-icon']) && $options['use-twitter-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['twitter-url']; ?>"><i class="icon-twitter"></i> </a></li> <?php } ?>
							<?php  if(!empty($options['use-facebook-icon']) && $options['use-facebook-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['facebook-url']; ?>"><i class="icon-facebook"></i> </a></li> <?php } ?>
							<?php  if(!empty($options['use-vimeo-icon']) && $options['use-vimeo-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['vimeo-url']; ?>"> <i class="icon-vimeo"></i> </a></li> <?php } ?>
							<?php  if(!empty($options['use-pinterest-icon']) && $options['use-pinterest-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['pinterest-url']; ?>"><i class="icon-pinterest"></i> </a></li> <?php } ?>
							<?php  if(!empty($options['use-linkedin-icon']) && $options['use-linkedin-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['linkedin-url']; ?>"><i class="icon-linkedin"></i> </a></li> <?php } ?>
							<?php  if(!empty($options['use-youtube-icon']) && $options['use-youtube-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['youtube-url']; ?>"><i class="icon-youtube"></i> </a></li> <?php } ?>
							<?php  if(!empty($options['use-tumblr-icon']) && $options['use-tumblr-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['tumblr-url']; ?>"><i class="icon-tumblr"></i> </a></li> <?php } ?>
							<?php  if(!empty($options['use-dribbble-icon']) && $options['use-dribbble-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['dribbble-url']; ?>"><i class="icon-dribbble"></i> </a></li> <?php } ?>
							<?php  if(!empty($options['use-rss-icon']) && $options['use-rss-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo (!empty($options['rss-url'])) ? $options['rss-url'] : get_bloginfo('rss_url'); ?>"><i class="icon-rss"></i> </a></li> <?php } ?>
							<?php  if(!empty($options['use-github-icon']) && $options['use-github-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['github-url']; ?>"><i class="icon-github-alt"></i></a></li> <?php } ?>
							<?php  if(!empty($options['use-behance-icon']) && $options['use-behance-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['behance-url']; ?>"> <i class="icon-be"></i> </a></li> <?php } ?>
							<?php  if(!empty($options['use-instagram-icon']) && $options['use-instagram-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['instagram-url']; ?>"><i class="icon-instagram"></i></a></li> <?php } ?>
							<?php  if(!empty($options['use-stackexchange-icon']) && $options['use-stackexchange-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['stackexchange-url']; ?>"><i class="icon-stackexchange"></i></a></li> <?php } ?>
							<?php  if(!empty($options['use-soundcloud-icon']) && $options['use-soundcloud-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['soundcloud-url']; ?>"><i class="icon-soundcloud"></i></a></li> <?php } ?>
							<?php  if(!empty($options['use-flickr-icon']) && $options['use-flickr-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['flickr-url']; ?>"><i class="icon-flickr"></i></a></li> <?php } ?>
							<?php  if(!empty($options['use-spotify-icon']) && $options['use-spotify-icon'] == 1) { ?> <li><a target="_blank" href="<?php echo $options['spotify-url']; ?>"><i class="icon-salient-spotify"></i></a></li> <?php } ?>
						</ul>
					</div><!--/span_12-->
					<?php endif; ?>
				</div>
			</div><!--/container-->
			
		</div><!--/row-->
		
	
</div><!--/footer-outer-->


<?php 
$sideWidgetArea = (!empty($options['header-slide-out-widget-area'])) ? $options['header-slide-out-widget-area'] : 'off';
$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? true : false;

if($sideWidgetArea == '1') { ?>
	<div id="slide-out-widget-area-bg"></div>
	<div id="slide-out-widget-area">
		<div class="inner">
		  <a class="slide_out_area_close" href="#"><span class="icon-salient-x icon-default-style"></span></a>
		  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Slide Out Widget Area') ) : else : ?>	
		      <div class="widget">			
			 	 <h4 class="widgettitle">Side Widget Area</h4>
			 	 <p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign widgets to this area.</a></p>
		 	  </div>
		 <?php endif; ?>
		</div>
	</div>
<?php } ?>


</div> <!--/ajax-content-wrap-->


<?php if(!empty($options['boxed_layout']) && $options['boxed_layout'] == '1') { echo '</div>'; } ?>

<?php if(!empty($options['back-to-top']) && $options['back-to-top'] == 1) { ?>
	<a id="to-top"><i class="icon-angle-up"></i></a>
<?php } ?>

<?php if(!empty($options['google-analytics'])) echo $options['google-analytics']; ?> 

<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/menuzord.js"></script>

<script type="text/javascript">

	jQuery(document).ready(function($){
		$('.bxslider').bxSlider();
		$('.mobile-top-menu a.slicknav_btn').bind('click', function(ev){
			ev.preventDefault();
			var $mobile = $('#mobile-menu');
			$mobile.toggleClass('show');
			return false;
		});
		jQuery("#menuzord").menuzord({

			align: "right"

		});

	});

</script>


</body>
</html>