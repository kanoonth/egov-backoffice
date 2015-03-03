@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>อัพโหลดรูป<h2>
				</div>

				<div class="panel-body">
					<form action="{{ route('image-upload') }}"
				      class="dropzone"
				      id="my-awesome-dropzone">
				      <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  </form>
				      <input type="file" name="file" />

				</div>
			</div>
		</div>
	</div>
</div>
@endsection