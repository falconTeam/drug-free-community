<?php
/*
 *This is drug free community project done by falcon Team
 *the index.php page  view all statiisc about drug countoffence based on GLA (gov lcoal area)
 *Created on 9-2015
 *to allow  worpress need to give template name
 *
 * Template Name: offenceGraph
 *
 * @package health
 */
// view staisitc of drugabuse based on GLA and show as graph
get_header(); 
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>
Graph of offence realted to drug abuse    </title>
 


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">
    //  refer to https://developers.google.com/chart/interactive/docs/drawing_charts 
      function drawVisualization(str) {
        var jsonData = null;
        var json = $.ajax({
          url: "<?php bloginfo('url'); ?>/wp-content/themes/health/offenceGraph/getData.php?gla="+str, // make this url point to the data file
          dataType: "json",
          async: false,
          success: (
        function(data) {
            jsonData = data;
        })
        }).responseText;
        // Create and populate the data table.
        var data = new google.visualization.DataTable(jsonData);
        // Create and draw the visualization.
      var chart= new google.visualization.ColumnChart(document.getElementById('info')).
            draw(data, {curveType: "function",
                        width: 350, height: 300,
                    
                        title: "Offence Graph ",
                        vAxis: {maxValue: 10,gridlines: {
        color: 'transparent'
    }},
    hAxis:{format: '',
      gridlines:{
        color: 'transparent'
      }

    },

                       legend: { position: 'bottom' }}
                );
      }
      google.setOnLoadCallback(drawVisualization);
function drawVisualization1(str) {
        var jsonData = null;
        var json = $.ajax({
          url: "<?php bloginfo('url'); ?>/wp-content/themes/health/offenceGraph/getData1.php?gla="+str, // make this url point to the data file
          dataType: "json",
          async: false,
          success: (
        function(data) {
            jsonData = data;
        })
        }).responseText;
        // Create and populate the data table.
        var data = new google.visualization.DataTable(jsonData);
        // Create and draw the visualization.
      var chart= new google.visualization.ColumnChart(document.getElementById('info1')).
            draw(data, {curveType: "function",
                        width: 350, height: 300,
                        title: "Offence Graph  ",
                        vAxis: {maxValue: 10,gridlines: {
        color: 'transparent'
    }},
    hAxis:{format: '',
      gridlines:{
        color: 'transparent'
      }
    },
                       legend: { position: 'bottom' }}
                );
      }
      google.setOnLoadCallback(drawVisualization1);
  $(function () {
    var chart;
    $(document).ready(function() {
        $.getJSON("<?php bloginfo('url'); ?>/wp-content/themes/health/offenceGraph/data2.php", function(json) {
      
        chart = new Highcharts.Chart({
              chart: {
                  renderTo: 'container',
                  type: 'line',
                  marginRight: 130,
                  marginBottom: 45
              },
              title: {
                  text: 'Drug Related Crime Trend ',
                  x: -20 //center
              },
              subtitle: {
                  text: '',
                  x: -20
              },
              xAxis: {
                  categories: ['2011', '2012', '2013','2014','2015']
              },
              yAxis: {
                  title: {
                      text: 'Offence Count'
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
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom',
                  x: -45,
                  y: 20,
                  borderWidth: 0
              },
              series: json
          });
      });
    
    });
    
});
    </script>

  </head>
  <body >
    <div>
      <br>
    <h1 align="Center" > Drug offences Graphs  </h1>
</div>
 
<div style=" margin-left:5%; margin-right:5%;">

<table>


<tr >
  <td colspan="3" >
    <br>



  </td>
  </tr>

<tr>
<td colspan="3" >
<script src="<?php bloginfo('url'); ?>/wp-content/themes/health/offenceGraph/js/highcharts.js"></script>
<script src="<?php bloginfo('url'); ?>/wp-content/themes/health/offenceGraph/js/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

</td>
</tr>

<tr >
  <td colspan="3" >
    <br>

<strong><h3>Compare two different Government Area in Victoria</h3></strong>

  </td>
  </tr>
 <tr >
<td>
 <form>
<select name="gla" size="6" onchange="drawVisualization(this.value);" >
<option value="ALPINE">  ALPINE  </option>
<option value="ARARAT">  ARARAT  </option>
<option value="BALLARAT">  BALLARAT  </option>
<option value="BANYULE">  BANYULE </option>
<option value="BASS COAST">  BASS COAST  </option>
<option value="BAW BAW">  BAW BAW </option>
<option value="BAYSIDE">  BAYSIDE </option>
<option value="BENALLA">  BENALLA </option>
<option value="BOROONDARA">  BOROONDARA  </option>
<option value="BRIMBANK">  BRIMBANK  </option>
<option value="BULOKE">  BULOKE  </option>
<option value="CAMPASPE">  CAMPASPE  </option>
<option value="CARDINIA">  CARDINIA  </option>
<option value="CASEY">  CASEY </option>
<option value="CENTRAL GOLDFIELDS">  CENTRAL GOLDFIELDS  </option>
<option value="COLAC-OTWAY">  COLAC-OTWAY </option>
<option value="CORANGAMITE">  CORANGAMITE </option>
<option value="DAREBIN">  DAREBIN </option>
<option value="EAST GIPPSLAND">  EAST GIPPSLAND  </option>
<option value="FRANKSTON ">  FRANKSTON </option>
<option value="GANNAWARRA">  GANNAWARRA  </option>
<option value="GLEN EIRA">  GLEN EIRA </option>
<option value="GLENELG">  GLENELG </option>
<option value="GOLDEN PLAINS">  GOLDEN PLAINS </option>
<option value="GREATER BENDIGO">  GREATER BENDIGO </option>
<option value="GREATER DANDENONG">  GREATER DANDENONG </option>
<option value="GREATER GEELONG">  GREATER GEELONG </option>
<option value="GREATER SHEPPARTON">  GREATER SHEPPARTON  </option>
<option value="HEPBURN">  HEPBURN </option>
<option value="HINDMARSH">  HINDMARSH </option>
<option value="HOBSONS BAY">  HOBSONS BAY </option>
<option value="HORSHAM">  HORSHAM </option>
<option value="HUME">  HUME  </option>
<option value="INDIGO">  INDIGO  </option>
<option value="KINGSTON">  KINGSTON  </option>
<option value="KNOX">  KNOX  </option>
<option value="LATROBE">  LATROBE </option>
<option value="LODDON">  LODDON  </option>
<option value="MACEDON RANGES">  MACEDON RANGES  </option>
<option value="MANNINGHAM">  MANNINGHAM  </option>
<option value="MANSFIELD">  MANSFIELD </option>
<option value="MARIBYRNONG">  MARIBYRNONG </option>
<option value="MAROONDAH">  MAROONDAH </option>
<option value="MELBOURNE">  MELBOURNE </option>
<option value="MELTON">  MELTON  </option>
<option value="MILDURA">  MILDURA </option>
<option value="MITCHELL">  MITCHELL  </option>
<option value="MOIRA">  MOIRA </option>
<option value="MONASH">  MONASH  </option>
<option value="MOONEE VALLEY">  MOONEE VALLEY </option>
<option value="MOORABOOL">  MOORABOOL </option>
<option value="MORELAND">  MORELAND  </option>
<option value="MORNINGTON PENINSULA">MORNINGTON PENINSULA  </option>
<option value="MOUNT ALEXANDER">  MOUNT ALEXANDER </option>
<option value="MOYNE">  MOYNE </option>
<option value="MURRINDINDI">  MURRINDINDI </option>
<option value="NILLUMBIK">  NILLUMBIK </option>
<option value="NORTHERN GRAMPIANS">  NORTHERN GRAMPIANS  </option>
<option value="PORT PHILLIP">  PORT PHILLIP  </option>
<option value="PYRENEES">  PYRENEES  </option>
<option value="QUEENSCLIFFE">  QUEENSCLIFFE  </option>
<option value="SOUTH GIPPSLAND">  SOUTH GIPPSLAND </option>
<option value="SOUTHERN GRAMPIANS">  SOUTHERN GRAMPIANS  </option>
<option value="STONNINGTON">  STONNINGTON </option>
<option value="STRATHBOGIE">  STRATHBOGIE </option>
<option value="SURF COAST">  SURF COAST  </option>
<option value="SWAN HILL">  SWAN HILL </option>
<option value="TOWONG">  TOWONG  </option>
<option value="WANGARATTA">  WANGARATTA  </option>
<option value="WARRNAMBOOL">  WARRNAMBOOL </option>
<option value="WELLINGTON">  WELLINGTON  </option>
<option value="WEST WIMMERA">  WEST WIMMERA  </option>
<option value="WHITEHORSE">  WHITEHORSE  </option>
<option value="WHITTLESEA">  WHITTLESEA  </option>
<option value="WODONGA">  WODONGA </option>
<option value="WYNDHAM">  WYNDHAM </option>
<option value="YARRA">  YARRA </option>
<option value="YARRA RANGES">  YARRA RANGES  </option>
<option value="YARRIAMBIACK">  YARRIAMBIACK  </option>
</select>
</form>
 
 <h2 align=center> Vs </h2>
<form>
<select name="gla" size="6" onchange="drawVisualization1(this.value);" >
<option value="ALPINE">  ALPINE  </option>
<option value="ARARAT">  ARARAT  </option>
<option value="BALLARAT">  BALLARAT  </option>
<option value="BANYULE">  BANYULE </option>
<option value="BASS COAST">  BASS COAST  </option>
<option value="BAW BAW">  BAW BAW </option>
<option value="BAYSIDE">  BAYSIDE </option>
<option value="BENALLA">  BENALLA </option>
<option value="BOROONDARA">  BOROONDARA  </option>
<option value="BRIMBANK">  BRIMBANK  </option>
<option value="BULOKE">  BULOKE  </option>
<option value="CAMPASPE">  CAMPASPE  </option>
<option value="CARDINIA">  CARDINIA  </option>
<option value="CASEY">  CASEY </option>
<option value="CENTRAL GOLDFIELDS">  CENTRAL GOLDFIELDS  </option>
<option value="COLAC-OTWAY">  COLAC-OTWAY </option>
<option value="CORANGAMITE">  CORANGAMITE </option>
<option value="DAREBIN">  DAREBIN </option>
<option value="EAST GIPPSLAND">  EAST GIPPSLAND  </option>
<option value="FRANKSTON ">  FRANKSTON </option>
<option value="GANNAWARRA">  GANNAWARRA  </option>
<option value="GLEN EIRA">  GLEN EIRA </option>
<option value="GLENELG">  GLENELG </option>
<option value="GOLDEN PLAINS">  GOLDEN PLAINS </option>
<option value="GREATER BENDIGO">  GREATER BENDIGO </option>
<option value="GREATER DANDENONG">  GREATER DANDENONG </option>
<option value="GREATER GEELONG">  GREATER GEELONG </option>
<option value="GREATER SHEPPARTON">  GREATER SHEPPARTON  </option>
<option value="HEPBURN">  HEPBURN </option>
<option value="HINDMARSH">  HINDMARSH </option>
<option value="HOBSONS BAY">  HOBSONS BAY </option>
<option value="HORSHAM">  HORSHAM </option>
<option value="HUME">  HUME  </option>
<option value="INDIGO">  INDIGO  </option>
<option value="KINGSTON">  KINGSTON  </option>
<option value="KNOX">  KNOX  </option>
<option value="LATROBE">  LATROBE </option>
<option value="LODDON">  LODDON  </option>
<option value="MACEDON RANGES">  MACEDON RANGES  </option>
<option value="MANNINGHAM">  MANNINGHAM  </option>
<option value="MANSFIELD">  MANSFIELD </option>
<option value="MARIBYRNONG">  MARIBYRNONG </option>
<option value="MAROONDAH">  MAROONDAH </option>
<option value="MELBOURNE">  MELBOURNE </option>
<option value="MELTON">  MELTON  </option>
<option value="MILDURA">  MILDURA </option>
<option value="MITCHELL">  MITCHELL  </option>
<option value="MOIRA">  MOIRA </option>
<option value="MONASH">  MONASH  </option>
<option value="MOONEE VALLEY">  MOONEE VALLEY </option>
<option value="MOORABOOL">  MOORABOOL </option>
<option value="MORELAND">  MORELAND  </option>
<option value="MORNINGTON PENINSULA">MORNINGTON PENINSULA  </option>
<option value="MOUNT ALEXANDER">  MOUNT ALEXANDER </option>
<option value="MOYNE">  MOYNE </option>
<option value="MURRINDINDI">  MURRINDINDI </option>
<option value="NILLUMBIK">  NILLUMBIK </option>
<option value="NORTHERN GRAMPIANS">  NORTHERN GRAMPIANS  </option>
<option value="PORT PHILLIP">  PORT PHILLIP  </option>
<option value="PYRENEES">  PYRENEES  </option>
<option value="QUEENSCLIFFE">  QUEENSCLIFFE  </option>
<option value="SOUTH GIPPSLAND">  SOUTH GIPPSLAND </option>
<option value="SOUTHERN GRAMPIANS">  SOUTHERN GRAMPIANS  </option>
<option value="STONNINGTON">  STONNINGTON </option>
<option value="STRATHBOGIE">  STRATHBOGIE </option>
<option value="SURF COAST">  SURF COAST  </option>
<option value="SWAN HILL">  SWAN HILL </option>
<option value="TOWONG">  TOWONG  </option>
<option value="WANGARATTA">  WANGARATTA  </option>
<option value="WARRNAMBOOL">  WARRNAMBOOL </option>
<option value="WELLINGTON">  WELLINGTON  </option>
<option value="WEST WIMMERA">  WEST WIMMERA  </option>
<option value="WHITEHORSE">  WHITEHORSE  </option>
<option value="WHITTLESEA">  WHITTLESEA  </option>
<option value="WODONGA">  WODONGA </option>
<option value="WYNDHAM">  WYNDHAM </option>
<option value="YARRA">  YARRA </option>
<option value="YARRA RANGES">  YARRA RANGES  </option>
<option value="YARRIAMBIACK">  YARRIAMBIACK  </option>
</select>
</form>
</td>

<td><div  id="info" class="Column"></div></td>
<td><div  id="info1" class="Column"></div></td>
</div>
</tr>
</table>
 </div>
</body>

</html>
 <? get_footer();  ?>