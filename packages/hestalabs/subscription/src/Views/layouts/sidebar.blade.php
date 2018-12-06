<div class="col-sm-3 sidenav">
  <h4>Subscripton Admin</h4>
  <ul class="nav nav-pills nav-stacked">
    <!-- <li class="active"><a href="/subscription">Subscription</a></li> -->
    <li class="{{ request()->is('subscription*') ? 'active' : '' }}"><a href="{{ url('subscription') }}">Subscription</a></li>
    <li class="{{ request()->is('user_subscription*') ? 'active' : '' }}"><a href="{{ url('user_subscription') }}">User Subscription</a></li>
  </ul>
</div>