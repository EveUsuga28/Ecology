<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://www.google.com/jsapi"></script>
    <style>
        .pie-chart {
            width: 600px;
            height: 400px;
            margin: 0 auto;
        }
        .text-center{
            text-align: center;
        }
    </style>
</head>
<body>
  
<h2 class="text-center">Generate PDF with Chart in Laravel</h2>
  
<div id="chartDiv" class="pie-chart"></div>
<div class="text-center">
    <a href="{{ route('download') }}">Download PDF File</a>
    <h2>ItSolutionStuff.com.com</h2>
</div>
  
<script type="text/javascript">
    window.onload = function() {
        google.load("visualization", "1.1", {
            packages: ["corechart"],
            callback: 'drawChart'
        });
    };
  
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Visitations', { role: 'style' } ],
        ['2010', 10, 'color: gray'],
        ['2020', 14, 'color: #76A7FA'],
        ['2030', 16, 'opacity: 0.2'],
        ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
        ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
      ]);
  
        var options = {
            title: 'Popularity of Types of Framework',
            sliceVisibilityThreshold: .2
        };
  
        var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
        chart.draw(data, options);
    }
</script>
  
</body>
</html>