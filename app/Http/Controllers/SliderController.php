<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use File;
use Image;
use Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide1 = Slider::find(1);
        $slide2 = Slider::find(2);
        $slide3 = Slider::find(3);

        return view('admin/slider/index', compact('slide1','slide2','slide3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slider::find($id);

        return view('admin/slider/edit',compact('slide'));
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
        $slide = Slider::find($id);

        $slide->top = $request->input('top');
        $slide->bottom = $request->input('bottom');
        
        if ($request->hasFile('slide')) {
            File::delete($slide->slide);
            $image = $request->file('slide');

            $dir_img = true;

            if( ! File::exists('images/slide/')) {
                $dir_img = File::makeDirectory('images/slide/', 0777, true);
            }

            $filename = $id.time().'.'.$image->getClientOriginalExtension();

            $img_path = 'images/slide/' . $filename;

            Image::make($image)->save($img_path);

            $slide->slide = $img_path;
        }
        $slide->save();

        return redirect('admin/slider');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
