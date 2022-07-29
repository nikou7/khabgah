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
        <th>Admin</th>
        <th>roomNumber</th>
        <th>address</th>
        <th>telephone</th>
        <th>description</th>

    </tr>
    @foreach($dormitory as $dor)
        <tr>
            <td><a href="{{route('user.Dormitory.show',['dormitory'=>$dor->id])}}"> {{$dor->name}}</a></td>
            <td>{{$dor->user->name}}</td>
            <td>{{$dor->roomNumber}}</td>
            <td>{{$dor->address}}</td>
            <td>{{$dor->telephone}}</td>
            <td>{{$dor->description}}</td>
        </tr>
    @endforeach

</table>


@endsection
