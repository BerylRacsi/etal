<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cover;
use File;
use Image;
use Storage;

class CoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $men = Cover::find(1);
        $women = Cover::find(2);
        $top = Cover::find(3);
        $bottom = Cover::find(4);
        $accessories = Cover::find(5);

        return view('admin/cover/index', compact('men','women','top','bottom','accessories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cover = Cover::find($id);

        return view('admin/cover/edit',compact('cover'));
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
        $cover = Cover::find($id);
        
        if ($request->hasFile('cover')) {
            File::delete($cover->cover);
            $image = $request->file('cover');

            $dir_img = true;

            if( ! File::exists('images/cover/')) {
                $dir_img = File::makeDirectory('images/cover/', 0777, true);
            }

            if($cover->id === 1){
                $filename = 'men.'.$image->getClientOriginalExtension();
            }
            elseif($cover->id === 2){
                $filename = 'women.'.$image->getClientOriginalExtension();
            }
            elseif($cover->id === 3){
                $filename = 'top.'.$image->getClientOriginalExtension();
            }
            elseif($cover->id === 4){
                $filename = 'bottom.'.$image->getClientOriginalExtension();
            }
            elseif($cover->id === 5){
                $filename = 'accessories.'.$image->getClientOriginalExtension();
            }

            
            $img_path = 'images/cover/' . $filename;

            Image::make($image)->save($img_path);

            $cover->cover = $img_path;
        }
        $cover->save();

        return redirect('admin/cover');
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
