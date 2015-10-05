$(document).ready(function(){
                    $("#txtPostCode").autocomplete({
                        source:'<?php bloginfo('url'); ?>/wp-content/themes/health/drugs/getautocomplete.php',
                        minLength:1
                    });
                });
        
