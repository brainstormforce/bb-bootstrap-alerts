
(function($){
	BBAlert = function (settings) {

		this.settings = settings;
		this.node     = settings.id;
		this.duration = settings.duration;
		this.is_builder_active = settings.is_builder_active;
		
		var cookie_name = 'bbba-'+this.node;
		

		if ( Cookies.get(cookie_name)== '1' && 'yes'!=this.is_builder_active )
		{
			var element = '.fl-module-bb-bootstrap-alerts-module.fl-node-'+this.node+' .fl-module-content';
			jQuery(element).hide();
		}
		var alert= this;
		var selector='.fl-node-'+this.node+' .close';
		jQuery(selector).click(function(){
			alert._setCookie();
		});
	};

	BBAlert.prototype =  {
		settings : {},
		node	 : '',
		duration : '',

		_setCookie: function() {
			$this = this;
			var $cookie_duration = Math.round($this.duration);
			var $cookie_name = 'bbba-'+$this.node;
			Cookies.set($cookie_name,'1',{ expires: $cookie_duration });
		}
	};

})(jQuery);