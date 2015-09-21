<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["map"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Lat', 'Long', 'Name', 'Title'],
          [37.4232, -122.0853, 'Work','Number of drug addcatice'],
          [37.4289, -122.1697, 'University','Number of drug addcatice'],
          [37.6153, -122.3900, 'Airport','Number of drug addcatice'],
          [37.4422, -122.1731, 'Shopping','Number of drug addcatice']
        ]);

        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data, {showTip: true});
      }

    </script>
  </head>

  <body align="center">
    <div id="map_div" style="width: 500px; height: 500px"></div>
  </body>
</html>