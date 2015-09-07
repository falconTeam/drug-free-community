<?php
/**
 * Template Name: rehSearch
 *
 * @package health
 */



get_header(); ?>


<!-- Refer https://developers.google.com/maps/documentation/geocoding/intro -->
<!-- Refer for plotting numbers of point http://webapps.stackexchange.com/questions/12475/how-do-i-plot-a-bunch-of-points-on-google-maps -->
<!DocType html>
<html>
    <head>
        <?php
        include_once __DIR__ . '/common.php';
        ?>
    </head>
    <body class="container" align='center'>
        <br>
        <h2><i> Search for rehabilitation center</i></h2>
        <br>
        <br>
        <div class="row">
             <strong>PostCode</strong> <input type="number" id='txtPostCode' value='3109'></input>&nbsp;&nbsp;<button class="btn btn-info" id='btn-advanced' value="Advance">Advance Options</button>
             &nbsp;&nbsp;<input type="button" class="btn btn-success" id='btn-submit' value='Submit'></button>
        </div>
        <br>
        <div class="row" id='advanceDiv' style="display:none;">
            <div class="col-md-9">
            <div class="row">
                <div class="col-md-4">
                    <strong>Age </strong>
                <select id='txtAgeRestriction' name='txtAgeRestriction' style="height:30px;margin:5px;">
                    <option value = 'All' selected>All</option>
                    <option value = 'Under-18'>Under-18</option>
                    <option value = 'Above-18'>Above-18</option>
                </select>
                </div>
                <div class="col-md-4">
                    <strong>Drugs Type</strong>
                <select id='txtDrugType' name='txtDrugType' style="height:30px;margin:5px;">
                    <option value = 'All'>All</option>
                    <option value = 'Ice' selected>Ice</option>
                    <option value = 'Cocaine'>Cocaine</option>
                    <option value = 'GHB'>GHB</option>
                    <option value = 'DMT'>DMT</option>
                    <option value = 'Ayahuasca'>Ayahuasca</option>
                </select>
                </div>
                <div class="col-md-4">
                    <strong>Service Type</strong>
                <select id='txtServiceType' name='txtServiceType' style="height:30px;margin:5px;">
                    <option value = 'All'>All</option>
                    <option value = 'Resident' selected>Resident</option>
                    <option value = 'Non-Resident'>Non-Resident</option>                    
                </select>
                </div>
            </div>
        </div>
        </div>
        <br>
        
        <div id='detailsDiv' >            
         </div>
            
        </div>
        
<div align='right'>

    <?php get_footer(); ?>

</div>

    </body>
</html>

