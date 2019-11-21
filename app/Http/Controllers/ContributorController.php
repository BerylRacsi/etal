<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Contributor;
use Auth;
use File;
use Image;
use Storage;

class ContributorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        /*$this->middleware('role:ROLE_ADMIN');*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $contributor = Contributor::where('user_id',$user->id)->first();
        if($contributor == NULL){
            return view('contributor/create');
        }
        else{
            return view('contributor/index',compact('user','contributor'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $contributor = new Contributor;

        $contributor->user_id  = $user->id;
        $contributor->name = $request->input('name');
        $contributor->instagram = $request->input('instagram');
        $contributor->twitter = $request->input('twitter');
        $contributor->linkedin = $request->input('linkedin');

        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');

            $dir_img = true;

            if( ! File::exists('images/contributor/profile/')) {
                $dir_img = File::makeDirectory('images/contributor/profile/', 0777, true);
            }

            $filename = rand(1111,9999).time().'.'.$profile->getClientOriginalExtension();

            $img_path = 'images/contributor/profile/' . $filename;

            Image::make($profile)
                ->fit(640,640,function($constraint){
                    $constraint->upsize();
                })
                ->save($img_path);

            $contributor->profile = $img_path;
        }

        if ($request->hasFile('image')) {
            $images = $request->file('image');
 
            //setting flag for condition
            $org_img = true;

            $path = [];
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/contributor/images/')) {
                $org_img = File::makeDirectory('images/contributor/images/', 0777, true);
            }

            // loop through each image to save and upload
            foreach($images as $key => $image) {
                
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/contributor/images/' . $filename;

                $path[$key] = $org_path;

                if (($org_img ) == true) {
                   Image::make($image)->fit(1920, 1080, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                }

            }

        }
        $stringpath = implode(',', $path);
        $contributor->image = $stringpath;

        $contributor->description = $request->input('description');
        $contributor->save();

        return redirect('contributor');
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $contributor = Contributor::find($id);

        return view('contributor/edit',compact('contributor'));
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
        $contributor = Contributor::find($id);

        $contributor->name = $request->input('name');
        $contributor->instagram = $request->input('instagram');
        $contributor->twitter = $request->input('twitter');
        $contributor->linkedin = $request->input('linkedin');

        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');

            File::delete($contributor->profile);

            $dir_img = true;

            if( ! File::exists('images/contributor/profile/')) {
                $dir_img = File::makeDirectory('images/contributor/profile/', 0777, true);
            }

            $filename = rand(1111,9999).time().'.'.$profile->getClientOriginalExtension();

            $img_path = 'images/contributor/profile/' . $filename;

            Image::make($profile)
                ->fit(640,640,function($constraint){
                    $constraint->upsize();
                })
                ->save($img_path);

            $contributor->profile = $img_path;
        }

        if ($request->hasFile('image')) {
            $images = $request->file('image');

            $imagearray = explode(',', $contributor->image);
                foreach ($imagearray as $image) {
                File::delete($image);
            }
 
            //setting flag for condition
            $org_img = true;

            $path = [];
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/contributor/images/')) {
                $org_img = File::makeDirectory('images/contributor/images/', 0777, true);
            }

            // loop through each image to save and upload
            foreach($images as $key => $image) {
                
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/contributor/images/' . $filename;

                $path[$key] = $org_path;

                if (($org_img ) == true) {
                   Image::make($image)->fit(1920, 1080, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                }

            }

        $stringpath = implode(',', $path);
        $contributor->image = $stringpath;
        }

        $contributor->description = $request->input('description');
        $contributor->save();

        return redirect('contributor');
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
