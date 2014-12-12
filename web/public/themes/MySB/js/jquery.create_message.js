// http://ned.im/noty/#/about

function generate_message(type, timeout, text) {
	var n = noty({
		layout      : 'center',
		theme       : 'relax',
		text        : text,
		type        : type,
		dismissQueue: true, // If you want to use queue feature set this true
		template	: '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>',				
		animation: {
			open		: 'animated bounceInUp', // or Animate.css class names like: 'animated bounceInLeft'
			close		: 'animated bounceOutDown', // or Animate.css class names like: 'animated bounceOutLeft'
			easing		: 'swing',
			speed		: 500 // opening & closing animation speed
		},
		timeout		: timeout, // delay for closing event. Set false for sticky notifications
		force		: false, // adds notification to the beginning of queue when set to true				
		modal		: false,
		maxVisible	: 2, // you can set max visible notification for dismissQueue true option,
		killer		: true, // for close all notifications before show				
		closeWith	: ['hover'], // ['click', 'button', 'hover', 'backdrop'] // backdrop click will close all notifications
		callback: {
			onShow		: function() {},
			afterShow	: function() {},
			onClose		: function() {},
			afterClose	: function() {},
			onCloseClick: function() {},
		},
		buttons		: false // an array of buttons
	});
	console.log('html: ' + n.options.id);
}