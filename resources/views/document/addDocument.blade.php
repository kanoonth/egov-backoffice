@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>เพิ่มเอกสาร</h2>
				</div>
				<div class="panel-body">
					  <form role="form" method="post" action="{{ route('document-add-submit' )}}" enctype="multipart/form-data">
					    <div class="form-group">
					      <label for="name">ชื่อเอกสาร</label>
					      <input type="name" name="name" class="form-control" id="name" placeholder="กรอกชื่อบริการ">
					    </div>
					    <div class="form-group">
					      <label for="description">รายละเอียด</label>
					      <textarea rows="5" type="description" name="description" class="form-control" id="description" placeholder="กรอกรายละเอียด"></textarea>
					    </div>
					    <div class="form-group">
					    	<label for="document">รูปภาพ</label>
				      		<input type="file" name="file" />
					    </div>
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="text-right">
					    	<button type="submit" class="btn btn-success">ยืนยัน</button>
					    	<button type="reset" class="btn btn-danger">ยกเลิก</button>
						</div>
					  </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection