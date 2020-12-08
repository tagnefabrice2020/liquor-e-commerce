<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::paginate(10);
        return view('manage.carousels.index')->with(['carousels' => $carousels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.carousels.create');
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
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image_url' => 'required'
        ]);
        $carousel = new Carousel;
        $carousel->name = $request->name;
        $carousel->description = $request->description;
        $carousel->status = $request->status;
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/carousel/'.$filename);
            Image::make($image)->resize('1200', '300')->save($location);
            $carousel->image_url = 'images/carousel/'.$filename;
        }
        $carousel->save();
        Session::flash('success', 'carousel created');
        return redirect()->route('carousels.index');
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
        $carousel = Carousel::findOrFail($id);
        return view('manage.carousels.edit')->with(['carousel' => $carousel]);
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
        // dd(1);
        $carousel = Carousel::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image_url' => 'required'
        ]);
        
        $carousel->name = $request->name;
        $carousel->description = $request->description;
        $carousel->status = $request->status;
        if(file_exists($carousel->image_url)) {
            unlink($carousel->image_url);
        }
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/carousel/'.$filename);
            Image::make($image)->resize('1200', '300')->save($location);
            $path = 'images/carousel/'.$filename;
            $carousel->image_url = $path;
        }
        // dd($path);
        $carousel->update();

        Session::flash('success', 'carousel updated');
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
