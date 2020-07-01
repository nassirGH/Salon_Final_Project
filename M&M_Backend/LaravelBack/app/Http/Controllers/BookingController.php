<?php

namespace App\Http\Controllers;

use App\Booking;
use App\ServicePackage;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getById($id){  
        $booking = Booking::where('id',$id)->with('packages')->first();
      
        return response()->json([
            "message" => "success",
            "appointment" => $booking
        ]);
    }

    public function getAllBookings(){
        $bookings = Booking::all();
        
        return response()->json([
            "message" => "success",
            "appointments" => $bookings
        ]);
    }


    public function store(Request $request,$id)
    {
       
        $booking = Booking::create($request->all());
        $servicePackages = ServicePackage::where('id',$id)->get();
        // dd($servicePackages);

        foreach($servicePackages as $servicePackage ){
            ServicePackage::create(['book_id'=> $booking->id, 'service_package_id' => $servicePackage->id]);
          
        }

        return response()->json([
            "message" => "success",
            "booking" => $booking,
            "service package" => $servicePackage
        ]);
    }


       //update method


       public function destroy($id)
       {
           $booking = Booking::findOrFail($id);
   
           if (!$booking) {
               return response()->json([
                   'success' => false,
                   'message' => 'Sorry, booking with id ' . $id . ' cannot be found.'
               ], 400);
           }
   
           if ($booking->delete()) {
               return response()->json([
                   'success' => true,
                   
               ]);
           } else {
               return response()->json([
                   'success' => false,
                   'message' => 'booking could not be deleted.'
               ], 500);
           }
       }
}
