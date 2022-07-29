@extends('layouts.app')
@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.requests',['user'=>\Illuminate\Support\Facades\Auth::user()->id])}}">{{ __('Requests') }}</a>
    </li>
@endsection
@section('content')
    <table>
        <tr>
            <th>name</th>
            <th>dormitory</th>
            <th>roomNumber</th>
            <th>createRequest</th>
            <th>status</th>
        </tr>
        @foreach($user->requests as $req)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$req->room->dormitory->name}}</td>
                <td>room{{$req->room->no}}</td>
                <td>{{$req->created_at}}</td>
                <td>{{$req->confirmation}}</td>

            </tr>
        @endforeach

    </table>


@endsection
