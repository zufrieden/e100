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
      var margin = 30;

      var vis = d3.select('#diagram')
                  .append("svg:svg")
                  .attr("viewBox", "0 0 700 350");

      var format = d3.time.format("%d.%m.%Y");

      var startDate = format.parse(data.startdate);
      var endDate = format.parse(data.enddate);

      var y = d3.scale.linear()
                .domain([0, 100])
                .range([0+margin, height-2*margin]);
      var x = d3.time.scale()
                .domain([startDate, endDate])
                .range([0+margin, width-margin]);

      
      var yAxis = d3.svg.axis()
                 .scale(y)
                 .orient("left")
                 .ticks(5)
                 .tickSize(1)
                 .tickFormat(function(d, i) { return 100-d; });

       var xAxis = d3.svg.axis()
                 .scale(x)
                 .ticks(8)
                 .orient("top")
                 .tickSize(1)
                 .tickFormat(function(d, i) { return d; });

      var path = vis.selectAll('path.line')
        .data(data.history)
        .enter()
        .append('svg:path')
        .attr("d", d3.svg.line()
            .x( function(d) { return x(format.parse(d.date)); })
            .y( function(d) { return height-margin - y(d.value); }));

      var futurePath = vis.selectAll('path.line')
        .data(data.future)
        .enter()
        .append('svg:path')
        .attr('class', 'future-path')
        .attr("d", d3.svg.line()
            .x( function(d) { return x(format.parse(d.date)); })
            .y( function(d) { return height-margin - y(d.value); }));

      var points = vis.selectAll('rect')
        .data(data.history[0])
        .enter()
        .append('rect')
          .attr("x", function(d) { console.log(d); return x(format.parse(d.date))-3; })
          .attr("y", function(d) { return height-margin - y(d.value)-3; })
          .attr("width", 6)
          .attr("height", 6)
          .attr("class", "history-point")
          .selectAll("text")
            .append('text')
            .text("Read 5 books");

      vis.append("g")
        .attr("class", "x-axis")
        .attr("transform", "translate(0, "+(height-2*margin)+")")
        .call(xAxis)
      .selectAll("text")
        .attr("transform", "rotate(40 -70,0)")
        .text(x.tickFormat(d3.time.format("%b")));
      
      vis.selectAll(".tick")
        .attr("x1", "0")
        .attr("y1", "5");
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







