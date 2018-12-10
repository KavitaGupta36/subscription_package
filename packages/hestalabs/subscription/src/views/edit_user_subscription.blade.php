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
	    	<form action="{{ route('user_subscription.update',$user_subscription->id) }}" method="post" enctype="multipart/form-data" id="myForm">
	    		{{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <input type="hidden" name="user_id" value="{{$user->id}}">
				<div class="form-group">
					<label>User</label>
					<input type="text" class="form-control" value="{{$user->name}}" placeholder="Enter Title.." readonly="">
				</div>
				<div class="form-group">
					<label>Subscription List</label>
					<select class="form-control" name="subscription_id">
						<option value="">Select Subscription</option>
						@foreach($subscription as $value)
							<option value="{{$value->id}}" {{ $user_subscription->subscription_id == $value->id ? 'selected="selected"' : '' }} >{{$value->title}}</option>
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