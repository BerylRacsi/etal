<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Stock;
use File;
use Image;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::all();
        $stocks = Stock::all();

        return view('admin/product/index', compact('products','stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin/product/create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $latestOrder = Product::orderBy('created_at','DESC')->first();

        $products = new Product;

        if (is_null($latestOrder)) {
            $products->id = 1;
        }
        else {
            $products->id = $latestOrder->id+1;
        }

        $products->name = $request->input('name');
        $products->brand = $request->input('brand');
        $products->category = $request->input('category');
        $pricefixed = str_replace(',', '',$request->input('price'));
        $products->price = $pricefixed;
        $products->description = $request->input('description');


        if ($request->has('xs')){
            $products->xs = $request->input('xs');

            $stockxs = new Stock;
            $stockxs->id_product = $products->id;
            $stockxs->size = "XS";
            $stockxs->amount = $request->input('stockXS');
            $stockxs->save();
        }
        else {
            $products->xs = '0';
        }

        if ($request->has('s')){
            $products->s = $request->input('s');

            $stocks = new Stock;
            $stocks->id_product = $products->id;
            $stocks->size = "S";
            $stocks->amount = $request->input('stockS');
            $stocks->save();
        }
        else {
            $products->s = '0';
        }

        if ($request->has('m')){
            $products->m = $request->input('m');

            $stockm = new Stock;
            $stockm->id_product = $products->id;
            $stockm->size = "M";
            $stockm->amount = $request->input('stockM');
            $stockm->save();
        }
        else {
            $products->m = '0';
        }

        if ($request->has('l')){
            $products->l = $request->input('l');

            $stockl = new Stock;
            $stockl->id_product = $products->id;
            $stockl->size = "L";
            $stockl->amount = $request->input('stockL');
            $stockl->save();
        }
        else {
            $products->l = '0';
        }

        if ($request->has('xl')){
            $products->xl = $request->input('xl');

            $stockxl = new Stock;
            $stockxl->id_product = $products->id;
            $stockxl->size = "XL";
            $stockxl->amount = $request->input('stockXL');
            $stockxl->save();
        }
        else {
            $products->xl = '0';
        }

        if ($request->has('none')){
            $products->none = $request->input('none');

            $stocknone = new Stock;
            $stocknone->id_product = $products->id;
            $stocknone->size = "NONE";
            $stocknone->amount = $request->input('stockNONE');
            $stocknone->save();
        }
        else {
            $products->none = '0';
        }
        $products->color = $request->input('color');
        $products->gender = $request->input('gender');

        if ($request->hasFile('image')) {
            $images = $request->file('image');
 
            //setting flag for condition
            $org_img = $thm_img = true;
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/originals/')) {
                $org_img = File::makeDirectory('images/originals/', 0777, true);
            }
            if ( ! File::exists('images/thumbnails/')) {
                $thm_img = File::makeDirectory('images/thumbnails', 0777, true);
            }
            
            $path1 = [];

            $filename_thm = rand(1111,9999).time().'.'.$images[0]->getClientOriginalExtension();
            $thm_path = 'images/thumbnails/' . $filename_thm;

            Image::make($images[0])->fit(1200, 1486, function ($constraint) {
                       $constraint->upsize();
                   })->save($thm_path);

            // loop through each image to save and upload
            foreach($images as $key => $image) {

                
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/originals/' . $filename;
 
                $path1[$key] = $org_path; 

                if (($org_img && $thm_img) == true) {
                   Image::make($image)->fit(1200, 1486, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                }

            }

        }
        $stringpath1 = implode(',', $path1);

        $products->image = $stringpath1;
        $products->thumbnail = $thm_path;

        if ($request->hasFile('sizeguide')) {
            $image = $request->file('sizeguide');

            $dir_img = true;

            if( ! File::exists('images/sizeguide/')) {
                $dir_img = File::makeDirectory('images/sizeguide/', 0777, true);
            }

            //get file name of image  and concatenate with 4 random integer for unique
            $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();

            
            $img_path = 'images/sizeguide/' . $filename;

            Image::make($image)->save($img_path);

            $products->sizeguide = $img_path;
        }

        $type = $request->input('fitguide');

        switch ($type) {
            case "1":
                $products->fitguide = "images/fitguide/tshirtm.png";
                break;
            case "2":
                $products->fitguide = "images/fitguide/hoodiem.png";
                break;
            case "3":
                $products->fitguide = "images/fitguide/zipperm.png";
                break;
            case "4":
                $products->fitguide = "images/fitguide/sweatm.png";
                break;
            case "5":
                $products->fitguide = "images/fitguide/shirtm.png";
                break;
            case "6":
                $products->fitguide = "images/fitguide/longm.png";
                break;
            case "7":
                $products->fitguide = "images/fitguide/shortm.png";
                break;
            case "8":
                $products->fitguide = "images/fitguide/tshirtf.png";
                break;
            case "9":
                $products->fitguide = "images/fitguide/hoodief.png";
                break;
            case "10":
                $products->fitguide = "images/fitguide/zipperf.png";
                break;
            case "11":
                $products->fitguide = "images/fitguide/sweatf.png";
                break;
            case "12":
                $products->fitguide = "images/fitguide/shirtf.png";
                break;
            case "13":
                $products->fitguide = "images/fitguide/longf.png";
                break;
            case "14":
                $products->fitguide = "images/fitguide/shortf.png";
                break;
            default:
                $products->fitguide = NULL;
        }

        $products->save();

        return redirect('/admin/product');
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        $stocks = Stock::where('id_product',$id)->get();

        return view('admin.product.show',compact('products','stocks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $products = Product::find($id);
        $stocks = Stock::where('id_product',$id)->get();

        return view('admin.product.edit',compact('products','stocks'));
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
        $products = Product::find($id);
        $products->name = $request->input('name');
        $products->brand = $request->input('brand');
        $products->category = $request->input('category');
        $pricefixed = str_replace(',', '',$request->input('price'));
        $products->price = $pricefixed;
        $products->description = $request->input('description');

        if ($request->has('xs')){
            $products->xs = $request->input('xs');

            $stockxs = Stock::where('id_product',$id)->where('size','XS')->first();
            if ($stockxs == NULL) {
                $stockxs = new Stock;
            }
            $stockxs->id_product = $products->id;
            $stockxs->size = "XS";
            $stockxs->amount = $request->input('stockXS');
            $stockxs->save();
        }
        else {
            $products->xs = '0';
        }
        if ($request->has('s')){
            $products->s = $request->input('s');

            $stocks = Stock::where('id_product',$id)->where('size','S')->first();
            if ($stocks == NULL) {
                $stocks = new Stock;
            }
            $stocks->id_product = $products->id;
            $stocks->size = "S";
            $stocks->amount = $request->input('stockS');
            $stocks->save();
        }
        else {
            $products->s = '0';
        }
        if ($request->has('m')){
            $products->m = $request->input('m');

            $stockm = Stock::where('id_product',$id)->where('size','M')->first();
            if ($stockm == NULL) {
                $stockm = new Stock;
            }
            $stockm->id_product = $products->id;
            $stockm->size = "M";
            $stockm->amount = $request->input('stockM');
            $stockm->save();
        }
        else {
            $products->m = '0';
        }
        if ($request->has('l')){
            $products->l = $request->input('l');

            $stockl = Stock::where('id_product',$id)->where('size','L')->first();
            if ($stockl == NULL) {
                $stockl = new Stock;
            }
            $stockl->id_product = $products->id;
            $stockl->size = "L";
            $stockl->amount = $request->input('stockL');
            $stockl->save();
        }
        else {
            $products->l = '0';
        }
        if ($request->has('xl')){
            $products->xl = $request->input('xl');

            $stockxl = Stock::where('id_product',$id)->where('size','XL')->first();
            if ($stockxl == NULL) {
                $stockxl = new Stock;
            }
            $stockxl->id_product = $products->id;
            $stockxl->size = "XL";
            $stockxl->amount = $request->input('stockXL');
            $stockxl->save();
        }
        else {
            $products->xl = '0';
        }
        if ($request->has('none')){
            $products->none = $request->input('none');

            $stocknone = Stock::where('id_product',$id)->where('size','NONE')->first();
            $stocknone->id_product = $products->id;
            $stocknone->size = "NONE";
            $stocknone->amount = $request->input('stockNONE');
            $stocknone->save();
        }
        else {
            $products->none = '0';
        }
        $products->color = $request->input('color');
        $products->gender = $request->input('gender');

        if ($request->hasFile('image')) {

            $imagearray = explode(',', $products->image);
                foreach ($imagearray as $image) {
                File::delete($image);
            }

            File::delete($products->thumbnail);

            $images = $request->file('image');
 
            //setting flag for condition
            $org_img = $thm_img = true;
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/originals/')) {
                $org_img = File::makeDirectory('images/originals/', 0777, true);
            }
            if ( ! File::exists('images/thumbnails/')) {
                $thm_img = File::makeDirectory('images/thumbnails', 0777, true);
            }
            
            $path1 = [];

            $filename = rand(1111,9999).time().'.'.$images[0]->getClientOriginalExtension();
            $thm_path = 'images/thumbnails/' . $filename;

            Image::make($images[0])->fit(1200, 1486, function ($constraint) {
                       $constraint->upsize();
                   })->save($thm_path);

            // loop through each image to save and upload
            foreach($images as $key => $image) {

                
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/originals/' . $filename;
                
 
                $path1[$key] = $org_path;

                if (($org_img && $thm_img) == true) {
                   Image::make($image)->fit(1200, 1486, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                }

            }

        $stringpath1 = implode(',', $path1);

        $products->image = $stringpath1;
        $products->thumbnail = $thm_path;
        }

        if ($request->hasFile('sizeguide')) {
            File::delete($products->sizeguide);
            $image = $request->file('sizeguide');

            $dir_img = true;

            if( ! File::exists('images/sizeguide/')) {
                $dir_img = File::makeDirectory('images/sizeguide/', 0777, true);
            }

            //get file name of image  and concatenate with 4 random integer for unique
            $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();

            
            $img_path = 'images/sizeguide/' . $filename;

            Image::make($image)->save($img_path);

            $products->sizeguide = $img_path;
        }

        $type = $request->input('fitguide');

        switch ($type) {
            case "1":
                $products->fitguide = "images/fitguide/tshirtm.png";
                break;
            case "2":
                $products->fitguide = "images/fitguide/hoodiem.png";
                break;
            case "3":
                $products->fitguide = "images/fitguide/zipperm.png";
                break;
            case "4":
                $products->fitguide = "images/fitguide/sweatm.png";
                break;
            case "5":
                $products->fitguide = "images/fitguide/shirtm.png";
                break;
            case "6":
                $products->fitguide = "images/fitguide/longm.png";
                break;
            case "7":
                $products->fitguide = "images/fitguide/shortm.png";
                break;
            case "8":
                $products->fitguide = "images/fitguide/tshirtf.png";
                break;
            case "9":
                $products->fitguide = "images/fitguide/hoodief.png";
                break;
            case "10":
                $products->fitguide = "images/fitguide/zipperf.png";
                break;
            case "11":
                $products->fitguide = "images/fitguide/sweatf.png";
                break;
            case "12":
                $products->fitguide = "images/fitguide/shirtf.png";
                break;
            case "13":
                $products->fitguide = "images/fitguide/longf.png";
                break;
            case "14":
                $products->fitguide = "images/fitguide/shortf.png";
                break;
            default:
                $products->fitguide = NULL;
        }

        $products->save();

        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $stock = Stock::where('id_product',$id);

        $imagearray = explode(',', $product->image);
        foreach ($imagearray as $image) {
            File::delete($image);
        }
        
        File::delete($product->thumbnail);
        File::delete($product->sizeguide);
        $stock->delete();
        $product->delete();
        return redirect('admin/product')->with('status', 'Product Removed!');
    }
}
