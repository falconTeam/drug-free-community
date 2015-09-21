<?php
/* $server = the IP address or network name of the server
 * $userName = the user to log into the database with
 * $password = the database account password
 * $databaseName = the name of the database to pull data from
 * table structure - colum1 is cas: has text/description - column2 is data has the value
 */
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );

 require_once( $parse_uri[0] . 'wp-load.php' );

 
// write your SQL query here (you may use parameters from $_GET or $_POST if you need them)
$query = "SELECT year,sum(OffenceCount) as OffenceCount FROM DrugRealtedCrime GROUP by year order by year";


$table = array();
$table['cols'] = array(
    /* define your DataTable columns here
     * each column gets its own array
     * syntax of the arrays is:
     * label => column label
     * type => data type of column (string, number, date, datetime, boolean)
     */
    // I assumed your first column is a "string" type
    // and your second column is a "number" type
    // but you can change them if they are not
    array('label' => 'year', 'type' => 'number'),
    array('label' => 'Offence trend due to drug abuse', 'type' => 'number')
);

global $wpdb;
$results = $wpdb->get_results($query, ARRAY_A);

$rows = array();
for ($i=0; $i<count($results); $i++) {
    $temp = array();
    // each column needs to have data inserted via the $temp array
    $temp[] = array('v' => $results[$i]['year']);
    $temp[] = array('v' => (int) $results[$i]['OffenceCount']); 

    // insert the temp array into $rows
    $rows[] = array('c' => $temp);
}

// populate the table with rows of data
$table['rows'] = $rows;

// encode the table as JSON
$jsonTable = json_encode($table);

// set up header; first two prevent IE from caching queries
header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');
 // return the JSON data
echo $jsonTable;
?>