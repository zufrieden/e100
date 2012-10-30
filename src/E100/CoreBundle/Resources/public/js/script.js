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

$(document).ready(function() {

	if ($('body').hasClass('goalstatus')) {
		var visualise = function(data) {
			var width = 700;
			var height = 350;
			var margin = 20;

			var vis = d3.select('#diagram')
									.append("svg:svg")
									.attr("width", width)
									.attr("height", height);

			var format = d3.time.format("%d.%m.%Y");

			var startDate = format.parse(data.startdate);
			var endDate = format.parse(data.enddate);

			console.log(startDate);

			var y = d3.scale.linear().domain([0, 100]).range([0, 350]);
			var x = d3.time.scale().domain([startDate, endDate]).range([0+margin, 700-margin]);

			console.log(data.history);

			var path = vis.selectAll('path.line')
     		.data(data.history)
     		.enter()
     		.append('svg:path')
     		.attr("d", d3.svg.line()
						.x( function(d) { return x(format.parse(d.date)); })
						.y( function(d) { return y(d.value); }));
		}

		var url = $('#diagram').attr('data-url');
		$.ajax({
			url: url,
			statusCode: {
				200: function(data) {
					visualise(data)
				},
			}
		});
	}
});







