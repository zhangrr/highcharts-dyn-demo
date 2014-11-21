<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>M6自定义监控图</title>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
		var options = {
	            chart: {
	                renderTo: 'container',
	                type: 'spline',
			animation: Highcharts.svg,
	                marginRight: 130,
	                marginBottom: 25,
                      events: {
                       load: function () {

                        // set up the updating of the chart each second
                        var series0 = this.series[0];
                        var series1 = this.series[1];
                        var series2 = this.series[2];
                        setInterval(function () {
                            $.getJSON("data.php?limit=1", function(json) {
                                  options.xAxis.categories.push(json[0]['data']);
                                  series0.addPoint(json[1]['data'], true, true);
                                  series1.addPoint(json[2]['data'], true, true);
                                  series2.addPoint(json[3]['data'], true, true);
                                });
                            }, 60000);
                        }
                      }
	            },
	            title: {
	                text: 'Hadoop 监控数据',
	                x: -20 //center
	            },
	            subtitle: {
	                text: 'Hive机器CPU负载',
	                x: -20
	            },
	            xAxis: {
                        type: 'datetime'
	            },
	            yAxis: {
				    tickInterval: 5,
				    max: 100,
					min: 0,
	                title: {
	                    text: 'CPU平均负载'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name +'</b><br/>'+
	                        this.x +': '+ this.y;
	                }
	            },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -10,
                        y: 100,
                        borderWidth: 0
                    },

                    series: []

                }

	        $.getJSON("data.php?limit=200", function(json) {
				options.xAxis.categories = json[0]['data'];
	        		options.series[0] = json[1];
				options.series[1] = json[2];
				options.series[2] = json[3];
				
		        chart = new Highcharts.Chart(options);
	        });
	    });
		</script>
	</head>
	<body>
	        <script src="js/highcharts.js"></script>
                <script src="js/exporting.js"></script>
		<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
	</body>
</html>
