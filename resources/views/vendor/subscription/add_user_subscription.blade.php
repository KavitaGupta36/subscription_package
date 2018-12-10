@include('subscription::layouts.header')
<div class="container-fluid">
  <div class="row content">
	@include('subscription::layouts.sidebar')
    <div class="container">
	    <div class="col-sm-9">
	    	<h2>Add Subscripton</h2>
	    	<hr class="hr-primary">
	    	
	    	<div class="col-sm-9"></div>
	    	<div class="col-sm-3">
	    		<a href="{{ url('user_subscription') }}" class="btn btn-primary">List</a>
	    	</div>
	    	@include('subscription::layouts.alert')
	    	<form action="{{ route('user_subscription.store') }}" method="post" id="myForm">
				<div class="form-group">
					<label>User</label>
					<select class="form-control" name="user_id">
						<option value="">Select User</option>
						@foreach($user as $val)
							<option value="{{$val->id}}">{{$val->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Subscription List</label>
					<select class="form-control" name="subscription_id">
						<option value="">Select Subscription</option>
						@foreach($subscription as $value)
							<option value="{{$value->id}}">{{$value->title}}</option>
						@endforeach
					</select>
				</div>
				<button>Submit</button>
	    	</form>
	    </div>
	</div>
  </div>
</div>
@include('subscription::layouts.footer')
<script>
$("#myForm").validate({ 
	rules: {
		'user_id': {
			required: true
		}, 
		'subscription_id': {
			required: true
		},
	},
	messages: {
		'user_id': {
            required: "User name is required."  
		},
		'subscription_id':{
		  	required: "Subscripton name is required.",
        },
	}
});
</script>
