<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    // 
    public function __construct()
    {
        $this->products = new Product();
    }
    function index()
    {


        $products = Product::all();

        return view('product', compact('products'));
    }

    function productDetail($id)
    {
        $productDetail = Product::find($id);
        return view('detail', compact('productDetail'));
    }
    function addToCart(REQUEST $request)
    {
        if ($request->session()->has('user')) {
            $cart= new Cart;
            $cart->user_id=$request->session()->get('user')['id'];
            
            $cart->product_id=$request->product_id;
            $cart->save();
            return redirect('/');
        }
        else {
            return redirect('/login');
        }}
         static function cartItem ()
         {
            
            // $user_id=Session::get('user')['id'];
            
            // return Cart:: where('user_id', $user_id)->count();
        }
    }

