@extends('layouts.app')

@section('title', 'Main')

@section('content')
<div class="container-fluid text-center">
    <a href="/add" class="btn btn-outline-primary">Add new task...</a>
</div>
<div class="container mx-auto mt-5">
    @foreach($todos as $todo)
    <div class="row">
        <div class="col col-12 col-md-10 col-lg-8 col-xl-6 offset-md-1 offset-lg-2 offset-xl-3">
            <div class="card m-3">
                @if($todo->thumbnail_path)
                <img src="{{ asset($todo->thumbnail_path) }}" alt="Thumbnail task image" class="card-img-top img-fluid">
                @endif
                <div class="card-body text-center">
                    <p class="card-text">{{ $todo->task }}</p>
                    @if($todo->finished == true)
                    <p class="card-text text-success">FINISHED!</p>
                    @endif
                    <div class="btn-group">
                        @if($todo->finished == false)
                        <a href="{{ asset('/edit/' . $todo->id) }}" class="btn btn-outline-primary m-1">Edit</a>
                        <form action="/finish/{{ $todo->id }}" method="get">
                            <input type="submit" value="Finish" class="btn btn-outline-success m-1">
                        </form>
                        @endif
                        <form action="/delete/{{ $todo->id }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <input type="submit" value="Delete" class="btn btn-outline-danger m-1">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection