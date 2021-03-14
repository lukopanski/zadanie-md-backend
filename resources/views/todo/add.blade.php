@extends('layouts.app')

@section('title', 'Add')

@section('content')
<div class="container-fluid text-center">
    <a href="/" class="btn btn-outline-primary">Back</a>
    <div class="row">
        <div class="col col-12 col-md-10 col-lg-8 col-xl-6 offset-md-1 offset-lg-2 offset-xl-3">
            <h1 class="h1 my-5">Add TODO</h1>
            <form action="/create" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" name="task" class="form-control" />
                </div>
                <input type="submit" value="Add" class="btn btn-outline-success" />
            </form>
        </div>
    </div>
</div>
@endsection