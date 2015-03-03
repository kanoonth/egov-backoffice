@extends('app')
  <script src="http://maps.googleapis.com/maps/api/js"></script>

  @section('content')
    <script>

      $(function() {

        function changePosition(marker, lat, lng) {
          var newCoor = new google.maps.LatLng(lat, lng);
          marker.setPosition(newCoor);
        }

        function initialize() {
          var mapProp = {
            center: new google.maps.LatLng(13.84, 100.57),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          
          var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(13.84, 100.57),
            // animation:google.maps.Animation.BOUNCE
          });
          marker.setMap(map);

          var infowindow = new google.maps.InfoWindow({
            content:"ใส่ชื่อ"
          });
          infowindow.open(map,marker);


          var marker2 = new google.maps.Marker({
            position: new google.maps.LatLng(13.83, 100.573)
          });
          marker2.setMap(map);

          var infowindow2 = new google.maps.InfoWindow({
            content:"สำนักงานเขตบางบางซื่อ"
          });
          infowindow2.open(map,marker2);
            
          google.maps.event.addListener(map, 'click', function (e) {
            changePosition(marker, e.latLng.lat(), e.latLng.lng());
            $("#lat").val(e.latLng.lat());
            $("#lng").val(e.latLng.lng());
          });

          $("#lat").keyup(function() {
            changePosition(marker, $("#lat").val(), $("#lng").val());
          });

          $("#lng").keyup(function() {
            changePosition(marker, $("#lat").val(), $("#lng").val());
          });

          $("#name").keyup(function() {
            infowindow.setContent($("#name").val());  
          });

        }

        google.maps.event.addDomListener(window, 'load', initialize);

      });
</script>
</head>

<body>
<div id="googleMap" style="width:500px;height:380px;"></div>
<form method="post" action="{{ routes('place-add-submit') }}">
  ชื่อ <input type="text" id="name" value="ใส่ชื่อ">
  ละติจูด <input type="text" id="lat" value="13.87">
  ลองจิจูด <input type="text" id="lng" value="100.57">
  <button type="submit">ตกลง</button>
  <button>ยกเลิก</button>
</form>
@endsection
