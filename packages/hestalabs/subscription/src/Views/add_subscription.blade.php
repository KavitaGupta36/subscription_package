@include('subscripton::layouts.header')
<div class="container-fluid">
  <div class="row content">
	@include('subscripton::layouts.sidebar')
    <div class="container">
	    <div class="col-sm-9">
	    	<h2>Add Subscripton</h2>
	    	<hr class="hr-primary">
	    	
	    	<div class="col-sm-9"></div>
	    	<div class="col-sm-3">
	    		<a href="{{ url('subscription') }}" class="btn btn-primary">List</a>
	    	</div>
	    	<div class="box box-warning">
	    	@include('subscripton::layouts.alert')
	    	<form action="{{ route('subscription.store') }}" method="post" enctype="multipart/form-data" name="myForm" id="myForm">
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="title" placeholder="Enter Title..">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description" rows="3"></textarea>
				</div>
				<div class="form-group">
				    <label>Image</label>
				    <input type="file" class="form-control-file" name="thumbnail" id="imgInp">

				    <img src="" width="100" height="100" id="blah">
				</div>
				<div class="form-group">
					<label>Price</label>
					<input type="number" class="form-control" name="price" placeholder="Enter Price..">
				</div>

				<div class="form-row">
				    <div class="form-group col-md-8">
				      <label>Validity</label>
				      <input type="number" class="form-control" name="valid_time" placeholder="Enter Validity duration..">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputState">Validity (Month/Year)</label>
				      	<select name="validity_text" id="validity_text" class="bs-select form-control required" aria-required="true">
							<option value="" selected="selected">Please select</option>
							<option value="day">Day</option>
							<option value="month">Month</option>
							<option value="year">Year</option>
						</select>
				    </div>
				</div>
				<button>Submit</button>
	    	</form>
	    	</div>
	    </div>
	</div>
  </div>
</div>
@include('subscripton::layouts.footer')
<script>
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
		'date': {
			required: true
		},
		'daytime': {
			required: true
		},
	},
	messages: {
		'title': {
            required: "User name is required."  
		},
		'description':{
		  required: "Subscripton name is required.",
        },
        'price': {
            required: "User name is required."  
		},
		'date':{
		  required: "Subscripton name is required.",
        },
        'daytime': {
            required: "User name is required."  
		},
	}
});
</script>