@extends('layouts.app')

@section('content')
    <table>
        <tr>
            <th>name</th>
            <th>dormitory</th>
            <th>roomNumber</th>
            <th>createRequest</th>
            <th>status</th>
            <th>action</th>

        </tr>
        @foreach($requests as $req)
            <tr>
                <td>{{$req->user->name}}</td>
                <td>{{$req->room->dormitory->name}}</td>
                <td>room{{$req->room->no}}</td>
                <td>{{$req->created_at}}</td>
                <td>{{$req->confirmation}}</td>
                @if(auth()->user()->role=='admin')
                    <td>

                        <form action="{{route('req.delete',['req'=>$req->id])}}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-group btn-danger" >Delete</button>
                        </form>
                        <form action="{{route('change',['req'=>$req->id])}}" method="post">
                            @csrf
                            @method('put')

                            <button type="submit" class="btn btn-group btn-success">{{__('ChangeStatus')}}</button>
                        </form>

                    </td>
                @endif
            </tr>
        @endforeach

    </table>


@endsection
