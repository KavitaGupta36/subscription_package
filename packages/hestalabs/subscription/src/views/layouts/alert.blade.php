@if(Session::has('flash_error'))
    <div class="alert alert-danger">
        {{ Session::get('flash_error') }}
    </div>
@endif
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif