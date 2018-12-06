@include('subscripton::layouts.header')
<div class="container-fluid">
  <div class="row content">
  @include('subscripton::layouts.sidebar')
    <div class="container">
      <div class="col-sm-9">
        <h2>User Subscripton List</h2>
        <hr class="hr-primary">  
        @include('subscripton::layouts.alert')
        <div class="col-sm-9">
          <form method="get" action="{{ url('user_subscriptionSearch') }}">
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
          <a href="{{ route('user_subscription.create') }}" class="btn btn-primary">Add</a>
        </div>
        @if($user_subscription)        
          <table class="table table-bordered table-gap">
            <thead>
              <tr>
                <th>S. No.</th>
                <th>User Name</th>
                <th>Subscription Name</th>
                <th>Subscription Start Date</th>
                <th>Subscription End Date</th>
                <th>Status</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
            @foreach($user_subscription as $value)
              <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->user->name}}</td>
                <td>{{$value->subscription->title}}</td>
                <td>{{$value->subscription_start_date}}</td>
                <td>{{$value->subscription_end_date}}</td>
                <td>
                  @if($value->subscription_end_date > date('Y-m-d'))
                    Active
                  @else
                    Expired
                  @endif
                </td>
                <!-- <td>
                  <a href="{{ route('user_subscription.edit', $value->id) }}">Edit</a> |
                  <form  action="{{ route('user_subscription.destroy', $value->id) }}" method="post" style="display: inline-block;">
                      {{ csrf_field() }}
                      <input name="_method" type="hidden" value="DELETE">
                      <button type="submit">Delete</i></button>
                  </form>
                </td> -->
              </tr> 
            @endforeach
            </tbody>
          </table>
          {{ $user_subscription->links() }}
        @else
          <p>Data not found</p>
        @endif
      </div>
  </div>
  </div>
</div>
@include('subscripton::layouts.footer')
