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
					  <form role="form" method="post" action="{{ route('document-edit-submit' )}}" enctype="multipart/form-data">
					  	<input type="hidden" name="id" value="{{ $document->document_id }}">
					    <div class="form-group">
					      <label for="name">ชื่อเอกสาร</label>
					      <input type="name" name="name" class="form-control" id="name" value="{{ $document->name }}">
					    </div>
					    <div class="form-group">
					      <label for="description">รายละเอียด</label>
					      <textarea rows="5" type="description" name="description" class="form-control" id="description">{{ $document->description }}</textarea>
					    </div>
					    <div class="form-group">
					    	<label for="document">รูปภาพ</label>

					    	<div class="thumbnail" id="index-thumbnail">
                                <a href="{{ $document->photo_path }}" title="" rel="lightbox_show"><img src="{{ $document->photo_path }}" width="350" height="250"></a>
                          	<div>	
                          	(เลือกรูปใหม่หากต้องการเปลี่ยนรูป)
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