<?php
 mysql_connect("localhost","root","root");
 mysql_select_db("dfc");
 
 $term=$_GET["term"];
 
 $query=mysql_query("SELECT DISTINCT Postcode,Suburb FROM rehabilitation where Postcode like '%".$term."%' order by Postcode ");
 $json=array();
 
    while($post=mysql_fetch_array($query)){
         $json[]=array(
                    'value'=> $post["Postcode"],
                    'label'=>$post["Postcode"]." - ".$post["Suburb"]
                        );
    }
 
 echo json_encode($json);
 
?>