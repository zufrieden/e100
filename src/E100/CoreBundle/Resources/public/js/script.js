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
	var data = { "startdate": "23.10.2012",
      "enddate": "30.11.2012",
      "history": [
          {
              "date": "23.10.2012",
              "number": 1
          },
          {
              "date": "28.10.2012",
              "number": 2
          },
          {
              "date": "05.11.2012",
              "number": 4
          }]
    };

var width = 700;
var height = 350;
var margin = 20;

vis = d3.select("#diagram")
            .append("svg:svg")
            .attr("width", width)
            .attr("height", height);

var format = d3.time.format("%d.%m.%Y");

var startDate = format.parse(data.startdate);
var endDate = format.parse(data.enddate);

var y = d3.scale.linear().domain([0, 100]).range([0, 350]);
var x = d3.time.scale().domain([startDate, endDate]).range([0+margin, 700-margin]);

// var path = vis.selectAll('path.line')
//      .data(data.history)
//      .enter()
//      .append('svg:path');

// path.attr("d", d3.svg.line()
//     .x(function(d) { return x(format.parse(d.date)) })
//     .y(function(d) { return y(d.number) })
// );
});