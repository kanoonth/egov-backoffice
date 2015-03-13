@extends('app')

@section('content')
<style>
.click {
	color: #337ab7;
	padding: 10px 15px;
}
.click:hover {
    background-color: #eee;
  	cursor:pointer;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row"><h2>
					  <div class="col-md-7">รายการบริการทั้งหมด</div>
					  <div class="col-md-3">

					  </div>
					  <div class="col-md-2"><a href="{{ route('action-add') }}"><button type="button" class="btn btn-success">
 				 		เพิ่มบริการ
						</button></a></div>
					</h2>
					</div>
				</div>
				<!-- <form>
						    <input type="text" id="search">
						</form> -->
				<div class="panel-body">
				</div>
				<table class="table">
					<tr>
					  <th>ชื่อบริการ</th>
					  <th>ประเภท</th>
					  <!-- <th>เวลาสร้าง</th> -->
					  <!-- <th>เวลาแก้ไขล่าสุด</th> -->
					<tr>
					@foreach( $actions as $action )
					<tr onclick="document.location = '{{ route('action', $action->action_id ) }}';" class="click">
						<td>{{ $action->name }}</td>
						<td>{{ $action->category_name }}</td>
						<!-- <td>{{ $action->created_at }}</td> -->
						<!-- <td>{{ $action->updated_at }}</td> -->
					<tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	var qs = $('input#search').quicksearch('table tr');
	$.ajax({
	    'type': 'GET',
	    'url': 'index.html',
	    'success': function (data) {
	        $('table tr').append(data);
	        qs.cache();
	    }
	});
});
</script>
@endsection