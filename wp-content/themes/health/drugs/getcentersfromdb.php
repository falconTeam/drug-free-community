<?php


/*
This is drug free community project done by falcon Team
This page help to get requst inquery posted from the from rehSearch.php
Then retrun back the reslut to form
Created on 9-2015
*/


//get connection to access the tabl
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );


// get posted inquery 
$postcode = $_POST['postalcode'];
$ageRestriction = ''; 
$drugType = ''; 
$srvType = '';

// sql where clause to chack what have the  user select
$condition = '';

if( !empty($_POST['AR']) ){
    $ageRestriction = $_POST['AR'];
    $drugType = $_POST['DT'];
    $srvType = $_POST['ST'];
    
   $condition = " and agelimit='$ageRestriction' and drugstype like '%$drugType%' and servicetypes='$srvType'; ";
}


// First portion of query when basic serach  occured only

$sql = "SELECT * FROM  rehabilitation where postcode=$postcode  ";


// if advanced query occured , add the  the advanced filter to query

if( !empty($condition) ){
     $sql .= $condition;
}

//echo $sql . '<br>';



echo $html;
 // to get connection to databae , gloabl conenction from wp-laod.php is needed
 global $wpdb;
//Fetch results as associative array
$results = $wpdb->get_results($sql, ARRAY_A);

// if no result , retrun message
if(count($results)<=0)
{

echo " <h1 align='center'>No Record found</h1>";
 }

// if data get disply the result

$html ='';
for ($i=0; $i<count($results); $i++) 
{
    $rowHtml = '<div class="row"><div class="col-md-offset-1 col-md-10">';
    $angels = $results[$i]['longitude'] . ',' . $results[$i]['latitude'];
    
    $rowHtml .= "<strong> Center Name: </strong>{$results[$i]['centername']} </strong>&nbsp;&nbsp;<strong> Address:</strong>{$results[$i]['Address']}, {$results[$i]['Suburb']} ";    
    $rowHtml .= "<a class='btn btn-info' href='{$results[$i]['url']}' target='_blank'>Visit Us</a>&nbsp;&nbsp;";
    $rowHtml .= "<button class='btn btn-info' id='btnShowMap' value='Show Map' title='$angels'>Show Map</button><br><br>";
    
    $rowHtml .= '<div class="map-canvas" style="height: 300px;"></div>';
    
    $rowHtml .= "</div></div>";
    
    $html .= $rowHtml;
  
}

echo $html;
 
?>