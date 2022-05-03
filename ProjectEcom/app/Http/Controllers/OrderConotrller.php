<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderConotrller extends Controller
{
    //
    private $oders;
    public function __construct(){
     $this ->oders= new Order();
    }
    public function getMostPurchasesProduct(Request $request){
        if(isset($request->orderBy))
        $product=$this ->oders->getMostPurchasesProduct($request->orderBy);
        return response()->success($product);
       }
}
/// nhétadoashdoisa