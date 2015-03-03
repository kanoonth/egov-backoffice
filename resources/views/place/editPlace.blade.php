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
            center: new google.maps.LatLng({{ $place->latitude }}, {{ $place->longitude }}),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          
          var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

          var marker = new google.maps.Marker({
            position: new google.maps.LatLng({{ $place->latitude }}, {{ $place->longitude }}),
            // animation:google.maps.Animation.BOUNCE
          });
          marker.setMap(map);

          var infowindow = new google.maps.InfoWindow({
            content:"{{ $place->name }}"
          });
          infowindow.open(map,marker);

            
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
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>สถานที่ให้บริการ</h2>
        </div>

        <div class="panel-body">

					<form method="post" action="{{ route('place-edit-submit') }}">
						<input type="hidden" name="id" value="{{ $place->place_id }}">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">ชื่อสถานที่ให้บริการ</label>
                <input type="name" name="name" class="form-control" id="name" value="{{ $place->name}}">
            </div>

            <div class="form-group">
                <label for="name">ละติจูด</label>
                <input type="text" class="form-control" id="lat" name="lat" value="{{ $place->latitude }}">
            </div>

            <div class="form-group">
                <label for="name">ลองจิจูด</label>
                <input type="text" class="form-control" id="lng" name="lng" value="{{ $place->longitude }}">
            </div>

            <div class="text-center">  
              <div id="googleMap" style="width:500px;height:380px;"></div>
            </div>

             <div class="text-right">
              <button type="submit" class="btn btn-success">ยืนยัน</button>
              <button type="cancel" class="btn btn-danger">ยกเลิก</button>
            </div>


           </form>
        </div>  
      </div>  
    </div>  
  </div>
</div>

@endsection
