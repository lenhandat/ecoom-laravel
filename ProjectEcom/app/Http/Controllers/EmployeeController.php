<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use  App\Models\Empployee;

class EmployeeController extends Controller
{
  

    public function getEmployee(){
        return response()->json(Empployee::all(),200);
    }
    public function getEmployeeById($id){
        $employee= Empployee::find($id);
        if(is_null($employee)){
            return response()->json(['message' => 'Employee Not Found'],404);

        }
        return response()->json($employee::find($id),200);
    }
    public function addEmployee(Request $request){
        $employee =Empployee::create($request->all());
        return response($employee,201);
    }
    public function updateEmployee(Request $request , $id){
        $employee= Empployee::find($id);
        if(is_null($employee)){
            return response()->json(['message' => 'Employee Not Found'],404);

        }
        $employee->update($request->all());
        return response($employee,200);
    }
    public function deleteEmployee(Request $request , $id){
        $employee= Empployee::find($id);
        if(is_null($employee)){
            return response()->json(['message' => 'Employee Not Found'],404);
        }
        $employee->delete();
        return response()->json(null,204);
    }
}
