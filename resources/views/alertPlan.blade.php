@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

@if(session('warning'))
<div class="alert alert-dark">
    {{session('warning')}}
</div>
@endif