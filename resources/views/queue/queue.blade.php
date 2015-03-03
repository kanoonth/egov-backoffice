@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row"><h2>
					  <div class="col-md-10">ตรวจสอบลำดับการบริการ</div>
					  <div class="col-md-2"><a href="{{ route('action-add') }}"><button type="button" class="btn btn-success">
 				 		เพิ่มการบริการ
						</button></a></div>
					</h2>
					</div>
				</div>

				<div class="panel-body">
					<ul class="nav nav-pills nav-stacked">
						สำนักงานเขตบางเขน
					</ul>
				</div>
				<table class="table">
                                	<tr>
						<th>ลำดับที่</th>
						<th>เวลา</th>
						<th>เลขประจำตัวประชน</th>
						<th>ชื่อ</th>
						<th>สกุล</th>
						<th>บริการ</th>
					</tr>
					@foreach($queues as $queue)
						<tr>
							<td>{{ $queue->id }}</td>
						</tr>
					@endforeach
				</table>

			</div>
		</div>
	</div>
</div>
@endsection
