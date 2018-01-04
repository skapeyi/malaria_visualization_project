<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Malaria Visualization Project (MVP)</title>
<link rel="shortcut icon" href="media/khtik.png">
<script type="text/javascript" src="js/import.js"></script>
<link href="css/import.css" rel="stylesheet" type="text/css" />
</head>
<body onload="doOnLoad();">
<?php include("include/loadui.php");?>
<div id="obj">
<div id="container">
  <div class="container-inner-data">
    <p><span class="container-inner-data-title">Malaria Visualization Project</span></p>
<script type="text/javascript">
    $(function () {

    var data = Highcharts.geojson(Highcharts.maps['countries/ug/ug-all']);

    // Set drilldown pointers
    $.each(data, function (i) {
        this.drilldown = this.properties['hc-key'];
        this.value = i; // Non-random bogus data
    });

    // Some responsiveness
    var small = $('#analysis').width() < 400;

    // Instanciate the map
    $('#analysis').highcharts('Map', {
        chart : {
            events: {
                drilldown: function (e) {
                    
                    if (!e.seriesOptions) {
                        var chart = this,
                            mapKey = 'countries/ug/' + e.point.drilldown + '-all';

                        // Show the spinner
                        chart.showLoading('<i class="icon-spinner icon-spin icon-3x"></i>'); // Font Awesome spinner

                        // Handle error, the timeout is cleared on success
                        var fail = setTimeout(function () {
                            if (!Highcharts.maps[mapKey]) {
                                chart.showLoading('<i class="icon-frown"></i> Failed loading ' + e.point.name);

                                fail = setTimeout(function () {
                                    chart.hideLoading();
                                }, 1000);
                            }
                        }, 3000);
                        
                        // Load the drilldown map
                        $.getScript('http://code.highcharts.com/mapdata/' + mapKey + '.js', function () {

                            var data = Highcharts.geojson(Highcharts.maps[mapKey]);
                        
                            // Set a non-random bogus value
                            $.each(data, function (i) {
                                this.value = i;
                            });

                            // Hide loading and add series
                            chart.hideLoading();
                            clearTimeout(fail);
                            chart.addSeriesAsDrilldown(e.point, {
                                name: e.point.name,
                                data: data,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.name}'
                                }
                            });
                        })
                    }

                    
                    this.setTitle(null, { text: e.point.name });
                },
                drillup: function (e) {
                    this.setTitle(null, { text: 'USA' });
                }
            }
        },

        title : {
            text : 'Malaria Cases by Population'
        },

        subtitle: {
            text: 'Uganda <=2014',
            floating: false,
            align: 'left',
            y: 50,
            style: {
                fontSize: '14px'
            }
        },

        legend: small ? {} : {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        colorAxis: {
            min: 0,
            minColor: '#FFFFFF',
            maxColor: '#FF0000'
        },
        
        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        plotOptions: {
            map: {
                states: {
                    hover: {
                        color: '#EEDD66'
                    }
                }
            }
        },
        
        series : [{
            data : data,
            name: 'Uganda',
            dataLabels: {
                enabled: true,
                format: '{point.properties.postal-code}'
            }
        }], 

        drilldown: {
            //series: drilldownSeries,
            activeDataLabelStyle: {
                color: 'white',
                textDecoration: 'none'
            },
            drillUpButton: {
                relativeTo: 'spacingBox',
                position: {
                    x: 0,
                    y: 60
                }
            }
        }
    });
});
		</script>
<strong></strong>
	</head>
	<body>
<script src="js/highmaps.js"></script>
<script src="js/modules/data.js"></script>
<script src="js/modules/drilldown.js"></script>
<script src="js/country/uganda.js"></script>
<div id="analysis" style="height: 400px; width: 1200px; margin: 0 auto"></div>

  </div>
</div>
</div>
</body>
</html>