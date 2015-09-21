<?php

/*
This is drug free community project done by falcon Team
the index.php page  view all statiisc about drug countoffence based on GLA (gov lcoal area)
 Created on 9-2015
*/
// to allow  worpress need to give template name
/**
 * Template Name: offencetrend
 *
 * @package health
 */

// view staisitc of drugabuse based on GLA 


get_header(); 

 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>
      Google Visualization API Sample
    </title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">
      function drawVisualization() {
        var jsonData = null;

        var json = $.ajax({
          url: "<?php bloginfo('url'); ?>/wp-content/themes/health/OffenceTrend/getData.php", // make this url point to the data file
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
      var chart= new google.visualization.ColumnChart(document.getElementById('visualization')).
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
       <div >
     <div id="visualization" style="width: 500px; height: 400px; margin: 0 auto;" ></div>
 

    </div>
    <div>
        <p style="text-align: justify; margin-right: 100px ; margin-left: 100px ;"> 
        This mp show the offuence count in Victorai based on govemnet lcoal area . This stasitc is colelcted from govemnel 
        from 2011 til 2015.
        This mp show the offuence count in Victorai based on govemnet lcoal area . This stasitc is colelcted from govemnel 
        from 2011 til 2015.
        This mp show the offuence count in Victorai based on govemnet lcoal area . This stasitc is colelcted from govemnel 
        from 2011 til 2015.
        This mp show the offuence count in Victorai based on govemnet lcoal area . This stasitc is colelcted from govemnel 
        from 2011 til 2015.
        This mp show the offuence count in Victorai based on govemnet lcoal area . This stasitc is colelcted from govemnel 
        from 2011 til 2015.
        This mp show the offuence count in Victorai based on govemnet lcoal area . This stasitc is colelcted from govemnel 
        from 2011 til 2015.
     </p>
      
      </div>

  <div align="center" >
        
        
        
  
     </div>
      

   </body>

</html>
 <? get_footer();  ?>

 