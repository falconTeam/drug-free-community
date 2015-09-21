
<?php
/*
This is drug free community project done by falcon Team
This page help to get requst inquery posted from the from index.php
Then retrun back the reslut to map as json file
Created on 9-2015
*/


// call the required files to get connection to databae
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );

// get the predfined conf to acess the database
    global $wpdb;

// query the table

    $sql = "SELECT * FROM OffenceCountTable";
// get the result and convert them to json
    $results = $wpdb->get_results($sql);
    $locations = json_encode($results);

     echo $locations;
 



          
   