@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>ชื่อ : {{ $action->name }}<h2>
				</div>

				<div class="panel-body">
					<div class="form-group">
					      <label for="description">รายละเอียด</label>
					      <textarea class="form-control" rows="5" id="description" readonly>{{ $action->description }}</textarea>
					<br>
					<ul class="nav nav-pills nav-stacked">
						<label for="description">เอกสาร</label>
						@foreach( $olds as $old )
							<li role="presentation"><a href="{{ route('document', $old->document_id ) }}">{{ $old->name }}</a></li>
						@endforeach
					</ul>
					<br>
					<div class="text-right">
						<a href="{{ route('action-edit', $action->action_id ) }}"><button class="btn btn-success">แก้ไข</button></a>
						<a href="{{ route('action-remove', $action->action_id ) }}" onclick="return confirm('คุณต้องการลบบริการนี้ใช่ไหม?')"><button class="btn btn-danger">ลบบริการ</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection