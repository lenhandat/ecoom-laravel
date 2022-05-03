<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
  use HasFactory;

  protected $productTable = 'products';
  public $timestamps=false;
  protected $fillable=['name','price','description','gallery','quantity','created_by','quantitative'];
  // public function getAllProduct()
  // {
    
  //   $data = DB::table($this->productTable)
  //     ->join('products_categories', 'products_categories.product_id', '=', 'product.id')
      
  //     ->select('product.*', 'category.name as category_name'  )
  //     ->get();
  //   return $data;
  // }
  // public function getProductDetail($id){
    
  //   $data=DB::table($this->productTable)
  //   ->select('*')
  //   ->where('id','=',[$id])
  //   ->get();
  //   return $data;
  //  }
  public function getNewest(){
      $listNewestProduct = DB::table($this->productTable)         
      ->select('name','price','description','gallery','quantity' ,'quantitative','created_at' )
      ->orderByDesc('created_at')
      ->paginate(3);
      
    return $listNewestProduct;
  }
  public function getDescendingPriceProduct(){
    $listDescending = DB::table($this->productTable)         
    ->select('name','price','description','gallery','quantity' ,'quantitative','created_at' )
    ->orderByDesc('price')
    ->paginate(3);
    
  return $listDescending;
}
public function getIncreasePriceProduct(){
  $listIncreasePriceProduct = DB::table($this->productTable)         
  ->select('name','price','description','gallery','quantity' ,'quantitative','created_at' )
  ->orderBy('price','asc')
  ->paginate(3);
  
return $listIncreasePriceProduct;
}
public function searchProductByName($name){
  $listSearchProduct=DB::table($this->productTable)
  ->select('name','price','description','gallery','quantity' ,'quantitative','created_at')
  ->where('name','LIKE','%'.$name.'%')
  ->get();
  return $listSearchProduct;
}
public function searchProductByCategory($Categoryname){
  $listSearchProduct=DB::table($this->productTable)
  ->select('products.name','price','description','gallery','quantity' ,'quantitative','categories.name as categoryName','products.created_at')
  ->join('products_categories','products.id','=','products_categories.product_id')
  ->join('categories','products_categories.category_id','=','categories.id')
  ->where('categories.name','LIKE','%'.$Categoryname.'%' )
  ->get();
  return $listSearchProduct;
}
}
