<?php
$is_builder_active = '';
if ( FLBuilderModel::is_builder_active() ) {
	$is_builder_active = 'yes';
}
?>
(function($) {
jQuery(document).ready(function(){


	<?php if( ($settings->bbn_closable == 'yes') && ($settings->bbn_appearance != '' || $settings->bbn_appearance != '0' ) ): ?>
		
		new BBAlert({
			id:'<?php echo $id;?>',
			duration: <?php echo ($settings->bbn_appearance == '')? '0' : $settings->bbn_appearance ; ?>,
			is_builder_active : '<?php echo $is_builder_active; ?>',
		});

	<?php endif ?>
});
})(jQuery);