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
<style type="text/css">
#parent {
    overflow: hidden;
        margin-left: 10px;

     
}
.right {
    float: left;
     
     
}
.left {
    overflow: hidden;  
}

#parent1 {
    overflow: hidden;
        margin-left: 10px;

     
}
</style>


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
                        width: 400, height: 300,
                        title: "Drug Related Crime trend  Victroa (2011-2015) ",
                        vAxis: {maxValue: 10},
                       legend: { position: 'bottom' }}
                );
      }


      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>
  <body style="font-family: Arial;border: 0 none;">
    <br>
    <h2 align="center"> Drug offences in Victoria local government area  </h2>



<div id="parent">
    <div class="right">
 
        <br>

      <strong>  Choose government area from list: </strong>
        <br>

<form>
<select name="gla" size="10" onchange="drawVisualization(this.value)">
<option value="BANYULE">  BANYULE </option>
<option value="BRIMBANK">  BRIMBANK  </option>
<option value="DAREBIN">  DAREBIN </option>
<option value="HOBSONS BAY">  HOBSONS BAY </option>
<option value="HUME">  HUME  </option>
<option value="MARIBYRNONG">  MARIBYRNONG </option>
<option value="MELBOURNE">  MELBOURNE </option>
<option value="MELTON">  MELTON  </option>
<option value="MOONEE VALLEY">  MOONEE VALLEY </option>
<option value="MORELAND">  MORELAND  </option>
<option value="NILLUMBIK">  NILLUMBIK </option>
<option value="WHITTLESEA">  WHITTLESEA  </option>
<option value="WYNDHAM">  WYNDHAM </option>
<option value="YARRA">  YARRA </option>
<option value="BASS COAST">  BASS COAST  </option>
<option value="SOUTH GIPPSLAND">  SOUTH GIPPSLAND </option>
<option value="BAW BAW">  BAW BAW </option>
<option value="BENALLA">  BENALLA </option>
<option value="MANSFIELD">  MANSFIELD </option>
<option value="BOROONDARA">  BOROONDARA  </option>
<option value="EAST GIPPSLAND">  EAST GIPPSLAND  </option>
<option value="GREATER SHEPPARTON">  GREATER SHEPPARTON  </option>
<option value="KNOX">  KNOX  </option>
<option value="LATROBE">  LATROBE </option>
<option value="MANNINGHAM">  MANNINGHAM  </option>
<option value="MAROONDAH">  MAROONDAH </option>
<option value="MITCHELL">  MITCHELL  </option>
<option value="STRATHBOGIE">  STRATHBOGIE </option>
<option value="MONASH">  MONASH  </option>
<option value="MURRINDINDI">  MURRINDINDI </option>
<option value="ALPINE">  ALPINE  </option>
<option value="MOIRA">  MOIRA </option>
<option value="WANGARATTA">  WANGARATTA  </option>
<option value="WELLINGTON">  WELLINGTON  </option>
<option value="WHITEHORSE">  WHITEHORSE  </option>
<option value="INDIGO">  INDIGO  </option>
<option value="TOWONG">  TOWONG  </option>
<option value="WODONGA">  WODONGA </option>
<option value="YARRA RANGES">  YARRA RANGES  </option>
<option value="CARDINIA">  CARDINIA  </option>
<option value="CASEY">  CASEY </option>
<option value="FRANKSTON">  FRANKSTON </option>
<option value="BAYSIDE">  BAYSIDE </option>
<option value="GLEN EIRA">  GLEN EIRA </option>
<option value="GREATER DANDENONG">  GREATER DANDENONG </option>
<option value="KINGSTON">  KINGSTON  </option>
<option value="MORNINGTON PENINSULA">  MORNINGTON PENINSULA  </option>
<option value="PORT PHILLIP">  PORT PHILLIP  </option>
<option value="STONNINGTON">  STONNINGTON </option>
<option value="BALLARAT">  BALLARAT  </option>
<option value="PYRENEES">  PYRENEES  </option>
<option value="GREATER BENDIGO">  GREATER BENDIGO </option>
<option value="CAMPASPE">  CAMPASPE  </option>
<option value="CENTRAL GOLDFIELDS">  CENTRAL GOLDFIELDS  </option>
<option value="LODDON">  LODDON  </option>
<option value="GREATER GEELONG">  GREATER GEELONG </option>
<option value="QUEENSCLIFFE">  QUEENSCLIFFE  </option>
<option value="HINDMARSH">  HINDMARSH </option>
<option value="HORSHAM">  HORSHAM </option>
<option value="WEST WIMMERA">  WEST WIMMERA  </option>
<option value="MACEDON RANGES">  MACEDON RANGES  </option>
<option value="MOUNT ALEXANDER">  MOUNT ALEXANDER </option>
<option value="MILDURA">  MILDURA </option>
<option value="GOLDEN PLAINS">  GOLDEN PLAINS </option>
<option value="HEPBURN">  HEPBURN </option>
<option value="MOORABOOL">  MOORABOOL </option>
<option value="ARARAT">  ARARAT  </option>
<option value="NORTHERN GRAMPIANS">  NORTHERN GRAMPIANS  </option>
<option value="YARRIAMBIACK">  YARRIAMBIACK  </option>
<option value="GLENELG">  GLENELG </option>
<option value="SOUTHERN GRAMPIANS">  SOUTHERN GRAMPIANS  </option>
<option value="COLAC-OTWAY">  COLAC-OTWAY </option>
<option value="SURF COAST">  SURF COAST  </option>
<option value="BULOKE">  BULOKE  </option>
<option value="GANNAWARRA">  GANNAWARRA  </option>
<option value="SWAN HILL">  SWAN HILL </option>
<option value="CORANGAMITE">  CORANGAMITE </option>
<option value="MOYNE">  MOYNE </option>
<option value="WARRNAMBOOL">  WARRNAMBOOL </option>
</select>
</form>
</div>
 <div class="right" id="info">.. 
 </div>
 </div>   

<div style="margin-left: auto;
    margin-right: auto;
    width: 40em">
Latest statistics shows an increase of offence related to drug abuse in Victoria. There are some area which shows dramatical increase
while other shows marginal increase of offence. This statistics displays the drug offence in Victoria from last five years(2011-2015).
These data has been obtained from crims statistics data source. 

</div>
<br>
<div>
  <div align="center">
    
        <a href="<?php bloginfo('url'); ?>/index.php/suburbprofile/" style="border: 2px solid #a1a1a1;  padding: 10px 40px;  background: #dddddd; width: 50px; border-radius: 25px;">
       Offence  Map </a> 

       <a href="<?php bloginfo('url'); ?>/index.php/offence/" style="border: 2px solid #a1a1a1;  padding: 10px 40px;  background: #dddddd; width: 50px; border-radius: 25px;">
         Offence    Graph     </a>
     </div>
   </div>
</body>

</html>
 <? get_footer();  ?>

 