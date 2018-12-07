@include('subscription::layouts.header')
<div class="container-fluid">
  <div class="row content">
	@include('subscription::layouts.sidebar')
    <div class="container">
	    <div class="col-sm-9">
	    	<h2>Subscripton List</h2>
	    	<hr class="hr-primary">
	    	@include('subscription::layouts.alert')
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
	    	@if(!$subscription->isEmpty())
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
					      	<a class="btn btn-primary" href="{{ route('subscription.edit', $value->id) }}"><i class="fa fa-edit">Edit</i></a> |
					    	<form  action="{{ route('subscription.destroy', $value->id) }}" method="post" style="display: inline-block;">
					    	  	{{ csrf_field() }}
						  		<input name="_method" type="hidden" value="DELETE">
						    	<button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to delete this')">Delete</i></button>
					    	</form>
					      	</td>
					    </tr>
						@endforeach
					</tbody>
		    	</table>
		    	{{ $subscription->links() }} 
		    @else
		    	<div class="col-sm-12">
		            <h4 style="margin-left: 250px; margin-top: 50px">Data not found</h4>
		        </div>
		    @endif
	    </div>
	</div>
  </div>
</div>
@include('subscription::layouts.footer')
