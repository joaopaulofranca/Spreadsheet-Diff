@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

@if(session('deletado'))
<div class="alert alert-success">
    {{session('deletado')}}

</div>
@endif

@if(session('deleteError'))
<div class="alert alert-danger">
    {{session('deleteError')}}
</div>
@endif