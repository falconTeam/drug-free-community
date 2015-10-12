<?php 
// change path as required 
$sitepath1 = get_template_directory_uri().'/offenceMap'
//the follwing code to direct templet to required style and jquery fiels needed by project
?>
 <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
 <link type='text/css' rel='stylesheet' href= '<?=$sitepath;?>/css/jquery-ui.css'/>
 <script type="text/javascript" src='<?=$sitepath1;?>/js/map.js'></script>
 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
 <input type='hidden' id='sitepath1' value="<?=$sitepath1;?>"></input>

 