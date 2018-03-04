@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Hello, {{ $user->name }}</div>

                    <div class="panel-body">
                        <table class="table">
                            <caption>{{ 'todos' }}</caption>
                            {{--как сделать динамическим ?--}}
                            <thead>
                            <tr>
                                <th>Desc</th>
                                <th>Status</th>
                                <th>Username</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($user->todos as $todo)
                                <tr>
                                    <td>
                                        {{ $todo->desc }}
                                    </td>
                                    <td>
                                        @if ($todo->status)
                                            Done
                                        @else
                                            Undone
                                        @endif
                                    </td>
                                    <td>
                                        {{ $todo->user->name }}
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('toggle_status') }}">
                                            {{ csrf_field() }}
                                            {{--@method('PUT')--}}
                                            {{ method_field('PUT') }}
                                            <input type="hidden" name="id" value="{{ $todo->id }}">
                                            <input type="submit" value="Toggle Status" class="btn btn-default">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
