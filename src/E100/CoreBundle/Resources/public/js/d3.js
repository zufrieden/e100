var received_data = { 'startdate': '23.10.2012',
					  'enddate': '30.11.2012',
					  'history': [
						  {
						  	'date': '23.10.2012',
						  	'number': 1
						  },
						  {
						  	'date': '28.10.2012',
						  	'number': 2
						  },
						  {
						  	'date': '05.11.2012',
						  	'number': 4
						  }]
					};

var width = 700;
var height = 350;
var margin = 20;


var visualisation = d3.select('body')
					  .append('svg')
					  .attr('width', 700)
					  .attr('height', 350);

var _startDate = received_data.startdate.split('.');
var startDate = new Date(_startDate[2], _startDate[1], _startDate[0]);
var _endDate = received_data.enddate.split('.');
var endDate = new Date(_endDate[2], _endDate[1], _endDate[0]);

var x = d3.scale.linear().domain([0, 100]).range([0, 350]);
var y = d3.time.scale.domain([startDate, endDate]).range([0+margin, 700-margin]);

visualisation.selectAll('path.line')
			 .data(received_data.history)
			 .enter()
			 .append('svg:path')
			 .attr('d', d3.svg.line()
			 	.x(function(d, i) { console.log(i); return x(i) })
			 	.y(y));

