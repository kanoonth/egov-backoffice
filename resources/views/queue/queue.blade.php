@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row"><h2>
					  <div class="col-md-12">ตรวจสอบลำดับการบริการ</div>
					 <!--  <div class="col-md-2"><a href="{{ route('action-add') }}"><button type="button" class="btn btn-success">
 				 		เพิ่มการบริการ
						</button></a></div> -->
					</h2>
					</div>
				</div>

				<div class="panel-body">
					<!-- <ul class="nav nav-pills nav-stacked">
						สำนักงานเขตบางเขน
					</ul> -->
				</div>
				<table class="table">
                    <tr>
						<th>ลำดับที่</th>
						<th>บริการ</th>
						<th>สถานที่</th>
						<th>เวลาเริ่มจอง</th>
						<th>เวลานัด</th>
						<th>เลขประจำตัวประชาชน</th>
						<th>เบอร์โทรศัพท์</th>
						<th>สถานะ</th>
						<th>Push Notification</th>
					</tr>
					@foreach($queues as $queue)
						<tr>
							<td>{{ $queue->queue_id }}</td>
							<td>{{ $queue->action_id }}</td>
							<td>{{ $queue->place_id }}</td>
							<td>{{ $queue->time_added }}</td>
							<td>{{ $queue->appointment_time }}</td>
							<td>{{ $queue->identification_no }}</td>
							<td>{{ $queue->phone_no }}</td>
							<td>{{ $queue->status }}</td>
							<td><center><a href="{{ route('queue-push',$queue->queue_id) }}"><button type="button" class="btn btn-primary">
	 				 		ส่ง
							</button></a></center></td>
						</tr>
					@endforeach
				</table>

			</div>
		</div>
	</div>
</div>
@endsection
