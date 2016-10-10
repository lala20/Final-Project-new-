//============DƏSTƏK OLMAQ İSTƏYİRƏM BUTTONU ==============================================
  $(document).ready(function() {
    $(".destek-ol-message").hide();
    $(".destek-ol-button").click(function(){
        $(".destek-ol-message").slideToggle();

    });
   //=========Form üçün Enter disabled eləmək üçün kod======================================
     $("form").bind("keypress", function(e) {
      if (e.keyCode == 13) {
          return false;
      };
 });

 var city;
 $('#seherler').change(function(){
   city = $(this).val();
   $('#city').attr('value',city);
   return false;

 });

  //  var error = true;
  //  $('form').submit(function() {
  //    if ($('#lat').val()=="" && $('#lng').val()=="") {
  //        $('#adres').css("border-color","#ff0000");
  //           $('.LatLng').text('Xahiş olunur ünvani düzgün qeyd edin!');
  //        error = false;
  //    }else if ($('#head').val()=="") {
  //        $('#head').css("border-color","#ff0000");
  //        $('.head').text('Xahiş olunur boşluq buraxmayın!');
  //        error = false;
  //    }else if ($('#adres').val()=="") {
  //        $('#adres').css("border-color","#ff0000");
  //        $('.adres').text('Xahiş olunur boşluq buraxmayın!');
  //        error = false;
  //    }else if ($('#org').val()=="") {
  //        $('#org').css("border-color","#ff0000");
  //        $('.teskilat').text('Xahiş olunur boşluq buraxmayın!');
  //        error = false;
  //    }else if ($('#aciq').val()=="") {
  //        $('#aciq').css("border-color","#ff0000");
  //        $('.aciq').text('Xahiş olunur boşluq buraxmayın!');
  //        error = false;
  //    }else if ($('#pic').val()=="") {
  //        $('#pic').css("border-color","#ff0000");
  //        $('.pic').text('Xahiş olunur boşluq buraxmayın!');
  //        error = false;
  //    }else if ($('#name').val()=="") {
  //        $('#name').css("border-color","#ff0000");
  //        $('.name').text('Xahiş olunur boşluq buraxmayın!');
  //        error = false;
  //    }else if ($('#numb').val()=="") {
  //        $('#numb').css("border-color","#ff0000");
  //        $('.numb').text('Xahiş olunur boşluq buraxmayın!');
  //        error = false;
  //    }else if ($('#mail').val()=="") {
  //        $('#mail').css("border-color","#ff0000");
  //        $('.mail').text('Xahiş olunur boşluq buraxmayın!');
  //        error = false;
  //    }else if ($('#nov').val()=="") {
  //        $('#nov').css("border-color","#ff0000");
  //        $('.nov').text('Xahiş olunur boşluq buraxmayın!');
  //        error = false;
  //    }
  //    return error;
  //  });
});

// destek sehifesinde map ucun
function initAutocomplete() {

  var map = new google.maps.Map(document.getElementById('map'), {
    center: {  lat: 40.100,lng: 47.500},
    zoom: 6,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoomControl:false,
    streetViewControl:false,
    mapTypeControl:false,
    overViewMapControl:false
  });

  // Create the search box and link it to the UI element.
  var input = document.getElementById('adres');
  var searchBox = new google.maps.places.SearchBox(input);
  // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        animation: google.maps.Animation.DROP,
        position: place.geometry.location
      })
    );
      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
        console.log(place.vicinity)
          document.getElementById('lat').value = place.geometry.location.lat();
          document.getElementById('lng').value = place.geometry.location.lng();


      } else {
        bounds.extend(place.geometry.location);
          console.log(place.formatted_address)
        document.getElementById('lat').value = place.geometry.location.lat();
        document.getElementById('lng').value = place.geometry.location.lng();

      }
    });
    map.fitBounds(bounds);
  });
}
