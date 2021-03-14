@extends('layouts.app')

@section('title', 'Edit')

@section('content')
<div class="container-fluid text-center">
    <a href="/" class="btn btn-outline-primary">Back</a>
    <div class="row">
        <div class="col col-12 col-md-10 col-lg-8 col-xl-6 offset-md-1 offset-lg-2 offset-xl-3">
            <h1 class="h1 my-5">Edit TODO</h1>
            <form action="/update/{{ $todo->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <input type="text" name="task" value="{{ $todo->task }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <input type="file" name="thumbnail" class="form-control-file" />
                </div>
                <input type="submit" value="Save" class="btn btn-outline-success" />
            </form>
        </div>
    </div>
</div>
@endsection