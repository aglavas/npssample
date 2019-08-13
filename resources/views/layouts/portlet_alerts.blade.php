@if (Session::has('success'))
<div class="alert alert-success alert-dismissible mt-4">
    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
    {!! Session::get('success') !!}
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible mt-4">
    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
    {!! Session::get('error') !!}
</div>
@endif
