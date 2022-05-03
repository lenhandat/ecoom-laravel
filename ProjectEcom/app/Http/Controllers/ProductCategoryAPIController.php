<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryAPIController extends Controller
{
    //
    public function getProductCategory(){
        return response()->json(ProductCategory::all(),200);
    }
    public function getProductCategoryById($id){
        $productCategory= ProductCategory::find($id);

        if(is_null($productCategory)){

            return response()->json(['message' => 'ProductCategory Not Found'],404);

        }
        return response()->json($productCategory::find($id),200);
    }
    public function addProductCategory(Request $request){
        $productCategory =ProductCategory::create($request->all());
        return response($productCategory,201);
    }
    public function updateProductCategory(Request $request , $id){
        $productCategory= ProductCategory::find($id);
        if(is_null($productCategory)){
            return response()->json(['message' => 'productCategory Not Found'],404);

        }
        $productCategory->update($request->all());
        return response($productCategory,200);
    }
    public function deleteProductCategory(Request $request , $id){
        $productCategory= ProductCategory::find($id);
        if(is_null($productCategory)){
            return response()->json(['message' => 'productCategory Not Found'],404);
        }
        $productCategory->delete();
       
        return response()->json(null,204);
    }
}
