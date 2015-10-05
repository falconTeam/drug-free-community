<?php

/*
This is drug free community project done by falcon Team
the index.php page  view all statiisc about drug countoffence based on GLA (gov lcoal area)
 Created on 9-2015
*/
// to allow  worpress need to give template name
/**
 * Template Name: offenceMapTemp
 *
 * @package health
 */

// view staisitc of drugabuse based on GLA


get_header(); 
//get_mHeader();
 
?>
<!DOCTYPE html>
 
<html lang="en">
    <head>
 
        <meta charset="utf-8" />
        <title>Google Maps Example</title>
        <style type="text/css">
            body { font: normal 14px Verdana; }
            h1 { font-size: 24px; }
            h2 { font-size: 18px; }
            #sidebar { float: right; width: 30%; }
            #main { padding-right: 15px; }
            .infoWindow { width: 220px; }
        </style>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
       
// jquery request 

function makeRequest(url, callback) {
    var request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
    }
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            callback(request);
        }
    }
    request.open("GET", url, true);
    request.send();
}
        //<![CDATA[
        
//  refer to https://developers.google.com/maps/articles/phpsqlajax_v3 for more info in how to use google api to put markers in map
var map;
 
// to centlized the map in middle of vic

 var center = new google.maps.LatLng(-36.5924573,144.5454357);
 
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
 
function init() {
 
    var mapOptions = {
      zoom: 7,
      center: center,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }

 
  // call the json fiel to get the data
     
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    
    makeRequest('<?php bloginfo('url'); ?>/wp-content/themes/health/offenceMap/getMapData.php', function(data) {
             
 
        var data = JSON.parse(data.responseText);
         
        for (var i = 0; i < data.length; i++) {
            displayLocation(data[i]);
        }
    });
}
//]]>

// disply info in the map

function displayLocation(location) {
         
    var content =   '<div class="infoWindow"><strong> '  + location.localGovernmentArea 
                    + '<br/> Offence Count :</strong> '    + location.offenceCount + 
                     '<br/> Rating :</strong> '    + location.id+ 

                    '</div>';
     
    if (parseInt(location.latitude) == 0) {
        geocoder.geocode( { 'offenceCount': location.offenceCount }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                 
                var marker = new google.maps.Marker({
                    map: map, 
                    position: results[0].geometry.location,
                    title: location.localGovernmentArea
                });
                 
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(content);
                    infowindow.open(map,marker);
                });
            }
        });
    } else {
        var position = new google.maps.LatLng(parseFloat(location.latitude), parseFloat(location.longitude));
        var marker = new google.maps.Marker({
            map: map, 
            position: position,
            title: location.localGovernmentArea
        });
         
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(content);
            infowindow.open(map,marker);
        });
    }
}

        </script>
    </head>
    <body onload="init();">
        <div> 
            <br>
        <h1 style="font-size: 20px;
    font-weight: normal;
    line-height: 40px;
    margin: 2px 0 8px;
    text-align: center;
    color: black;"> Drug abuse statistics  in victoria 2011-2015  </h1>
        <br>
                 <br>

        <section id="sidebar">
            <div id="directions_panel"></div>
        </section>
         
        <section id="main">
            <div id="map_canvas" style="width: 70%; height: 400px; margin: 0 auto;"></div>
        </section>
      </div> 
      <br>
      <div>
        <p style="text-align: justify; margin-right: 100px ; margin-left: 100px ;"> 
     Drugs and drug related crimes are being more frequently flashed in Victoria News channels.  
     As per information from the Victoria’s crime report two of every three offenders detained by the police 
     tested positive to at least one type of drug use. Sadly, the majority of drug possessors and users are teenagers and adults.
     This map shows offence count realted to drug abuse based on government local area. You can see also rating of area based on
     number of offences in that area.
     </p>
      
      </div>
     
   <div align="center" >
    
        <a href="<?php bloginfo('url'); ?>/index.php/suburbprofile/" style="border: 2px solid #a1a1a1;  padding: 10px 40px;  background: #dddddd; width: 50px; border-radius: 25px;">
       Offence  Map </a> 

       <a href="<?php bloginfo('url'); ?>/index.php/offence/" style="border: 2px solid #a1a1a1;  padding: 10px 40px;  background: #dddddd; width: 50px; border-radius: 25px;">
         Offence    Graph     </a> 

       
     
      
  
     </div>
          
    </body>
    

</html>
<? get_footer(); ?>

 
