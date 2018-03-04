
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('todos.store') }}">
                    {{ csrf_field() }}
                    <input name="desc" required type="text" class="form-control" value="{{ $todo->desc }}">
                    <input type="submit" value="Create !" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
@endsection