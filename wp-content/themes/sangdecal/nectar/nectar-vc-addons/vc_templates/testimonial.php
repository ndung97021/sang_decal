<?php

extract(shortcode_atts(array("name" => '', "quote" => '', 'image' => '', 'extra_html' => '', 'quote_text' => 1, 'extra_class' => ''), $atts));
$swap_name = NectarConfig::get('swap_name', 0);
$name_tag = NectarConfig::get('name_tag', 'span');

$cls = sanitize_title($name) . " {$extra_class}";

if( !empty($image) ) {
	$image = '<img src="'.$image.'" alt=""/> ';
} else {
	$image = '&minus; ';
}
if( empty($quote_text) ) {
	$quote_text = '';
} else {
	$quote_text = '"';
}
if( !empty($quote) ) {
	$quote = '<p>'.$quote_text.$quote.$quote_text.'</p>';
} else {
	$quote = '';
}
if( $swap_name ) {
	echo '<blockquote class="'.$cls.'"><'.$name_tag.' class="name">'.$image.$name.'</'.$name_tag.'>'.$quote.$extra_html.'</blockquote>';
} else {
	echo '<blockquote class="'.$cls.'">' .$quote. '<'.$name_tag.' class="name">'.$image.$name.'</'.$name_tag.'>'.$extra_html.'</blockquote>';
}

?>