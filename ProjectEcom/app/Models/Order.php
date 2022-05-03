<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
   
public function getMostPurchasesProduct($orderBy){
    
    $listMostPurchasesProduct= DB::table($this->table)
    ->select( DB::raw('COUNT(orders.product_id) as numberOfProduct'),'product_id','products.name','products.price','products.gallery','products.quantity')  
    ->join('products','products.id','=','orders.product_id')
    ->groupBy('orders.product_id')
    ->orderBy('numberOfProduct',$orderBy)
    ->paginate(3);
   
//    $listMostPurchasesProduct=DB::select('SELECT COUNT(*)  AS numberOfProduct,product_id,products.name,products.price,products.gallery,products.quantity
//    FROM orders
//    JOIN products WHERE products.id=orders.product_id
//    GROUP BY orders.product_id 
//    ORDER BY numberOfProduct DESC')->paginate(3);
  return $listMostPurchasesProduct;
  }
}
