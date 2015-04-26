/*
 * jQuery Tiny Pub/Sub
 * https://github.com/cowboy/jquery-tiny-pubsub
 *
 * Copyright (c) 2013 "Cowboy" Ben Alman
 * Licensed under the MIT license.
 */

(function($) {

  var o = $({});

  $.subscribe = function() {
    o.on.apply(o, arguments);
  };

  $.unsubscribe = function() {
    o.off.apply(o, arguments);
  };

  $.publish = function() {
    o.trigger.apply(o, arguments);
  };

}(jQuery));
(function() {

	var submitAjaxRequest = function(e) {
		var form = $(this);
		var method = form.find('input[name="_method"]').val() || 'POST';

		e.preventDefault();

		$.ajax({
			type: method,
			url: form.prop('action'),
			data: form.serialize(),
			success: function() {
				$.publish('form.submitted', form);
			}
		});

	};

	// Forms marked with the "data-remote" attribute will submit, via AJAX.
	$('form[data-remote]').on('submit', submitAjaxRequest);

	// The "data-click-submit-form" attribute immediately submits the form on change.
	$('*[data-click-submit-form]').on('change', function() {
		$(this).closest('form').submit();
	});
})();
(function() {

	$.subscribe('form.submitted', function()
	{
		$('.flash').fadeIn(500).delay(1000).fadeOut(500);
	});

})();