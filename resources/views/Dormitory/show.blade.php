@extends('layouts.app')
@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.requests',['user'=>\Illuminate\Support\Facades\Auth::user()->id])}}">{{ __('Requests') }}</a>
    </li>
@endsection
@section('content')
    <table>
        <tr>
            <th>number</th>
            <th>capacity</th>
            <th>remaining_capacity</th>
            <th>dormitory</th>
            @if(auth()->user()->role=='admin')
                <th>action</th>
            @else
            <th>request</th>
            @endif
        </tr>
        @foreach($dormitory->rooms as $dor)
            <tr>
                <td><a href="{{route('roomshow',['room'=>$dor->id])}}">room{{$dor->no}}</a> </td>
                <td>{{$dor->capacity}}</td>
                <td>{{$dor->remaining_capacity}}</td>
                <td>{{$dormitory->name}}</td>

                    @if(auth()->user()->role=='admin')
                    <td>

                        <form action="{{route('Dormitories.room.destroy',['room'=>$dor->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="room" value="{{$dor->id}}">
                            <button type="submit" class="btn btn-group btn-danger" >Delete</button>
                        </form>
                        <a href="{{route('Dormitories.room.edit',['room'=>$dor->id])}}" class="btn btn-group btn-success">{{__('Edit')}}</a>
                    </td>
                    @else
                    <td>
                    <form action="{{route('user.request.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="room" value="{{$dor->id}}">
                        <button type="submit" class="btn btn-group btn-success" >Request</button>
                    </form>
                    </td>
                @endif

            </tr>
        @endforeach

    </table>
    <a style="margin: 0 10% 0 10%;" href="{{route('Dormitories.room.create',['dormitory'=>$dormitory->id])}}" class="btn btn-group btn-success">Create Room</a>

@endsection
