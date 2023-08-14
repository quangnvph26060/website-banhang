@if(Session::has('success'))
    <div class="alert alert-primary">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('alert'))
    <div class="alert alert-primary" style="font-weight: 600">
        {{Session::get('alert')}}
    </div>
@endif
