<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductAPIController extends Controller
{
    //
    private $products;
    public function __construct(){
     $this ->products= new Product();
    }
    public function getProduct(){
        return response()->json(Product::all(),200);
    }
    public function getProductById($id){
        $product= Product::find($id);

        if(is_null($product)){

            return response()->json(['message' => 'product Not Found'],404);

        }
        return response()->json($product::find($id),200);
    }
    public function addProduct(Request $request){
        $product =Product::create($request->all());
        return response($product,201);
    }
    public function updateProduct(Request $request , $id){
        $product= Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'product Not Found'],404);

        }
        $product->update($request->all());
        return response($product,200);
    }
    public function deleteProduct(Request $request , $id){
        $product= Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'product Not Found'],404);
        }
        $product->delete();
       
        return response()->json(null,204);
    }
    public function getNewestProduct(){
        $product=$this ->products->getNewest();
        return response($product);
    }
    public function getIncreasePriceProduct(){
        $product=$this ->products->getIncreasePriceProduct();
        return response($product);
    }
   public function getDescendingPriceProduct(){
    $product=$this ->products->getDescendingPriceProduct();
    return response($product);
   }
   public function searchProductByName(Request $request){
     $product=$this->products->searchProductByName($request->name);
    
    
    return response()->success($product);
   } 
   public function searchProductByCategory(Request $request){
    $product=$this->products->searchProductByCategory($request->categoryName);
   
   
   return response()->success($product);
  } 

}
