<?php

function getLatLongFromPostcode($postcode, $country, $gmapApiKey)
{
    

    /* remove spaces from postcode */
    $postcode = urlencode(trim($postcode));
 
    /* connect to the google geocode service */    
    $file = "https://maps.google.com/maps/api/geocode/xml?address=$postcode,+AU&key=AIzaSyA5papzfh_eu6xDIvk4CLmyQ_0pDcKYJA8";
    //echo $file;
    $xml = simplexml_load_file($file) or die("url not loading");
  
    return ($xml);
}

$postcode = $_POST['postalcode'];
$ageRestriction = ''; 
$drugType = ''; 
$srvType = '';

// sql where clause
$condition = '';

if( !empty($_POST['AR']) ){
    $ageRestriction = $_POST['AR'];
    $drugType = $_POST['DT'];
    $srvType = $_POST['ST'];
    
   $condition = " AND agelimit='$ageRestriction' AND drugstype like '%$drugType%' AND servicetypes='$srvType'; ";
}


// get lat and lng for postal code
$xml = getLatLongFromPostcode($postcode, "AU", 'AIzaSyA5papzfh_eu6xDIvk4CLmyQ_0pDcKYJA8');
$latitude = (double)$xml->result->geometry->location->lat;
$longitude = (double)$xml->result->geometry->location->lng;

//echo "<h1>$latitude => $longitude</h1>";


// Change connection string
include_once 'connection.php';


$sql = "SELECT * FROM  rehabilitation where suburbid=$postcode";

if( !empty($condition) ){
     $sql .= $condition;
}

//echo $sql . '<br>';

if( !($results = $mysqli->query($sql, MYSQLI_STORE_RESULT) ))
{
    echo 'Database error';
    return;
}
$numRecords =  $results->num_rows;

$html = '<div class="row"><div class="col-md-8" align="center">';
$html .= '<table class="table table-striped table-hover table-bordered" align="right"  width="80%">';
if($numRecords > 0){
while( $row = $results->fetch_assoc() ){
    
    // db angel
    $angels = $row['longitude'] . ',' . $row['latitude'];
    
    $rowHtml = "<tr align='right'><td><strong>Address : </strong>{$row['address']}, {$row['suburb']},<strong>Center Name : </strong>{$row['centername']}</strong>&nbsp;&nbsp;"; 
    $rowHtml .= "<a class='btn btn-info' href='{$row['url']}' target='_blank'>Visit Us</a>&nbsp;&nbsp;";
    $rowHtml .= "<button class='btn btn-info' id='btnShowMap' value='Show Map' title='$angels'>Show Map</button><br><br>";
    
    $rowHtml .= '<div class="map-canvas" style="width:600px;height:300px;"></div>';
    
    $rowHtml .= "</td></tr>";
    
    $html .= $rowHtml;
}
}
else{
  $html .= "<br><br><h5 align='right' font='gray'>No record found</h5>";
}
$html .= '</table></div></div>';

$mysqli->close();

echo $html;
?>