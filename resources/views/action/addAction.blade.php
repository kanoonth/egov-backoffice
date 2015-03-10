@extends('app')

@section('content')
<style type="text/css">
	input.search-input {
		box-sizing: border-box;
		-moz-box-sizing: border-box;
		width: 100%;
		margin-bottom: 5px;
		height: auto;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>เพิ่มบริการ</h2>
				</div>

				<div class="panel-body">
					
					  <form role="form" method="post" action="{{ route('action-add-submit' )}}">
					    <div class="form-group">
					      <label for="name">ชื่อบริการ</label>
					      <input type="name" name="name" class="form-control" id="name" placeholder="กรอกชื่อบริการ">
					    </div>
					    <div class="form-group">
					      <label for="category">ประเภท/หมวดหมู่ (ตัวอย่าง : บัตรประชาชน)</label>
					      <input type="category" name="category" class="form-control" id="category" placeholder="กรอกประเภทบริการ">
					    </div>
					    <div class="form-group">
					      <label for="description">รายละเอียด</label>
					      <textarea rows="5" type="description" name="description" class="form-control" id="description" placeholder="กรอกรายละเอียด"></textarea>
					    </div>
					    <div class="form-group">
					    	<label for="document">เอกสาร (คลิกเพื่อเลือก)</label>
					    	<select id='custom-headers' multiple='multiple' name="my-select[]" class="searchable">
					    		@foreach($documents as $document)
						      		<option value='{{ $document->document_id }}'>{{ $document->name }}</option>
						      	@endforeach
						      </select>
					    </div>
					    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
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
<script type="text/javascript">
	$(document).ready(function(){
	    // $('#my-select').multiSelect();
	    $('.searchable').multiSelect({
		  selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try \"12\"'>",
		  selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try \"4\"'>",
		  afterInit: function(ms){
		    var that = this,
		        $selectableSearch = that.$selectableUl.prev(),
		        $selectionSearch = that.$selectionUl.prev(),
		        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
		        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

		    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
		    .on('keydown', function(e){
		      if (e.which === 40){
		        that.$selectableUl.focus();
		        return false;
		      }
		    });

		    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
		    .on('keydown', function(e){
		      if (e.which == 40){
		        that.$selectionUl.focus();
		        return false;
		      }
		       });
		  },
		  afterSelect: function(){
		    this.qs1.cache();
		    this.qs2.cache();
		  },
		  afterDeselect: function(){
		    this.qs1.cache();
		    this.qs2.cache();
		  }
		});
		$("#category").autocomplete({
	      source: "/getdata",
	      select: function(event, ui){
	        $('#category').val(ui.item.id);
	    	}
	    });
	});


</script>

@endsection