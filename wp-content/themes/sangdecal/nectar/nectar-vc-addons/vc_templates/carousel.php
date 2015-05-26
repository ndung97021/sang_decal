<?php 


extract(shortcode_atts(array("carousel_title" => '', "scroll_speed" => 'medium', 'easing' => 'easeInExpo', 'autorotate' => '', 'tag_name' => 'h2', 'max_cols' => 4, 'col_width' => 264, 'scroll_num' => '1', 'full_width' => 'false'), $atts));
if( $max_cols == 4 && $col_width > 264) {
	$col_width = max($col_width, 264);
} else if( $max_cols == 3 && $col_width > 353) {
	$col_width = max($col_width, 353);
} else if( $max_cols == 6 && $col_width > 176) {
	$col_width = max($col_width, 176);
}
$carousel_html = '';
$tag_name = sprintf('<%s class="uppercase">%s</%s>', $tag_name, $carousel_title, $tag_name);
$carousel_html .= '
<div class="carousel-wrap" data-full-width="'.$full_width.'" data-max-cols="'.$max_cols.'" data-col-width="'.$col_width.'" data-scroll-num="'.$scroll_num.'">
<div class="carousel-heading">
	<div class="container">
		'. $tag_name .'
		<a class="carousel-prev" href="#"><i class="icon-angle-left"></i></a>
		<a class="carousel-next" href="#"><i class="icon-angle-right"></i></a>
	</div>
</div>
<ul class="row carousel" data-scroll-speed="' . $scroll_speed . '" data-easing="' . $easing . '" data-autorotate="' . $autorotate . '">';
$_SESSION['___carousel_max_cols'] = $max_cols;//array($max_cols, $col_width);
echo $carousel_html . do_shortcode($content) . '</ul></div>';
unset($_SESSION['___carousel']);

?>