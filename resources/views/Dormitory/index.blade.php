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
            @if(auth()->user()->role=='admin')
                <th>action</th>
            @endif
        </tr>
        @foreach($dormitory as $dor)
            <tr>
                <td><a href="{{route('user.Dormitory.show',['dormitory'=>$dor->id])}}"> {{$dor->name}}</a></td>
                <td>{{$dor->user->name}}</td>
                <td>{{$dor->roomNumber}}</td>
                <td>{{$dor->address}}</td>
                <td>{{$dor->telephone}}</td>
                <td>{{$dor->description}}</td>
                @if(auth()->user()->role=='admin')

                    <td>

                        <form action="{{route('Dormitories.destroy',['dormitory'=>$dor->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="room" value="{{$dor->id}}">
                            <button type="submit" class="btn btn-group btn-danger" >Delete</button>
                        </form>
                        <a href="{{route('Dormitories.edit',['dormitory'=>$dor->id])}}" class="btn btn-group btn-success">{{__('Edit')}}</a>
                    </td>
                @endif

            </tr>
        @endforeach

    </table>
    <a style="margin: 0 10% 0 10%;" href="{{route('Dormitories.create')}}" class="btn btn-group btn-success">Create Dormitory</a>


@endsection
