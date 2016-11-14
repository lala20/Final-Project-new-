$(document).ready(function() {
  var ElLoc;
  var ElType;
  var ElNov;
  $('#acar').change(function(){
    ElLoc = $(this).val();
    $('#Loc').attr('value',ElLoc);
    return false;
  });
  $('#seher').change(function(){
    ElType = $(this).val();
    $('#Type').attr('value',ElType);
    return false;
  });
  $('#kategory').change(function(){
    ElNov = $(this).val();
    $('#Nov').attr('value',ElNov);
    return false;
  });
var markers = [];
$.ajax({
  timeout: 3000,
  url: '/',
  type: 'GET',
  headers:{
    'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
  },
  dataType: 'json',
  data: {
    ElanLocation : $('#Loc').val(),
    ElanType : $('#Type').val(),
    ElanNov : $('#Nov').val(),
  },
  success:function Mydata(data) {
    markers = [];
    var myLatlng = new google.maps.LatLng(40.100,48.800);
           var mapOptions = {
               zoom: 8,
               center: myLatlng,
               scrollwheel: false,
               streetViewControl:false,
               mapTypeControl:false,
               overViewMapControl:false
           };
           var map = new google.maps.Map(document.getElementById('infoMap'), mapOptions);
           var marker;
           for ( i = 0; i < data['data'].length; i++) {
             var src;
             if( (data['data'][i]['type_id']) == 2) {
                src= "/image/green-icon.png";
             }else if (data['data'][i]['type_id'] == 1) {
               src="/image/red-icon.png";
             };
             var MyData =data['data'][i]['about'];
             var about = MyData.substring(0,150);
             marker = new google.maps.Marker({
                 position: new google.maps.LatLng(data['data'][i]['lat'],data['data'][i]['lng']),
                 map: map,
                 title: data['data'][i]['title'],
                 content:"<div id='infow'>" +
                    '<div class="infow-content">' +
                      '<div class="infow-title"></div>' +
                      "<img src='image/"+data['data'][i]['image']+"' height='115' width='100'>" +
                      "<p>"+about+"</p>"+
                    '</div>' +
                  '</div>',
                 animation: google.maps.Animation.DROP,
                 icon:src,
             });
             markers.push(marker);
           };
             var info = new google.maps.InfoWindow();
             function manyInfo(mark, infowindow) {
             infowindow.setContent(mark.content);
             infowindow.open(map, mark);
             markers.addListener('closeclick', function() {
                 infowindow.setMarker(null);
             });
           }
           for (var i = 0; i < markers.length; i++) {
               google.maps.event.addListener(markers[i], 'click', function() {
                   manyInfo(this, info);
                   console.log("click");
               });
           }
           var markerCluster = new MarkerClusterer(map, markers, {
             imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
         });
         },
  // timeout: 3000,
  beforeSend:function(){
    $('.Load').removeClass('closeLoad');
  },
  complete:function(){
    $('.Load').addClass('closeLoad');
  },
});

  $('.Test').change(function(event) {
    $.ajax({
      timeout: 3000,
      url: '/',
      type: 'GET',
      headers:{
        'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
      },
      dataType: 'json',
      data: {
        ElanLocation : $('#Loc').val(),
        ElanType : $('#Type').val(),
        ElanNov : $('#Nov').val(),
      },
      success:function Mydata(data) {
        markers = [];
        var myLatlng = new google.maps.LatLng(40.100,48.800);
               var mapOptions = {
                   zoom: 8,
                   center: myLatlng,
                   scrollwheel: false,
                   streetViewControl:false,
                   mapTypeControl:false,
                   overViewMapControl:false
               };
               var map = new google.maps.Map(document.getElementById('infoMap'), mapOptions);
               var marker;
               for ( i = 0; i < data['data'].length; i++) {
                 var src;
                 if( (data['data'][i]['type_id']) == 2) {
                    src= "/image/green-icon.png";
                 }else if (data['data'][i]['type_id'] == 1) {
                   src="/image/red-icon.png";
                 };
                 var MyData =data['data'][i]['about'];
                 var about = MyData.substring(0,150);
                 marker = new google.maps.Marker({
                     position: new google.maps.LatLng(data['data'][i]['lat'],data['data'][i]['lng']),
                     map: map,
                     title: data['data'][i]['title'],
                     content:"<div id='infow'>" +
                        '<div class="infow-content">' +
                          '<div class="infow-title"></div>' +
                          "<img src='image/"+data['data'][i]['image']+"' height='115' width='100'>" +
                          "<p>"+about+"</p>"+
                        '</div>' +
                      '</div>',
                     animation: google.maps.Animation.DROP,
                     icon:src,
                 });
                 markers.push(marker);
               };
                 var info = new google.maps.InfoWindow();
                 function manyInfo(mark, infowindow) {
                 infowindow.setContent(mark.content);
                 infowindow.open(map, mark);
                 markers.addListener('closeclick', function() {
                     infowindow.setMarker(null);
                 });
               }
               for (var i = 0; i < markers.length; i++) {
                   google.maps.event.addListener(markers[i], 'click', function() {
                       manyInfo(this, info);
                       console.log("click");
                   });
               }
               var markerCluster = new MarkerClusterer(map, markers, {
                 imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
             });
             },
      // timeout: 3000,
      beforeSend:function(){
        $('.Load').removeClass('closeLoad');
      },
      complete:function(){
        $('.Load').addClass('closeLoad');
      },
    });
  });
});
