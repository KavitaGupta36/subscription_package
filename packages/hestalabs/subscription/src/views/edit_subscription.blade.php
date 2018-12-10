@include('subscription::layouts.header')
<div class="container-fluid">
  <div class="row content">
	@include('subscription::layouts.sidebar')
    <div class="container">
	    <div class="col-sm-9">
	    	<h2>Edit Subscripton</h2>
	    	<hr class="hr-primary">
	    	
	    	<div class="col-sm-9"></div>
	    	<div class="col-sm-3">
	    		<a href="{{ url('subscription') }}" class="btn btn-primary">List</a>
	    	</div>
	    	@include('subscription::layouts.alert')
	    	<form action="{{ route('subscription.update', $details->id) }}" method="post" enctype="multipart/form-data" id="myForm" name="myForm">
	    		{{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="title" value="{{$details->title}}" placeholder="Enter Title..">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description" rows="3">{{$details->description}}</textarea>
				</div>
				<div class="form-group">
				    <label>Image</label>
				    <input type="file" class="form-control-file" name="thumbnail" id="imgInp">
				    @empty($details->thumbnail)
                    	<img src="{{ asset('/images/default.jpg') }}" width="100" height="100" id="blah">
                    @else
                    	<img src="{{ url('uploads/subscription/'.$details->thumbnail) }}" width="100" height="100" id="blah">
                    @endif
				</div>
				<div class="form-group">
					<label>Price</label>
					<input type="number" class="form-control" name="price" value="{{$details->price}}" placeholder="Enter Price..">
				</div>

				<div class="form-row">
				    <div class="form-group col-md-8">
				      <label>Validity</label>
				      <input type="number" class="form-control" name="valid_time" placeholder="Enter Validity duration.." value="{{$details->valid_time}}">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputState">Validity (Month/Year)</label>
				      	<select name="validity_text" id="validity_text" class="bs-select form-control required" aria-required="true">
							<option value="" selected="selected">Please select</option>
							<option value="year" {{ $details->validity_text == 'day' ? 'selected="selected"' : '' }} >Day</option>
							<option value="year" {{ $details->validity_text == 'year' ? 'selected="selected"' : '' }} >Year</option>
							<option value="month" {{ $details->validity_text == 'month' ? 'selected="selected"' : '' }} >Month</option>
						</select>
				    </div>
				</div>
				<button>Submit</button>
	    	</form>
	    </div>
	</div>
  </div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#blah').show();
	            //$('#imageUpdate').val(input.files[0].name);
	            $('#blah').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#imgInp").change(function(){
	    readURL(this);
	});         
});
$("#myForm").validate({ 
	rules: {
		'title': {
			required: true,
			minlength: 1
		}, 
		'description': {
			required: true
		},
		'price': {
			required: true
		},
		'valid_time': {
			required: true
		},
		'validity_text': {
			required: true
		},
	},
	messages: {
		'title': {
            required: "Subscripton Title is required."  
		},
		'description':{
		  	required: "Subscripton Description is required.",
        },
        'price': {
            required: "Subscripton Price is required."  
		},
		'valid_time':{
		  	required: "Subscripton Validate time is required.",
        },
        'validity_text': {
            required: "This field is required."  
		},
	}
});
</script>
@include('subscription::layouts.footer')
