@extends('layouts.app')

@section('content')

    <table>
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>email</th>
            <th>role</th>
            <th>requests</th>

        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td><a href="{{route('admin.user.requests',['user'=>$user->id])}}">requests</a></td>
            </tr>
        @endforeach

    </table>


@endsection
