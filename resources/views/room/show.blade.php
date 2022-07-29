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
            <th>name</th>
            <th>email</th>
            <th>Role</th>
            @if(auth()->user()->role=='admin')
                <th>action</th>
            @else
                <th>request</th>
            @endif
        </tr>
        @foreach($room->roomItems as $item)
            <tr>
                <td>room{{$room->no}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->user->email}}</td>
                <td>{{$item->user->role}}</td>

                @if(auth()->user()->role=='admin')
                    <td>

                        <form action="{{route('item.delete',['item'=>$item->id])}}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-group btn-danger" >Delete</button>
                        </form>

                    </td>

                @endif

            </tr>
        @endforeach

    </table>


@endsection
