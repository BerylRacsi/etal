<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use App\Order;
use App\Slider;
use App\Cover;
use App\Sale;
use App\Stock;
use App\Contributor;
use File;
use Image;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function filter(Request $request)
    {
        $sort = $_GET['sort'];
        $price = $_GET['price'];
        $color = $_GET['color'];

        $sortArray = explode(',', $sort);
        $column = $sortArray[0];
        $direction = $sortArray[1];

        if ($color == "all" && $price == "all") {
          $filtered = Product::orderby($column,$direction)->get();
        }
        elseif ($color == "all" && $price != "all") {
          $filtered = Product::whereBetween('price',explode(',', $price))
                                ->orderby($column,$direction)
                                ->get();
        }
        elseif ($color != "all" && $price == "all") {
          $filtered = Product::where('color',$color)
                                ->orderby($column,$direction)
                                ->get();
        }
        else {
          $filtered = Product::where('color',$color)
                                ->whereBetween('price',explode(',', $price))
                                ->orderby($column,$direction)
                                ->get();
        }

        $products = $filtered;

        $stocks = Stock::where('amount',0)->get();

        foreach ($products as $product) {
            foreach ($stocks as $stock) {
                if ($product->id == $stock->id_product) {
                    if ($stock->size == "XS") {
                        $product->xs = 2;
                    }
                    elseif ($stock->size == "S") {
                        $product->s = 2;
                    }
                    elseif ($stock->size == "M") {
                        $product->m = 2;
                    }
                    elseif ($stock->size == "L") {
                        $product->L = 2;
                    }
                    elseif ($stock->size == "XL") {
                        $product->xl = 2;
                    }
                    elseif ($stock->size == "NONE") {
                        $product->none = 2;
                    }
                }
            }
        }

        $html = view('ajaxshow')->with(compact('products'))->render();
        return response()->json(['success' => true, 'html' => $html]);

    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = Product::where('name','like',"%".$search."%")
                          ->orWhere('brand','like',"%".$search."%")
                          ->get();

        $stocks = Stock::where('amount',0)->get();

        foreach ($products as $product) {
            foreach ($stocks as $stock) {
                if ($product->id == $stock->id_product) {
                    if ($stock->size == "XS") {
                        $product->xs = 2;
                    }
                    elseif ($stock->size == "S") {
                        $product->s = 2;
                    }
                    elseif ($stock->size == "M") {
                        $product->m = 2;
                    }
                    elseif ($stock->size == "L") {
                        $product->L = 2;
                    }
                    elseif ($stock->size == "XL") {
                        $product->xl = 2;
                    }
                    elseif ($stock->size == "NONE") {
                        $product->none = 2;
                    }
                }
            }
        }

        return view('shop',compact('products'));
    }

    public function index()
    {
        $products = Product::all();
        $slide1 = Slider::find(1);
        $slide2 = Slider::find(2);
        $slide3 = Slider::find(3);

        $men = Cover::find(1);
        $women = Cover::find(2);
        $top = Cover::find(3);
        $bottom = Cover::find(4);
        $accessories = Cover::find(5);

        $stocks = Stock::where('amount',0)->get();

        foreach ($products as $product) {
            foreach ($stocks as $stock) {
                if ($product->id == $stock->id_product) {
                    if ($stock->size == "XS") {
                        $product->xs = 2;
                    }
                    elseif ($stock->size == "S") {
                        $product->s = 2;
                    }
                    elseif ($stock->size == "M") {
                        $product->m = 2;
                    }
                    elseif ($stock->size == "L") {
                        $product->L = 2;
                    }
                    elseif ($stock->size == "XL") {
                        $product->xl = 2;
                    }
                    elseif ($stock->size == "NONE") {
                        $product->none = 2;
                    }
                }
            }
        }
        
        return view('welcome', compact('products','slide1','slide2','slide3','men','women','top','bottom','accessories'));
    }

    public function category($id)
    {
          if ($id == 1) {
            $products = Product::where('gender','men')->get();
          }
          elseif($id == 2) {
            $products = Product::where('gender','women')->get();
          }
          elseif($id == 3) {
            $products = Product::where('category','top')->get();
          }
          elseif($id == 4) {
            $products = Product::where('category','bottom')->get();
          }
          elseif($id == 5) {
            $products = Product::where('category','accessories')->get();
          }
          elseif($id == 6) {

            $products = Sale::all();

            $stocks = Stock::where('amount',0)->get();

            foreach ($products as $product) {
                foreach ($stocks as $stock) {
                    if ($product->id == $stock->id_product) {
                        if ($stock->size == "XS") {
                            $product->xs = 2;
                        }
                        elseif ($stock->size == "S") {
                            $product->s = 2;
                        }
                        elseif ($stock->size == "M") {
                            $product->m = 2;
                        }
                        elseif ($stock->size == "L") {
                            $product->L = 2;
                        }
                        elseif ($stock->size == "XL") {
                            $product->xl = 2;
                        }
                        elseif ($stock->size == "NONE") {
                            $product->none = 2;
                        }
                    }
                }
            }

            return view('sale',compact('products'));
          }

          $stocks = Stock::where('amount',0)->get();

          foreach ($products as $product) {
              foreach ($stocks as $stock) {
                  if ($product->id == $stock->id_product) {
                      if ($stock->size == "XS") {
                          $product->xs = 2;
                      }
                      elseif ($stock->size == "S") {
                          $product->s = 2;
                      }
                      elseif ($stock->size == "M") {
                          $product->m = 2;
                      }
                      elseif ($stock->size == "L") {
                          $product->L = 2;
                      }
                      elseif ($stock->size == "XL") {
                          $product->xl = 2;
                      }
                      elseif ($stock->size == "NONE") {
                          $product->none = 2;
                      }
                  }
              }
          }

          return view('shop',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get Data Provinsi
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 76c4dd24a07a802f8737897331e26d33"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);


        
        return view('billing',compact('response'));
    }

    public function kabupaten(Request $request)
    {
        $provinsi_id = $_GET['prov_id'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$provinsi_id",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 76c4dd24a07a802f8737897331e26d33"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          //echo $response;
        }

        $data = json_decode($response, true);
        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
            echo "<option value='".$data['rajaongkir']['results'][$i]['city_name']."' data-id='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
        }
    }

    public function ongkir(Request $request)
    {
        $asal = $_POST['asal'];
        $id_kabupaten = $_POST['kab_id'];
        $kurir = $_POST['kurir'];
        $berat = $_POST['berat'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 76c4dd24a07a802f8737897331e26d33"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
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
        $orders = new Order;
        $orders->order_number = date("dmhis",time()).mt_rand(100,999);
        $orders->name = $request->input('name');
        $orders->provinsi = $request->input('provinsi');
        $orders->kabupaten = $request->input('kabupaten');
        $orders->kecamatan = $request->input('kecamatan');
        $orders->address = $request->input('address');
        $orders->zip = $request->input('zip');
        $orders->phone = $request->input('phone');
        $orders->email = $request->input('email');
        $orders->note = $request->input('note');
        $orders->order = $request->input('order');
        $orders->product_detail = $request->input('product_detail');
        $orders->validasi = 0;
        $orders->harga= $request->input('harga');

        $orders->save();

        $cart=session()->flush('cart');

        return redirect()->action('PagesController@confirm',['id' => $orders->order_number]);
    }

    public function confirm(Request $request, $id)
    {
        $orders = Order::where('order_number',$id)->first();

        return view('order',compact('orders'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'bukti' => 'required',
            'bukti.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $order_id = $request->input('order_number');

        $image_db = Order::where('order_number',$order_id)->first();

        if ($request->hasFile('bukti')) {
            $image = $request->file('bukti');

            $dir_img = true;

            if( ! File::exists('images/bukti/')) {
                $dir_img = File::makeDirectory('images/bukti/', 0777, true);
            }

            $filename = $order_id.time().'.'.$image->getClientOriginalExtension();

            $img_path = 'images/bukti/' . $filename;

            Image::make($image)->save($img_path);

            $image_db->bukti = $img_path;
            $image_db->save();

        }

        return redirect('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $products = Product::find($id);
        if ($products == NULL) {
          $products = Sale::find($id);
        }

        $stocks = Stock::where('id_product',$id)->get();

        foreach($stocks as $stock){
          if ($stock->size == "XS") {
            $stock->value = 1;
          }
          elseif ($stock->size == "S") {
            $stock->value = 2;
          }
          elseif ($stock->size == "M") {
            $stock->value = 3;
          }
          elseif ($stock->size == "L") {
            $stock->value = 4;
          }
          elseif ($stock->size == "XL") {
            $stock->value = 5;
          }
          elseif ($stock->size == "NONE") {
            $stock->value = 6;
          }
        }

        //dd($stocks);

        return view('detail',compact('products','stocks'));
    }

    public function cekstatus(Request $request)
    {
        $nomor = $request->input('cekorder');

        $orders = Order::where('order_number',$nomor)->first();
        if (is_null($orders)) {
          return back()->with('status', 'Nomor pesanan tidak ditemukan');
        }
        if ($orders->bukti === NULL) {
          return redirect()->action('PagesController@confirm',['id' => $orders->order_number]);
        }
        if ($orders->resi === NULL) {
          return view('cekstatus');
        }
        else {
          return view('cekstatus',compact('orders'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function contributors()
    {
      $contributors = Contributor::all();

      return view('contributor-index',compact('contributors'));
    }

    public function contributors_show(Request $request, $id)
    {
      $contributor = Contributor::find($id);

      return view('contributor-detail',compact('contributor'));
    }

    public function about()
    {
      return view('about');
    }

    public function contact()
    {
      return view('contact');
    }

    public function info()
    {
      return view('info');
    }
}
