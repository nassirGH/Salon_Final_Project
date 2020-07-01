<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Employee;
use App\EmployeeService;
use App\ServicePackage;

class ServiceController extends Controller
{
    public function getById($id){ 
        $service = Service::where('id',$id)->with('employees')->first();
       
        return response()->json([
            "message" => "success",
            "service" => $service
        ]);
    }


    public function getServiceById($id){ 
      
        $service = Service::where('id',$id)->with('packages')->first();
       
        return response()->json([
            "message" => "success",
            "Service" => $service
        ]);
    }

    public function getAllServices(){
        $services = Service::all();
        return response()->json([
            "message" => "success",
            "services" => $services
        ]);
    }


    public function store(Request $request,$id){

        $service = Service::create($request->all());
        $package = ServicePackage::where('id',$id)->get();  
        $service_package = Service::where('id',$id)->with('packages')->first(); 
       

        $service = new service();
        $service->name = $request->get('name');
        $service->price = $request->get('price');
        $service->package = $request->get('package');
       

        return response()->json([
            "message" => "success",
            "service" => $service,    
            "packages" => $service_package
        ]);
    }



    //update


    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, service with id ' . $id . ' cannot be found.'
            ], 400);
        }

        if ($service->delete()) {
            return response()->json([
                'success' => true,
                
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'service could not be deleted.'
            ], 500);
        }
    }

}
