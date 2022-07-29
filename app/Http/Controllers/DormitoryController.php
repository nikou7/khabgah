<?php

namespace App\Http\Controllers;

use App\Models\Dormitory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DormitoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dormitory=Dormitory::all();
        return view('Dormitory.index',compact('dormitory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dormitory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Dormitory::create([
                'name'=>$request->name,
                'user_id'=>Auth::user()->id,
                'roomNumber'=>$request->roomNumber,
                'address'=>$request->address,
                'telephone'=>$request->telephone,
                'description'=>$request->description,
            ]);
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function show(Dormitory $dormitory)
    {

        return view('Dormitory.show',compact('dormitory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function edit(Dormitory $dormitory)
    {
        return view('Dormitory.edit',compact('dormitory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dormitory $dormitory)
    {
        $dormitory->update([
            'name'=>$request->name,
            'roomNumber'=>$request->roomNumber,
            'address'=>$request->address,
            'telephone'=>$request->telephone,
            'description'=>$request->description,
        ]);
//        $dormitory->save();
        return redirect(route('admin.Dormitories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dormitory $dormitory)
    {
        $dormitory->delete();
        return back();
    }
}
