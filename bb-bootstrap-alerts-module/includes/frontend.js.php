(function($) {
jQuery(document).ready(function(){


	<?php if( ($settings->bbn_closable == 'yes') && ($settings->bbn_appearance != '' || $settings->bbn_appearance != '0' ) ): ?>
		
		new BBAlert({
			id:'<?php echo $id;?>',
			duration: <?php echo ($settings->bbn_appearance == '')? '0' : $settings->bbn_appearance ; ?>,
		});

	<?php endif ?>
});
})(jQuery);