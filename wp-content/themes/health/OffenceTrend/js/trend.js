$(document).ready(function(){
  $('#btn-submit').on('click', function(){
     // check adavance options are visible
      var moreoptions = $('#advanceDiv').is(':visible');
      // fetch all centers 
      var postalCode = $('#txtPostCode').val().trim();     
      if(postalCode.length !=4){
          alert('Enter 4 digit postal code');
          $('#txtPostCode').focus();
          return;
      }
      var datastring = "postalcode=" + postalCode;
      
      // if advace is selected.. pass values to php page
      if(moreoptions == true)
      {
          var ageRestriction = $('#txtAgeRestriction').val();
          var drugType = $('#txtDrugType').val();
          var srvType = $('#txtServiceType').val();          
          datastring += "&AR=" + ageRestriction + "&DT=" + drugType + "&ST=" + srvType ;          
      }
     var sitepath = $('#sitepath').val();
    // get values from db using AJAX  
    $.ajax({
    type: "POST",
    url: sitepath + "/getcentersfromdb.php",  
    data:datastring,
    success: SuccessMessage,
    error: ErrorMessage
    });    
  });
  
  $('#btn-advanced').on('click', function(){
      // if visible, make button text collapse
      if( $('#advanceDiv').is(':visible') ){
          $(this).text('Advance Options');
      }
      else
      {
           $(this).text('Collapse');
      }   
      
      // show
      $('#advanceDiv').slideToggle('slow');

  });
  
  // show map
  $(document).on('click', '#btnShowMap', function(){      
      var mapOptions = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var txt = $(this).attr('title');
      
      //alert(txt);
      
      var angels = txt.split(',');
      var latD = parseFloat(angels[1]);
      var lngD = parseFloat(angels[0]);

      var location = {lat: latD, lng: lngD};
      var marker;
      console.log($(this));
      var mapDiv = $(this).siblings('.map-canvas')[0];
      map = new google.maps.Map(mapDiv, mapOptions);
      map.setCenter(location);
      if(marker)
        marker.setMap(null);

      marker = new google.maps.Marker({
          map: map,
          position: location,
          draggable: true
      });      
  });
  
});


function SuccessMessage(response){
    //alert(response);
    $('#detailsDiv').html(response);
}

function ErrorMessage(response){
    alert('Error: ' + response);
}