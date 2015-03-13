@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>ชื่อ : {{ $document->name }}<h2>
				</div>

				<div class="panel-body">
					<div class="form-group">
					      <label for="description">รายละเอียด</label>
					      <textarea class="form-control" rows="5" id="description" readonly>{{ $document->description }}</textarea>
					<br>
					<div class="form-group">
					      <label for="picture">รูปภาพเอกสาร</label>
					      <div class="thumbnail" id="index-thumbnail">
                                <a href="{{ $document->photo_path }}" title="" rel="lightbox_show"><img src="{{ $document->photo_path }}" width="350" height="250"></a>
                          <div>		
                              
					<br>
					<div class="text-right">
						<a href="{{ route('document-edit', $document->document_id ) }}"><button class="btn btn-success">แก้ไข</button></a>
						<a href="{{ route('document-remove', $document->document_id ) }}" onclick="return confirm('คุณต้องการลบเอกสารนี้ใช่ไหม?')"><button class="btn btn-danger">ลบเอกสาร</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection