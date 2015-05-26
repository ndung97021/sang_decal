<?php 
/* Template Name: Home - Recent Work Subpage */
get_header();

function render_gallery($output, $gallery){
	global $post;
	$_attachments = explode(',', $gallery['ids']);
	/*
	$page_no = !empty($_GET['page_no']) ? (int)$_GET['page_no'] : 1;
	// 20 images per page
	$number_image = 20;
	$total = count($_attachments);
	$offset = $number_image * ($page_no - 1);
	$limit = $offset + $number_image;
	if( $limit > $total ) {
		$limit = $total;
	}
	image_grid, nectarslider_style,
	*/
	$column = !empty($gallery['columns']) ? $gallery['columns'] : 3;
	$offset = 0;
	$limit = count($_attachments);
	$output .= '<div class="custom-render-gallery" id="gallery-'.$post->ID.'"><h2 class="custom-render-gallery-title">'.(!empty($gallery['title']) ? $gallery['title'] : 'Gallery').'</h2>'.
	           '<div class="custom-render-gallery-list row" id="gallery-list-'.$post->ID.'">';
	for( $i=$offset; $i<$limit; $i++ ) {
		if( empty($_attachments[$i]) ) continue;
		$attachment = get_post($_attachments[$i]);
		$url = wp_get_attachment_url( $attachment->ID );
		list( $src, $width, $height ) = wp_get_attachment_image_src($attachment->ID, array(150, 130));
		if( empty($src) ) {
			#continue;
		}
		$alt = trim(strip_tags( $attachment->post_excerpt )); // If not, Use the Caption
		if ( empty($alt) ) {
			$alt = trim(strip_tags( $attachment->post_title )); // Finally, use the title
		}
		// prettyPhoto[rel-2003930574]
		$output .= '<div class="col span_'.intval(12/$column).'"><a class="pretty-photo" rel="prettyPhoto[rel-'.$post->ID.']" href="'.$url.'"><img src="'.$src.'" width="150" height="130" class="thumbnail" alt="'.$alt.'"/></a></div>';
	}
	$output .= '</div></div>';
	return $output;
}
add_filter('post_gallery', 'render_gallery', 9, 2);

$is_front_page = is_front_page();
?>
<?php $options = get_option('salient'); ?>
<div class="home-wrap <?php echo 'innerpages' ?>">
	<div class="list-category container-wrap">
		<div class="container main-content">
			<div class="row">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; endif; ?>
			</div> <!-- .row -->
		</div>
	</div>
</div><!--/home-wrap-->

<?php get_footer(); ?>