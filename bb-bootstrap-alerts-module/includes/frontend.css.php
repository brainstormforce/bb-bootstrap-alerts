/**
 * This file should contain frontend styles that 
 * will be applied to individual module instances.
 *
 * You have access to three variables in this file: 
 * 
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
 *
 * Example: 
 */

.fl-node-<?php echo $id; ?> {
	font-family:"<?php echo $settings->bbn_font_field['family']; ?>";
	font-weight:<?php echo $settings->bbn_font_field['weight']; ?>;
    font-size: <?php echo ($settings->bbn_font_size != '') ? $settings->bbn_font_size : '18'; ?>px;
    line-height: <?php echo ($settings->bbn_line_height != '') ? $settings->bbn_line_height : '22'; ?>px;
    text-align:<?php echo $settings->bbn_text_align; ?>;
}
.fl-node-<?php echo $id; ?> .alert-padding {
	padding-top: <?php echo ($settings->bbn_padding_top != '') ?  $settings->bbn_padding_top : '0'; ?>px;
    padding-bottom: <?php echo ($settings->bbn_padding_bottom != '') ? $settings->bbn_padding_bottom : '0'; ?>px;
    padding-left: <?php echo ($settings->bbn_padding_left != '') ? $settings->bbn_padding_left : '0' ; ?>px;
    padding-right: <?php echo ($settings->bbn_padding_right != '') ? $settings->bbn_padding_right : '0' ; ?>px;
}
.fl-node-<?php echo $id; ?> .alert-custom {
	color: #<?php echo $settings->bbn_font_color; ?>;
	background-color: #<?php echo $settings->bbn_background_color; ?>;
	border-color: #<?php echo $settings->bbn_border_color; ?>;
	border-width:<?php echo ($settings->bbn_border_size != '') ? $settings->bbn_border_size : '1' ?>px;
	border-style:<?php echo $settings->bbn_border_style; ?>;
	border-radius:<?php echo ($settings->bbn_border_radius != '') ? $settings->bbn_border_radius : '4' ?>px;
}

.fl-node-<?php echo $id; ?> .fi-background-color,
.fl-node-<?php echo $id; ?> .dashicons,
.fl-node-<?php echo $id; ?> .fa,
.fl-node-<?php echo $id; ?> .ua-icon
 {
	color: <?php if($settings->bbn_icon_color=='') 
		{	echo "inherit"; } 
			else
			 echo "#".$settings->bbn_icon_color;
			 ?>
}