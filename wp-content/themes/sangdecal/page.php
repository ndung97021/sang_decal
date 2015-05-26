<?php get_header(); ?>

<?php nectar_page_header($post->ID); ?>

<div class="container-wrap">
	
	<div class="container main-content">
		
		<div class="row">
			
			<?php 
			 //buddypress
			 global $bp; 
			 if($bp && !bp_is_blog_page()) echo '<h1>' . get_the_title() . '</h1>'; ?>
			
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				
				<?php the_content(); ?>
	
			<?php endwhile; endif; ?>
				
<div id="fws_5479e4fa98402" class="wpb_row vc_row-fluid full-width-section standard_section  home-logo-bar "  style="padding-top: 0px; padding-bottom: 0px; "><div class="row-bg-wrap"> <div class="row-bg  using-bg-color " style="background-color: #ececee; "></div> </div><div class="col span_12 dark left">
	<div  class="vc_span12 wpb_column column_container col no-extra-padding"  data-hover-bg="" data-animation="" data-delay="0">
		<div class="wpb_wrapper">
			
	<div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">
			<p style="text-align: center;"><img class="alignnone size-full wp-image-27" src="http://sydneymortgagebrokers.com.au/wp-content/uploads/2014/11/logo-7.jpg" alt="logo-7" width="208" height="65" /> <img class="alignnone size-full wp-image-28" src="http://sydneymortgagebrokers.com.au/wp-content/uploads/2014/11/logo-1.jpg" alt="logo-1" width="140" height="65" /> <img class="alignnone size-medium wp-image-29" src="http://sydneymortgagebrokers.com.au/wp-content/uploads/2014/11/logo-2.jpg" alt="logo-2" width="152" height="65" /> <img class="alignnone size-medium wp-image-30" src="http://sydneymortgagebrokers.com.au/wp-content/uploads/2014/11/logo-3.jpg" alt="logo-3" width="164" height="65" /> <img class="alignnone size-medium wp-image-31" src="http://sydneymortgagebrokers.com.au/wp-content/uploads/2014/11/logo-4.jpg" alt="logo-4" width="171" height="65" /> <img class="alignnone size-medium wp-image-32" src="http://sydneymortgagebrokers.com.au/wp-content/uploads/2014/11/logo-5.jpg" alt="logo-5" width="136" height="65" /> <img class="alignnone size-medium wp-image-33" src="http://sydneymortgagebrokers.com.au/wp-content/uploads/2014/11/logo-6.jpg" alt="logo-6" width="141" height="65" /></p>

		</div> 
	</div> 
		</div> 
	</div> 
</div></div>

		</div><!--/row-->
		
	</div><!--/container-->
	
</div>
<?php get_footer(); ?>