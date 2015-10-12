<?php
 /*
 *This is drug free community project done by falcon Team
 *the getData.php page to get data based on selction GLA and convert them to json to be used to create grpah
 *Created on 9-2015
 *to allow  worpress need to give template name
 *
 *
 * @package health
 */
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );

 require_once( $parse_uri[0] . 'wp-load.php' );

$q = $_GET['gla'];



 
// sql query to get offence order by year
$query = "SELECT year,sum(OffenceCount) as OffenceCount FROM DrugRealtedCrime  where LocalGovernmentArea= '".$q."' GROUP by year,LocalGovernmentArea order by year";


$table = array();
$table['cols'] = array(
     
//given type for disply coimun
// refer to https://developers.google.com/chart/?hl=en
    array('label' => 'year', 'type' => 'number'),
    array('label' => 'Number of Offences', 'type' => 'number')
    
);
//  get conenction
global $wpdb;
// run query and get result
$results = $wpdb->get_results($query, ARRAY_A);
// fetch row
$rows = array();
for ($i=0; $i<count($results); $i++) {
    $temp = array();
    // ciolum inserted in temp array


    $temp[] = array('v' => $results[$i]['year']);

    $temp[] = array('v' => (int) $results[$i]['OffenceCount']); 

    // iput temp arrry to rwo
    $rows[] = array('c' => $temp);
}

// put row to table
$table['rows'] = $rows;
// convet table as json file


$jsonTable = json_encode($table);

// to prevent cashing
header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');
 // retrun json
echo $jsonTable;
?>