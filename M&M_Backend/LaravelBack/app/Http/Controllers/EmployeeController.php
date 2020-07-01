<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Service;
use App\EmployeeService;

class EmployeeController extends Controller
{
    public function getById($id){ 
        $employee = Employee::where('id',$id)->with('services')->first();
       
        return response()->json([
            "message" => "success",
            "employee" => $employee
        ]);
    }

    public function getAllEmployees(){
        $employees = Employee::all();
        return response()->json([
            "message" => "success",
            "employee" => $employees
        ]);
    }

    public function store(Request $request,$id){

        $this->validate($request, [
            'name'=>'required|max:20',
            'phone_number'=>'required|integer',
            'role'=>'required',
        ]);

        $employee = Employee::create($request->all());
        $services = Service::where('id',$id)->get();

        foreach($services as $service ){
            EmployeeService::create(['employee_id'=> $employee->id, 'service_id' => $service->id]);
        }

        return response()->json([
            "message" => "success",
            "employee" => $employee,
            "services" => $service
        ]);
    }




    //update method



    public function destroy($id)
     {
         $employee = Employee::findOrFail($id);
 
         if (!$employee) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, employee with id ' . $id . ' cannot be found.'
             ], 400);
         }
 
         if ($employee->delete()) {
             return response()->json([
                 'success' => true,
                 
             ]);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'employee could not be deleted.'
             ], 500);
         }
     }




}
