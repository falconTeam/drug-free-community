<?php

/*
This is drug free community project done by falcon Team
the rehSearch.php page give user chnace to search based on requirement 
 Created on 9-2015
*/
// to allow  worpress need to give template name
/**
 * Template Name: rehSearch
 *
 * @package health
 */

//searching form for rehiblation center

get_header(); ?>


<!-- Refer https://developers.google.com/maps/documentation/geocoding/intro -->
<!-- Refer for plotting numbers of point http://webapps.stackexchange.com/questions/12475/how-do-i-plot-a-bunch-of-points-on-google-maps -->
<!DocType html>
<html>
    <head>
        <?php
        include_once __DIR__ . '/common.php'; ?>
<script type="text/javascript">
        $(document).ready(function(){
                    $("#txtPostCode").autocomplete({
                        source:'<?php bloginfo('url'); ?>/wp-content/themes/health/drugs/getautocomplete.php',
                        minLength:1
                    
                    });
                });
        
    </script>
    </head>
    <body class="container"  >
        <br>
         <div calss="box-wrapper" style="font-size: 36px;
    font-weight: normal;
    line-height: 40px;
    margin: 2px 0 8px;
    text-align: center;
    color: black;"> Search for Rehabilitation Centre</div>
        <br>
        <br>
        <DIV style="background: #2bb5cf; padding: 20px; border-radius: 5px; margin-left:15%; margin-right:15%;">
        <div class="row">

        <input type='text' id='txtPostCode'   placeholder="Search by postcode" style="height:40px;margin:5px;width:200px; margin-left: 30px;" >                     
 

        <input type="button" class="btn btn-success" id='btn-submit' value='Submit'></button>

        <button class="btn btn-info" id='btn-advanced' value="Advance">Advance Options</button>
        </div>

    
        <br>
        <div class="row" id='advanceDiv' style="display:none;">
            <div class="col-md-9">
            <div class="row">
                <div class="col-md-4">
                    <strong>Age </strong>
                <select id='txtAgeRestriction' name='txtAgeRestriction' style="height:30px;margin:5px;">
                    <option value = '' selected>Any</option>
                    <option value = 'Under-18'>Under-18</option>
                    <option value = 'Above-18'>Above-18</option>
                    <option value = '12-25Years'>Between 12 to 25</option>

                </select>

               
                </div>
                <div class="col-md-4">
                    <strong>Drugs Type</strong>
                <select id='txtDrugType' name='txtDrugType' style="height:30px;margin:5px;">
                    <option value = '' selected>Any</option>
                    <option value = 'ICE' >ICE</option>

                </select>
                </div>
                <div class="col-md-4">
                    <strong>Service Type</strong>
                <select id='txtServiceType' name='txtServiceType' style="height:30px;margin:5px;">
                    <option value = '' selected>Any</option>
                    <option value = 'Residential' >Resident</option>
                    <option value = 'Non-Residential'>Non-Resident</option>                    
                </select>
                </div>
            </div>
        </div>
        </div>

        </DIV>
        <br>
         
        <div align='left' id='detailsDiv' style="margin-left:10%; margin-right:10%;">  

        <p>
        <li><strong >Search for different rehabilitation service centres in Melbourne. You can optimise the search based on your needs</strong></li>
        <li>The basic search would be based  on the Post code.</li>
        <li >The advanced search is to improve the customer search
        by the search filters like age, postcode, service  type and drug type</li>
        </p>

         </div>
            
        </div>
        
 <div >

    <?php get_footer(); ?>

</div>

    </body>
</html>

