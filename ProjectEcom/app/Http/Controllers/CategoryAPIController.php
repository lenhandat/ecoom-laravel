<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryAPIController extends Controller
{
    //
    public function getCategory(){
        return response()->json(Category::all(),200);
    }
    public function getCategoryById($id){
        $category= Category::find($id);

        if(is_null($category)){

            return response()->json(['message' => 'Category Not Found'],404);

        }
        return response()->json($category::find($id),200);
    }
    public function addCategory(Request $request){
        $category =Category::create($request->all());
        return response($category,201);
    }
    public function updateCategory(Request $request , $id){
        $category= Category::find($id);
        if(is_null($category)){
            return response()->json(['message' => 'Category Not Found'],404);

        }
        $category->update($request->all());
        return response($category,200);
    }
    public function deleteCategory(Request $request , $id){
        $category= Category::find($id);
        if(is_null($category)){
            return response()->json(['message' => 'Category Not Found'],404);
        }
        $category->delete();
       
        return response()->json(null,204);
    }
}
