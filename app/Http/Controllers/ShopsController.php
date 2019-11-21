<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Sale;
use App\Stock;

class ShopsController extends Controller
{
    public function index()
    {
        $products = Product::all();
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

        return view('shop', compact('products','stocks'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id,$qty,$size,$sn)
    {
 		$product = Product::find($id);
        if ($product == NULL) {
          $product = Sale::find($id);
        }

        $myid = $id;
        $id = $id.$size;
        $named = $product->name. '-' .$sn;

        if(!$product) {
 
            abort(404);
 
        }
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first product
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "id" => $myid,
                        "name" => $named,
                        "quantity" => $qty,
                        "size" => $sn,
                        "price" => $product->price,
                        "photo" => $product->thumbnail
                    ]
            ];
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity'] = $cart[$id]['quantity']+$qty;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $myid,
            "name" => $named,
            "size" => $sn,
            "quantity" => $qty,
            "price" => $product->price,
            "photo" => $product->thumbnail
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {

        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success', 'Cart updated successfully');
        }

    }
 
    public function remove(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkstock(Request $request)
    {
        $size = $_GET['size'];
        $amount = $_GET['amount'];
        $id = $_GET['id'];

        $stock = Stock::where('id_product',$id)
                        ->where('size',$size)
                        ->first();

        if ($stock->amount >= $amount) {
            return response()->json(['status'=>'ok']);
        }
        else if($stock->amount < $amount){
            return response()->json(['status'=>'no','size'=>$size,'amount'=>$stock->amount]);
        }
    }
}
