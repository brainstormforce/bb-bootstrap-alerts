<!-- Bootstrap alert start -->
<?php $name = 'bbba-'.$module->node; ?>
 <?php $is_enable=true; ?>
<?php if( ! FLBuilderModel::is_builder_active() ) { ?>
	<?php if( isset( $_COOKIE[$name] ) && $_COOKIE[$name] != null ):
		$is_enable=false;
	endif ?>
<?php  } ?>
<?php if( $is_enable ): ?>
<div class="bb-bootstrap-alerts">

	<!-- Navigation Link -->
	<?php if($settings->bbn_dropdown_link=='yes'): ?>
		<a href="<?php echo esc_url($nav_link=$settings->bbn_navigation_link != '')? $nav_link=$settings->bbn_navigation_link : '#' ;?>" target="<?php echo esc_attr( $nav_target=$settings->bbn_navigation_target );?>" >
	<?php endif; ?>
			<!-- Alert class -->
			<div class="alert <?php echo esc_attr( $settings->bbn_dropdown_field ); ?> fade in" >
				<!-- Close Button -->
				<?php if( ( esc_attr( $settings->bbn_closable ) == 'yes' ) ): ?>
					<span class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" aria-hidden="true"></i></span>
				<?php endif; ?>

				<!-- Alert contents -->
	    		<span class="bbn_information ">
	    			<div class="alert-padding">

	    			<!-- Before text icon -->
	    			<?php if( ( esc_attr( $settings->bbn_icon_align ) == 'before' ) ): ?>
						<i class="<?php echo esc_attr( $settings->bbn_icon_field ); ?>"></i>
					<?php endif; ?>

					<!-- Alert Contents -->
	    			<?php echo $settings->bbn_textarea_field; ?>

	    			<!-- After text icon -->
	    			<?php if( ( esc_attr( $settings->bbn_icon_align ) == 'after' ) ): ?>
	    				<i class="<?php echo esc_attr( $settings->bbn_icon_field ); ?>"></i>
					<?php endif; ?>

					</div>
	    		</span>
	    	</div>
	<!-- Navigation Link Close-->  	
	<?php if($settings->bbn_dropdown_link=='yes'): ?>
		</a>
	<?php endif; ?>
	
</div> 
<!-- Bootstrap alert end -->
<?php endif ?>