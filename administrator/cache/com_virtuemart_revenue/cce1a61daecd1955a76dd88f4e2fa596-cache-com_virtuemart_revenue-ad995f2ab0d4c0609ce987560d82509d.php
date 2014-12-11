<?php die("Access Denied"); ?>#x#a:2:{s:6:"output";s:0:"";s:6:"result";a:2:{s:6:"report";a:0:{}s:2:"js";s:1422:"
  google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Orders', 'Total Items sold', 'Revenue net'], ['2014-10-28', 0,0,0], ['2014-10-29', 0,0,0], ['2014-10-30', 0,0,0], ['2014-10-31', 0,0,0], ['2014-11-01', 0,0,0], ['2014-11-02', 0,0,0], ['2014-11-03', 0,0,0], ['2014-11-04', 0,0,0], ['2014-11-05', 0,0,0], ['2014-11-06', 0,0,0], ['2014-11-07', 0,0,0], ['2014-11-08', 0,0,0], ['2014-11-09', 0,0,0], ['2014-11-10', 0,0,0], ['2014-11-11', 0,0,0], ['2014-11-12', 0,0,0], ['2014-11-13', 0,0,0], ['2014-11-14', 0,0,0], ['2014-11-15', 0,0,0], ['2014-11-16', 0,0,0], ['2014-11-17', 0,0,0], ['2014-11-18', 0,0,0], ['2014-11-19', 0,0,0], ['2014-11-20', 0,0,0], ['2014-11-21', 0,0,0], ['2014-11-22', 0,0,0], ['2014-11-23', 0,0,0], ['2014-11-24', 0,0,0], ['2014-11-25', 0,0,0]  ]);
        var options = {
          title: 'Report for the period from Tuesday, 28 October 2014 to Wednesday, 26 November 2014',
            series: {0: {targetAxisIndex:0},
                   1:{targetAxisIndex:0},
                   2:{targetAxisIndex:1},
                  },
                  colors: ["#00A1DF", "#A4CA37","#E66A0A"],
        };

        var chart = new google.visualization.LineChart(document.getElementById('vm_stats_chart'));

        chart.draw(data, options);
      }
";}}