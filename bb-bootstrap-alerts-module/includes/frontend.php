<!-- Bootstrap alert start -->
<div class="bb-bootstrap-alerts">

	<?php if($settings->bbn_dropdown_link=='yes'): ?>
		<a href="<?php echo ($nav_link=$settings->bbn_navigation_link != '')? $nav_link=$settings->bbn_navigation_link : '#' ;?>" target="<?php echo $nav_target=$settings->bbn_navigation_target;?>" >
	<?php endif; ?>

			<div class="alert <?php echo $settings->bbn_dropdown_field; ?> fade in" >

				<?php if( $settings->bbn_closable == 'yes' ): ?>
					<span class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" aria-hidden="true"></i></span>
				<?php endif; ?>

	    		<span class="bbn_information ">
	    			<div class="alert-padding">
	    			<?php if( $settings->bbn_icon_align == 'before' ): ?>
						<i class="<?php echo $settings->bbn_icon_field; ?>"></i>
					<?php endif; ?>

	    			<?php echo $settings->bbn_textarea_field; ?>

	    			<?php if( $settings->bbn_icon_align == 'after' ): ?>
	    				<i class="<?php echo $settings->bbn_icon_field; ?>"></i>
					<?php endif; ?>
					</div>
	    		</span>
	    	</div>
	<?php if($settings->bbn_dropdown_link=='yes'): ?>
		</a>
	<?php endif; ?>
</div> 
<!-- Bootstrap alert end -->