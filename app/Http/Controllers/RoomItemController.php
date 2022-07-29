<?php

namespace App\Http\Controllers;

use App\Models\RoomItem;
use Illuminate\Http\Request;

class RoomItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomItem  $roomItem
     * @return \Illuminate\Http\Response
     */
    public function show(RoomItem $roomItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomItem  $roomItem
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomItem $roomItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomItem  $roomItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomItem $roomItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomItem  $roomItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomItem $item)
    {
        $item->delete();
        return back();
    }
}
