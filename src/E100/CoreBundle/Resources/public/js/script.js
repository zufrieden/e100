$(document).ready(function() {
	$('.btn-markRead').click(function(e) {
		var url = $(this).attr('href');
		var self = $(this);
		$.ajax({
			url: url,
			statusCode: {
				500: function(data) {
					console.log("Didn't work out");
				},
				200: function(data) {
					$('.btn-markRead').show();
					self.hide();
				},
			},
		});

		e.preventDefault();
	});

	$('.btn-favorit').click(function(e) {
		var url = $(this).attr('href');
		var self = $(this);
		$.ajax({
			url: url,
			statusCode: {
				500: function(data) {
					console.log("Didn't work out");
				},
				200: function(data) {
					$('.btn-favorit').show();
					self.hide();
				},
			},
		});

		e.preventDefault();
	});
});