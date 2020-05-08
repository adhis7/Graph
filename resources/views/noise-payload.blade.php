<html>
<head>
    <title>Noise Level Line Chart</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var graph = <?php echo $graph; ?>;
        console.log(graph);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable(graph);
            var options = {
                title: 'Payload Line Chart',
                curveType: 'function',
                legend: { position: 'bottom' }
            };
            //find the max value from array javascript
            var maxValue = Math.max.apply(null, graph);
            document.getElementById(maxValue); // output:73
            //find the min value from array javascript
            var minValue = Math.min.apply(null, graph);
            document.getElementById(minValue); // output:-5

            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }
    </script>


</head>
<body>
<div id="linechart" style="width: 900px; height: 500px;margin: auto"></div>

<table border="1" cellpadding="0" cellspacing="0">
    <tr>
        <th colspan="2">Payload Overview</th>
    </tr>
    <tr>
        <th>Total Counts</th>
        <td id="total">{{\App\Noise::count()}} </td>
    </tr>
    <tr>
        <th>Highest Value</th>
        <td id="maxValue">{{$max ?? ''}}</td>
    </tr>
    <tr>
        <th>Lowest Value</th>
        <td id="minValue">{{$min ?? ''}}</td>
    </tr>
    <tr>
        <th>Average Value</th>
        <td id="avgValue">{{$avg ?? ''}}</td>
    </tr>
</table>

</body>
<script>
    setTimeout(function() { window.location=window.location;},10000);
</script>
</html>
