<?php

namespace App\Http\Controllers;

use App\Volume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VolumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volumes = Volume::all();
        return view('manage.volumes.index')->with(['volumes' => $volumes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.volumes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required|unique:volumes',
            'status' => 'required',
        ]);

        $volume = new Volume();
        $volume->quantity = $request->quantity;
        $volume->status = $request->status;
        $volume->save();
        Session::flash('success', 'volume added');
        return redirect()->route('volumes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $volume = Volume::findOrFail($id);
        return view('manage.volumes.edit')->with(['volume'=>$volume]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $volume = Volume::findOrFail($id);
        $this->validate($request, [
            'quantity' => 'required',
            'status' => 'required',
        ]);
        $volume->quantity = $request->quantity;
        $volume->status = $request->status;
        $volume->update();
        Session::flash('success', 'volume updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
