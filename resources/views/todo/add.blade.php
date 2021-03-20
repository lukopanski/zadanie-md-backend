@extends('layouts.app')

@section('title', 'Add')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new task') }}</div>

                <div class="card-body">
                    <form action="{{ route('todo.create') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="task" class="col-md-4 col-form-label text-md-right">{{ __('Task') }}</label>
                            <div class="col-md-6">
                                <textarea id="task" name="task" class="form-control" rows="3" maxlength="50"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection