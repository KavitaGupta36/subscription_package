@include('subscripton::layouts.header')
<div class="container-fluid">
  <div class="row content">
	@include('subscripton::layouts.sidebar')
    <div class="container">
	    <div class="col-sm-9">
	    	<h2>Subscripton List</h2>
	    	<hr class="hr-primary">
	    	@include('subscripton::layouts.alert')
	    	<div class="col-sm-9">
	    		<form method="get" action="{{ url('subscriptionSearch') }}">
	    		{{ csrf_field() }}
	    			<div class="col-sm-6">
	    				<input class="form-control" type="text" name="search" placeholder="Search...">
	    			</div>
	    			<div class="col-sm-6">
	    				<button class="btn btn-primary">Search</button>
	    			</div>
	    		</form>
	    	</div>
	    	<div class="col-sm-3">
	    		<a href="{{ route('subscription.create') }}" class="btn btn-primary">Add</a>
	    	</div>
	    	@if($subscription)
		    	<table class="table table-bordered table-gap">
		    	  <thead>
		    	    <tr>
		    	      <th>S. No.</th>
		    	      <th>Subscription Name</th>
		    	      <th>Description</th>
		    	      <th>Price</th>
		    	      <th>Validity</th>
		    	      <th>Action</th>
		    	    </tr>
		    	  </thead>
		    	  <tbody>
		    	    @foreach($subscription as $value)
			    	    <tr>
			    	      <td>{{$value->id}}</td>
			    	      <td>{{$value->title}}</td>
			    	      <td>{{$value->description}}</td>
			    	      <td>{{$value->price}}</td>
			    	      <td>{{$value->valid_time}} {{$value->validity_text}}</td>
			    	      <td>
			    	      	<a href="{{ route('subscription.edit', $value->id) }}">Edit</a> |
			    	    	<form  action="{{ route('subscription.destroy', $value->id) }}" method="post" style="display: inline-block;">
			    	    	  	{{ csrf_field() }}
		    	    	  		<input name="_method" type="hidden" value="DELETE">
		    	    	    	<button type="submit">Delete</i></button>
			    	    	</form>
			    	      </td>
			    	    </tr>
		    	    @endforeach
		    	  </tbody>
		    	</table>
		    	{{ $subscription->links() }} 
		    @else
		    	<p>No data found</p>
		    @endif
	    </div>
	</div>
  </div>
</div>
@include('subscripton::layouts.footer')
