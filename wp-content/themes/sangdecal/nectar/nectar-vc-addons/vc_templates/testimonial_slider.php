<?php 

extract(shortcode_atts(array("autorotate"=>'', "disable_height_animation"=>'', 'once_icon' => 0, 'swap_name' => 0, 'name_tag' => 'span'), $atts));

$height_animation_class = null;
if($disable_height_animation == 'true') $height_animation_class = 'disable-height-animation';
NectarConfig::set('swap_name', $swap_name);
NectarConfig::set('once_icon', $once_icon);
NectarConfig::set('name_tag', $name_tag);
echo '<div class="col span_12 testimonial_slider '.$height_animation_class.'" data-autorotate="'.$autorotate.'" data-name_tag="'.$name_tag.'" data-swap_name="'.$swap_name.'" data-once_icon="'.$once_icon.'"><div class="slides">'.do_shortcode($content).'</div></div>';

?>