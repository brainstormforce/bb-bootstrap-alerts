/* typography */
.fl-node-<?php echo $id; ?> {
<?php if( is_array( $settings->bbn_font_field ) && ( ( $settings->bbn_font_field['family'] ) != 'Default' ) ): ?>
	font-family:"<?php echo $settings->bbn_font_field['family']; ?>";
	font-weight:<?php echo ( isset( $settings->bbn_font_field['weight'] ) && $settings->bbn_font_field['weight'] !='regular') ? $settings->bbn_font_field['weight'] : '500'; ?>;
<?php endif ?>
    font-size: <?php echo ($settings->bbn_font_size != '') ? $settings->bbn_font_size : '18'; ?>px;
    line-height: <?php echo ($settings->bbn_line_height != '') ? $settings->bbn_line_height : '22'; ?>px;
    text-align:<?php echo $settings->bbn_text_align; ?>;
}

/* padding for the contents */
.fl-node-<?php echo $id; ?> .alert-padding {
	padding-top: <?php echo ($settings->bbn_padding_top != '') ?  $settings->bbn_padding_top : '20'; ?>px;
    padding-bottom: <?php echo ($settings->bbn_padding_bottom != '') ? $settings->bbn_padding_bottom : '20'; ?>px;
    padding-left: <?php echo ($settings->bbn_padding_left != '') ? $settings->bbn_padding_left : '20' ; ?>px;
    padding-right: <?php echo ($settings->bbn_padding_right != '') ? $settings->bbn_padding_right : '20' ; ?>px;
}

/* custom notification type field css */
.fl-node-<?php echo $id; ?> .alert-custom {
	color: #<?php echo $settings->bbn_font_color; ?>;
	background-color: #<?php echo $settings->bbn_background_color; ?>;
	border-color: #<?php echo $settings->bbn_border_color; ?>;
	border-width:<?php echo ($settings->bbn_border_size != '') ? $settings->bbn_border_size : '1' ?>px;
	border-style:<?php echo $settings->bbn_border_style; ?>;
	border-radius:<?php echo ($settings->bbn_border_radius != '') ? $settings->bbn_border_radius : '4' ?>px;
}

/* custom font color css */
.fl-node-<?php echo $id; ?> .fi-background-color,
.fl-node-<?php echo $id; ?> .dashicons,
.fl-node-<?php echo $id; ?> .fa,
.fl-node-<?php echo $id; ?> .ua-icon
 {
	color: <?php echo ($settings->bbn_icon_color=='') ? 'inherit' : "#".$settings->bbn_icon_color; ?>
}

/* link color css */
.fl-node-<?php echo $id; ?> a * {
	<?php switch($settings->bbn_dropdown_field) {
		case 'alert-danger': echo "color: #a94442;";
			break;
		case 'alert-warning' : echo "color: #8a6d3b";
			break;
		case 'alert-info' : echo "color: #31708f";
			break;
		case 'alert-success' : echo "color: #3c763d";
			break;
		case 'alert-custom' : echo "color: #".$settings->bbn_font_color;
			break;
	}?>
}
/* close button padding css */
<?php if(($settings->bbn_padding_top=='0')&&($settings->bbn_padding_bottom=='0')) { ?>
.fl-node-<?php echo $id; ?> .close {
	margin: 0;
	margin-right:10px;
	margin-left:10px;
}
<?php } ?>

.fl-node-<?php echo $id; ?> .close {
	font-size: <?php echo ($settings->bbn_close_btn_size !='') ? $settings->bbn_close_btn_size : '21' ; ?>px;
}

/* for cookie base notification */
<?php if( ($settings->bbn_closable == 'yes') && ($settings->bbn_appearance != '' || $settings->bbn_appearance != '0' ) ): ?>
.fl-node-<?php echo $id; ?> .bb-bootstrap-alerts {
	/*display:none;*/
}
<?php endif ?>