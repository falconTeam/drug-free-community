<?php 
// change path as required 
$sitepath = get_template_directory_uri().'/drugs'
//the follwing code to direct templet to required style and jquery fiels needed by project
?>
 <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
 <link type='text/css' rel='stylesheet' href= '<?=$sitepath;?>/css/bootstrap.css'/>
 <link type='text/css' rel='stylesheet' href= '<?=$sitepath;?>/css/jquery-ui.css'/>
 <script type="text/javascript" src='<?=$sitepath;?>/js/jquery.min.js'></script>
 <script type="text/javascript" src='<?=$sitepath;?>/js/jquery-ui.min.js'></script>
 <script type="text/javascript" src='<?=$sitepath;?>/js/drugs.js'></script>
 <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
 <input type='hidden' id='sitepath' value="<?=$sitepath;?>"></input>