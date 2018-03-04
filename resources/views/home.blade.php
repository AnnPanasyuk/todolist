@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <table class="table">
                        <caption>{{ 'todos' }}</caption>
                        <thead>
                            <tr>
                                <th>Desc</th>
                                <th>Status</th>
                                <th>Username</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($lastTodos as $lastTodo)
                            <tr>
                                <td>
                                    {{ $lastTodo->desc }}
                                </td>
                                <td>
                                    {{ $lastTodo->status() }}
                                </td>
                                <td>
                                    <a href="{{ route('users.show', $lastTodo->user->id) }}">{{ $lastTodo->user->name }}</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('toggle_status') }}">
                                        {{ csrf_field() }}
                                        {{--@method('PUT')--}}
                                        {{ method_field('PUT') }}
                                        <input type="hidden" name="id" value="{{ $lastTodo->id }}">
                                        <input type="submit" value="Toggle Status" class="btn btn-default">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--<div class="panel-body">--}}
                    {{--<table class="table">--}}
                        {{--<caption>{{ 'todos' }}</caption>--}}
                         {{--как сделать динамическим ?--}}
                        {{--<thead>--}}
                            {{--<tr>--}}
                               {{--<th>Desc</th>--}}
                               {{--<th>Status</th>--}}
                               {{--<th>Username</th>--}}
                               {{--<th>Actions</th>--}}
                            {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                            {{--@foreach ($todos as $todo)--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--{{ $todo->desc }}--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--{{ $todo->status() }}--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<a href="{{ route('users.show', $todo->user->id) }}">{{ $todo->user->name }}</a>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<form method="POST" action="{{ route('toggle_status') }}">--}}
                                            {{--{{ csrf_field() }}--}}
                                            {{--@method('PUT')--}}
                                            {{--{{ method_field('PUT') }}--}}
                                            {{--<input type="hidden" name="id" value="{{ $todo->id }}">--}}
                                            {{--<input type="submit" value="Toggle Status" class="btn btn-default">--}}
                                        {{--</form>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--{{ $todos->render() }}--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>
@endsection
