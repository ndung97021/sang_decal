<?php
$max_cols = 3;
$col_width = 353;
/*
if( isset($_SESSION['___carousel']) ) {
	list($max_cols, $col_width) = $_SESSION['___carousel'];
}
*/

if( isset($_SESSION['___carousel_max_cols']) ) {
	$max_cols = $_SESSION['___carousel_max_cols'];
}

$span = 'span_4';
if( $max_cols == 4 ) {
	$span = 'span_3';
} else if( $max_cols == 6 ) {
	$span = 'span_2';
}
echo '<li data-max-col="'.$max_cols.'" class="col '.$span.'">' . do_shortcode($content) . '</li>';

?>