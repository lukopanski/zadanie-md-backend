@auth
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
</div>
@elseif($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
@endforeach
@endif
@endauth