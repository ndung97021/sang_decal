<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 12/7/14
 * Time: 12:16 PM
 */

$options = get_option('salient');
$is_front_page = is_front_page();

if( $is_front_page ) :
	?>
	<div class="slide-container">
		<div class="container">
			<div id="featured1" class="<?php echo ($is_front_page ? 'slide-homepage' : '') ?>" data-caption-animation="<?php echo (!empty($options['slider-caption-animation']) && $options['slider-caption-animation'] == 1) ? '1' : '0'; ?>" data-bg-color="<?php if(!empty($options['slider-bg-color'])) echo $options['slider-bg-color']; ?>" data-slider-height="<?php if(!empty($options['slider-height'])) echo $options['slider-height']; ?>" data-animation-speed="<?php if(!empty($options['slider-animation-speed'])) echo $options['slider-animation-speed']; ?>" data-advance-speed="<?php if(!empty($options['slider-advance-speed'])) echo $options['slider-advance-speed']; ?>" data-autoplay="1">

				<?php
				$slides = new WP_Query( array( 'post_type' => 'home_slider', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order' ) );

				if( $slides->have_posts() ) : ?>

					<?php while( $slides->have_posts() ) : $slides->the_post();

						$alignment = get_post_meta($post->ID, '_nectar_slide_alignment', true);

						$video_embed = get_post_meta($post->ID, '_nectar_video_embed', true);
						$video_m4v = get_post_meta($post->ID, '_nectar_video_m4v', true);
						$video_ogv = get_post_meta($post->ID, '_nectar_video_ogv', true);
						$video_poster = get_post_meta($post->ID, '_nectar_video_poster', true);

						?>

						<div class="slide orbit-slide <?php if( !empty($video_embed) || !empty($video_m4v) || !empty($video_ogv)) { echo 'has-video'; } else { echo $alignment; } ?>">

							<?php $image = get_post_meta($post->ID, '_nectar_slider_image', true); ?>
							<article data-background-cover="<?php echo (!empty($options['slider-background-cover']) && $options['slider-background-cover'] == 1) ? '1' : '0'; ?>" style="background-image: url('<?php echo $image; ?>')">
								<div class="container">
									<div class="row">
										<div class="col span_12">
											<div class="post-title">

												<?php
												$wp_version = floatval(get_bloginfo('version'));

												//video embed
												if( !empty( $video_embed ) ) {

													echo '<div class="video">' . do_shortcode($video_embed) . '</div>';

												}
												//self hosted video pre 3-6
												else if( !empty($video_m4v) && $wp_version < "3.6" || !empty($video_ogv) && $wp_version < "3.6") {

													echo '<div class="video">';
													nectar_video($post->ID);
													echo '</div>';

												}
												//self hosted video post 3-6
												else if($wp_version >= "3.6"){

													if(!empty($video_m4v) || !empty($video_ogv)) {

														$video_output = '[video ';

														if(!empty($video_m4v)) { $video_output .= 'mp4="'. $video_m4v .'" '; }
														if(!empty($video_ogv)) { $video_output .= 'ogv="'. $video_ogv .'"'; }

														$video_output .= ' poster="'.$video_poster.'"]';

														echo '<div class="video">' . do_shortcode($video_output) . '</div>';
													}
												}

												?>

												<?php
												//mobile more info button for video
												if( !empty($video_embed) || !empty($video_m4v)) { echo '<div><a href="#" class="more-info"><span class="mi">'.__("More Info",NECTAR_THEME_NAME).'</span><span class="btv">'.__("Back to Video",NECTAR_THEME_NAME).'</span></a></div>'; } ?>

												<?php $caption = get_post_meta($post->ID, '_nectar_slider_caption', true); ?>
												<h2 data-has-caption="<?php echo (!empty($caption)) ? '1' : '0'; ?>"><span>
								                    <?php echo $caption; ?>
												</span></h2>

												<?php
												$button = get_post_meta($post->ID, '_nectar_slider_button', true);
												$button_url = get_post_meta($post->ID, '_nectar_slider_button_url', true);

												if(!empty($button)) { ?>
													<a href="<?php echo $button_url; ?>" class="uppercase"><?php echo $button; ?></a>
												<?php } ?>


											</div><!--/post-title-->
										</div>
									</div>
								</div>
							</article>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php else:
					wp_reset_postdata();

					$slides = new WP_Query( array( 'post_type' => 'nectar_slider', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order', 'tax_query' => array(
						array(
							'taxonomy' => 'slider-locations',
							'field'    => 'slug',
							'terms'    => 'home-slide',
						),
					) ) );
					if( $slides->have_posts() ) :
						$slider_type = 'bxslider';
						#$slider_type = 'orbit';
						if( $slider_type == 'bxslider' ) :
							echo '<ul class="bxslider clearfix">';
						else:
						endif;

						while( $slides->have_posts() ) : $slides->the_post();

							$alignment = get_post_meta($post->ID, '_nectar_slide_alignment', true);

							$video_embed = get_post_meta($post->ID, '_nectar_video_embed', true);
							$video_m4v = get_post_meta($post->ID, '_nectar_video_m4v', true);
							$video_ogv = get_post_meta($post->ID, '_nectar_video_ogv', true);
							$video_poster = get_post_meta($post->ID, '_nectar_video_poster', true);
							/* style="background-image: url('<?php echo $image; ?>')" */

							$slider_heading = get_post_meta($post->ID, '_nectar_slider_heading', true);
							$image = get_post_meta($post->ID, '_nectar_slider_image', true);

							if( $slider_type == 'bxslider' ) : ?>
							<li>
							<?php else: ?>
							<div class="slide orbit-slide <?php if( !empty($video_embed) || !empty($video_m4v) || !empty($video_ogv)) { echo 'has-video'; } else { echo $alignment; } ?>">
								<article <?php /* data-background-cover="<?php echo (!empty($options['slider-background-cover']) && $options['slider-background-cover'] == 1) ? '1' : '0'; ?>" style="background-image: url('<?php echo $image; ?>'); background-size: 100% 100%;" */ ?>>
							<?php endif; ?>
									<div class="container">
										<div class="row">
											<img width="100%" src="<?php echo $image; ?>" alt="<?php echo strip_tags($slider_heading); ?>" title="<?php echo strip_tags($slider_heading); ?>">
											<div class="col col_left">
												<div class="post-title">
													<?php
													$wp_version = floatval(get_bloginfo('version'));
													//video embed
													if( !empty( $video_embed ) ) {
														echo '<div class="video">' . do_shortcode($video_embed) . '</div>';
													}
													//self hosted video pre 3-6
													else if( !empty($video_m4v) && $wp_version < "3.6" || !empty($video_ogv) && $wp_version < "3.6") {
														echo '<div class="video">';
														nectar_video($post->ID);
														echo '</div>';
													}
													//self hosted video post 3-6
													else if($wp_version >= "3.6"){
														if(!empty($video_m4v) || !empty($video_ogv)) {
															$video_output = '[video ';
															if(!empty($video_m4v)) { $video_output .= 'mp4="'. $video_m4v .'" '; }
															if(!empty($video_ogv)) { $video_output .= 'ogv="'. $video_ogv .'"'; }
															$video_output .= ' poster="'.$video_poster.'"]';
															echo '<div class="video">' . do_shortcode($video_output) . '</div>';
														}
													}
													//mobile more info button for video
													if( !empty($video_embed) || !empty($video_m4v)) { echo '<div><a href="#" class="more-info"><span class="mi">'.__("More Info",NECTAR_THEME_NAME).'</span><span class="btv">'.__("Back to Video",NECTAR_THEME_NAME).'</span></a></div>'; } ?>

													<h2 class="slide-heading" data-has-heading="<?php echo (!empty($slider_heading)) ? '1' : '0'; ?>"><span>
								                    <?php echo str_replace('\n', '<br>', $slider_heading); ?>
													</span></h2>
													<?php $caption = get_post_meta($post->ID, '_nectar_slider_caption', true); ?>
													<div class="slide-caption" data-has-caption="<?php echo (!empty($caption)) ? '1' : '0'; ?>"><span>
								                    <?php echo str_replace('\n', '<br>', nl2br($caption)); ?>
													</span></div>
													<?php
													$button = get_post_meta($post->ID, '_nectar_slider_button', true);
													$button_url = get_post_meta($post->ID, '_nectar_slider_button_url', true);
													if(!empty($button)) : ?>
														<div class="slide-button"><a href="<?php echo $button_url; ?>" class="button uppercase"><?php echo $button; ?></a></div>
													<?php endif; ?>

												</div><!--/post-title-->
											</div>
											<?php /* <div class="col col_right"></div> */ ?>
										</div>
									</div>
							<?php
								if( $slider_type == 'bxslider' ) : ?>
								</li>
							<?php else: ?>
								</article>
							</div><?php endif; ?>
						<?php endwhile; ?>

						<?php
						if( $slider_type == 'bxslider' ) :
							echo '</ul>';
						else:
						endif;
						?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div><!-- #featured -->
		</div><!-- .container -->
	</div><!-- .slide-container -->
<?php endif; ?>