
(function($){
	BBAlert = function (settings) {

		this.settings = settings;
		this.node     = settings.id;
		this.duration = settings.duration;
		
		var cookie_name = 'bbba-'+this.node;
		

		if ( Cookies.get(cookie_name)== '1')
		{
			var element = '.fl-node-'+this.node+' .bb-bootstrap-alerts';
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