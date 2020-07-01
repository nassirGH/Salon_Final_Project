<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Service;
use App\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function getById($id){ 
      
        $serviceType = ServiceType::where('id',$id)->with('bookings')->first();
       
        return response()->json([
            "message" => "success",
            "Type of Service" => $serviceType
        ]);
    }

    public function getAllServices(){
        $services = ServiceType::all();
        
        return response()->json([
            "message" => "success",
            "Type of Services" => $services
        ]);
    }


    public function store(Request $request,$id)
    {
       
        $service_type = ServiceType::create($request->all());
        $booking = Booking::where('id',$id)->get();     
       
        $service_type = new ServiceType();
    	$service_type->name = $request->get('name');

        return response()->json([
            "message" => "success",
            "service_type" => $service_type,
          
        ]);
    }


    //update 




    public function destroy($id)
    {
        $serviceType = ServiceType::findOrFail($id);

        if (!$serviceType) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, type of service with id ' . $id . ' cannot be found.'
            ], 400);
        }

        if ($serviceType->delete()) {
            return response()->json([
                'success' => true,
                
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'type of service could not be deleted.'
            ], 500);
        }
    }

}
