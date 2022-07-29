<?php

namespace App\Http\Controllers;

use App\Models\Request as RequestModel;
use App\Models\Room;
use App\Models\RoomItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests=RequestModel::all();
        return view('requests.index',compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userRequest=Auth::user()->requests->where('room_id',$request->room)->first();
        if(empty($userRequest))
        {
            RequestModel::create([
           'room_id'=>$request->room,
           'user_id'=>Auth::user()->id
                 ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestModel $req)
    {

        if($req->confirmation==0){

            if($req->room->remaining_capacity!=0){
                $req->room->update([
                    'remaining_capacity'=>$req->room->remaining_capacity-1
                ]);
                RoomItem::create([
                    'user_id'=>$req->user_id,
                    'room_id'=>$req->room_id,
                ]);
            }
            $req->update([
                'confirmation'=>1,
            ]);
        }else{
            $room_item=RoomItem::where('room_id','=',$req->room_id)->where('user_id','=',$req->user_id)->first();

            $req->update([
                'confirmation'=>0,
            ]);
            $req->room->update([
                'remaining_capacity'=>$req->room->remaining_capacity+1
            ]);

            if(!empty($room_item)){
                $room_item->delete();
            }
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RequestModel $req)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestModel $req)
    {
        $req->delete();
        return back();
    }
}
