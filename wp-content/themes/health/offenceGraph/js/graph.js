//      <script type="text/javascript">
       


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
        

var map;
 
// Ban Jelačić Square - City Center
 var center = new google.maps.LatLng(-36.5924573,144.5454357);
 
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
 
function init() {
 
    var mapOptions = {
      zoom: 7,
      center: center,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
     
    var sitepath = $('#sitepath').val();
    url1: sitepath + "/getData.php",  


    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
     
    makeRequest('url1', function(data) {
             
        var data = JSON.parse(data.responseText);
         
        for (var i = 0; i < data.length; i++) {
            displayLocation(data[i]);
        }
    });
}
//]]>


function displayLocation(location) {
         
    var content =   '<div class="infoWindow"><strong> '  + location.localGovernmentArea 
                    + '<br/> Offence Count :</strong> '    + location.offenceCount + '</div>';
     
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

      //  </script>