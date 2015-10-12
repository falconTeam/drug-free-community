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
     $condition .= "and agelimit='$ageRestriction'";
    }
if( !empty($_POST['DT'])){
     $drugType = $_POST['DT'];
     $condition .= "and drugstype like '%$drugType%'";
    }
if( !empty($_POST['ST'])){
     $srvType = $_POST['ST'];
     $condition .= "and servicetypes='$srvType'";
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
    $rowHtml = '<div class="row">


 
    <div class="col-md-offset-1 col-md-8">';
    $angels = $results[$i]['longitude'] . ',' . $results[$i]['latitude'];
    
    $rowHtml .='<div style="float: left;">';
    $rowHtml .= "<div><strong>{$results[$i]['centername']} </strong>&nbsp;&nbsp; </div>";    
    $rowHtml .= "<div>{$results[$i]['Address']}, {$results[$i]['Suburb']}  </div>"; 
    $rowHtml .= "<div>Service offered:{$results[$i]['servicetypes']} </div>"; 
    $rowHtml .= "<div>Drug Treatment service:{$results[$i]['drugstype']} </div> ";       
    $rowHtml .= "<div>(03) {$results[$i]['Telephone']}  </div>"; 
    $rowHtml .= "<div>Email:{$results[$i]['email']} </div> ";    
    $rowHtml .= "</div>";

 
    $rowHtml .='<div style="float: right;">';
    $rowHtml .= "<div><a class='btn btn-info' href='{$results[$i]['url']}' target='_blank'>Visit Us</a> &nbsp;<button class='btn btn-info' id='btnShowMap' value='Show Map' title='$angels'>Show Location</button>";
    $rowHtml .= '<br><div class="map-canvas" style="height: 150px;"></div>';
    $rowHtml .= "</div>";


    $rowHtml .= "</div></div>";
    
    
    $html .= $rowHtml;
  
}
echo   $html;
 
?>