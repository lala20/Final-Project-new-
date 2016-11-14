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

 //index-de drag ishlemesi ucun
     $('#moveButton').on('mousedown',function(event) {
        $('#searchBoxDrag').draggable({
             containment: '#infoMap'
         });
            $('#searchBoxDrag').draggable('enable');
     });
      $('#moveButton').on('mouseup',function(event) {
          $('#searchBoxDrag').draggable('disable');
      });
     $('.index3').click(function(event) {
        var t = $(this);
        var data = t.attr('data-index');
        $('.index3').css('background', '#28353d');
        console.log(data);
        $('.clickedVer').hide();
        $('.clickedVer[data-info="'+data+'"]').show();
        t.css('background', 'transparent');
      });
 //index drag end
 var city;
 $('#seherler').change(function(){
   city = $(this).val();
   $('#city').attr('value',city);
   return false;

 });

  var numb;
 $('#nomre').change(function(){
   numb = $(this).val();
   $('#operator').attr('value',numb);
   return false;

 });

   var numb1;
 $('#profilnumb').change(function(){
   numb1 = $(this).val();
   $('#profoperator').attr('value',numb1);
   return false;

 });


});

var popupSize = {
   width: 780,
   height: 550
};

$(document).on('click', '.social-buttons > a', function(e){

   var
        verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
        horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

   var popup = window.open($(this).prop('href'), 'social',
        'width='+popupSize.width+',height='+popupSize.height+
        ',left='+verticalPos+',top='+horisontalPos+
        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

   if (popup) {
        popup.focus();
        e.preventDefault();
   }

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
