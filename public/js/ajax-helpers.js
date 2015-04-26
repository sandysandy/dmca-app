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