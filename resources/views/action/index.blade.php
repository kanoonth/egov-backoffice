@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading text-right">
					<button type="button" class="btn btn-success">
 				 		สร้างบริการ
					</button>
				</div>

				<div class="panel-body">
					<ul class="nav nav-pills nav-stacked">
						@foreach( $actions as $action )
							<li role="presentation"><a href="{{ route('action', $action->action_id ) }}">{{ $action->name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection