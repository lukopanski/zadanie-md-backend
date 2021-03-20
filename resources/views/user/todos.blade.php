@extends('layouts.app')

@section('title', 'Todos')

@section('content')
<div class="container mx-auto">
    @if(count($todos) > 0)
    @foreach($todos as $todo)
    <div class="row justify-content-center">
        <div class="col col-12 col-md-10 col-lg-8 col-xl-6">
            <div class="card m-3">
                @if($todo->thumbnail_path)
                <img src="{{ asset($todo->thumbnail_path) }}" alt="Thumbnail task image" class="card-img-top img-fluid">
                @endif
                <div class="card-body text-center">
                    <p class="card-text">{{ $todo->task }}</p>
                    @if($todo->finished == true)
                    <p class="card-text text-success">{{ __('Finished!') }}</p>
                    @endif
                    <div class="btn-group">
                        @if($todo->finished == false)
                        <a href="{{ route('todo.edit', ['id' => $todo->id]) }}"
                            class="btn btn-primary m-1">{{ __('Edit') }}</a>
                        <form action="{{ route('todo.finish', ['id' => $todo->id]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-success m-1">
                                {{ __('Finish') }}
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <button type="submit" class="btn btn-danger m-1">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="alert alert-info" role="alert">
        You don't have any tasks!
    </div>
    @endif
</div>
@endsection