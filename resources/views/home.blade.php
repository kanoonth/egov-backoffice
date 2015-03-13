@extends('app')

@section('content')
<style type="text/css">
span.glyphicon.big {
    font-size: 5em;
}

span.glyphicon {
    font-size: 1.2em;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">หน้าแรก</div>

				<div class="panel-body">
					คุณอยู่ในระบบเรียบร้อยแล้ว
				</div>

				
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-5 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
				  บริการ
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-5 col-md-offset-1">
							<center>
								<a href="/actions/">
									<span class="glyphicon glyphicon-info-sign big" aria-hidden="true"></span>
									<br>บริการทั้งหมด
								</a>
							</center>
						</div>
						<div class="col-md-5 col-md-offset-0">
							<center>
								<a href="{{route('action-add')}}">
									<span class="glyphicon glyphicon-plus big" aria-hidden="true"></span>
									<br>เพิ่มบริการ
								</a>
							</center>
						</div>
					</div>
				</div>
			</div>
	 		<div class="panel panel-default">
				<div class="panel-heading">
				 เอกสาร
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-5 col-md-offset-1">
							<center>
								<a href="/documents/">
									<span class="glyphicon glyphicon-file big" aria-hidden="true"></span>
									<br>เอกสารทั้งหมด
								</a>
							</center>
						</div>
						<div class="col-md-5 col-md-offset-0">
							<center>
								<a href="{{route('document-add')}}">
									<span class="glyphicon glyphicon-plus big" aria-hidden="true"></span>
									<br>เพิ่มเอกสาร
								</a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">
				 สถานที่ให้บริการ
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-5 col-md-offset-1">
							<center>
								<a href="/places/">
									<span class="glyphicon glyphicon-home big" aria-hidden="true"></span>
									<br>สถานที่ให้บริการทั้งหมด
								</a>
							</center>
						</div>
						<div class="col-md-5 col-md-offset-0">
							<center>
								<a href="{{route('place-add')}}">
									<span class="glyphicon glyphicon-plus big" aria-hidden="true"></span>
									<br>เพิ่มสถานที่
								</a>
							</center>
						</div>
					</div>
				</div>
			</div>
	 		<div class="panel panel-default">
				<div class="panel-heading">
				รายการจอง
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<center>
								<a href="/queue">
									<span class="glyphicon glyphicon-check big" aria-hidden="true"></span>
									<br>รายการจองทั้งหมด
								</a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
