<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example: 
 */

?>
<div class="bb-bootstrap-alerts-common">
	<?php
		$nav_link="#";
		$nav_target="_self";
		$navigation=0;
		if($settings->bbn_dropdown_link=='yes')
		{
			$nav_link=$settings->bbn_navigation_link;
			$nav_target=$settings->bbn_navigation_target;
		}
		if($settings->bbn_dropdown_link=='no')
		{
			$navigation=1;
		}
	?>
	<?php if(!$navigation): ?>
		<a href="<?php echo $nav_link;?>" target="<?php echo $nav_target;?>">
	<?php endif; ?>

			<div class="alert <?php echo $settings->bbn_dropdown_field; ?> fade in">
				<?php if( $settings->bbn_closable == 'yes' ): ?>
					<span class="close" data-dismiss="alert" aria-label="close">&times;</span>
				<?php endif; ?>

				<?php if( $settings->bbn_icon_align == 'before' ): ?>
					<i class="<?php echo $settings->bbn_icon_field; ?>"></i>
				<?php endif; ?>

	    		<span class="bbn_information"><?php echo $settings->bbn_textarea_field; ?></span>

	    		<?php if( $settings->bbn_icon_align == 'after' ): ?>
	    			<i class="<?php echo $settings->bbn_icon_field; ?>"></i>
				<?php endif; ?>

	    	</div>

	<?php if($navigation): ?>
		</a>
	<?php endif; ?>

</div>