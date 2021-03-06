@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible" style="margin-bottom: 0;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session()->pull('error') !!}
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible" style="margin-bottom: 0;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session()->pull('success') !!}
    </div>
@endif
