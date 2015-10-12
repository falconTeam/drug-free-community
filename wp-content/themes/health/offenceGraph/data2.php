<?php
$con = mysql_connect("localhost","root","root");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("dfc", $con);


$sth = mysql_query("SELECT sum(`OffenceCount`) as 'OverAll' FROM `DrugRealtedCrime`  GROUP by `Year`");
$rowso = array();
$rowso['name'] = 'OverAll';
while($r = mysql_fetch_array($sth)) {
    $rowso['data'][] = $r['OverAll'];
}


$sth = mysql_query("SELECT sum(`OffenceCount`) as 'manufacture drugs' FROM `DrugRealtedCrime` WHERE `CSAOffenceSubdivision`='C20 Cultivate or manufacture drugs' GROUP by `CSAOffenceSubdivision`,`Year`");
$rows = array();
$rows['name'] = 'manufacture drugs';
while($r = mysql_fetch_array($sth)) {
    $rows['data'][] = $r['manufacture drugs'];
}

$sth = mysql_query("SELECT sum(`OffenceCount`) as 'dealing and trafficking' FROM `DrugRealtedCrime` WHERE `CSAOffenceSubdivision`='C10 Drug dealing and trafficking' GROUP by `CSAOffenceSubdivision`,`Year`");
$rows1 = array();
$rows1['name'] = 'dealing and trafficking';
while($rr = mysql_fetch_assoc($sth)) {
    $rows1['data'][] = $rr['dealing and trafficking'];
}


$sth = mysql_query("SELECT sum(`OffenceCount`) as 'Drug use and possession' FROM `DrugRealtedCrime` WHERE `CSAOffenceSubdivision`='C30 Drug use and possession' GROUP by `CSAOffenceSubdivision`,`Year`");
$rows2 = array();
$rows2['name'] = 'Drug use and possession';
while($r2 = mysql_fetch_assoc($sth)) {
    $rows2['data'][] = $r2['Drug use and possession'];

}


$sth = mysql_query("SELECT sum(`OffenceCount`) as 'Other drug offences' FROM `DrugRealtedCrime` WHERE `CSAOffenceSubdivision`='C90 Other drug offences' GROUP by `CSAOffenceSubdivision`,`Year`");
$rows3 = array();
$rows3['name'] = 'Other drug offences';
while($r3 = mysql_fetch_assoc($sth)) {
    $rows3['data'][] = $r3['Other drug offences'];
}



$result = array();
array_push($result,$rowso);
array_push($result,$rows);
array_push($result,$rows1);
array_push($result,$rows2);
array_push($result,$rows3);



print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>
