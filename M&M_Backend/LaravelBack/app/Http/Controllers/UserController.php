<?php

namespace App\Http\Controllers;

use App\ServiceType;
use App\User;
use App\UserServiceType;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getById($id){ 
        $user = User::where('id',$id)->with('serviceTypes')->first();
       
        return response()->json([
            "message" => "success",
            "user" => $user
        ]);
    }

    public function getAllUsers(){
        $users = User::all();
        return response()->json([
            "message" => "success",
            "users" => $users
        ]);
    }

    public function store(Request $request,$id){

        $this->validate($request, [
            'name'=>'required|max:20',
            'phone_number'=>'required|integer',
            'password'=>'required',
        ]);

        $user = User::create($request->all());
        $service_types = ServiceType::where('id',$id)->get();

        foreach($service_types as $service_type ){
            UserServiceType::create(['user_id'=> $user->id, 'service_type_id' => $service_type->id]);
        }

        return response()->json([
            "message" => "success",
            "user" => $user,
            "service types" => $service_type
        ]);
    }




    //update method



    public function destroy($id)
     {
         $user = User::findOrFail($id);
 
         if (!$user) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, user with id ' . $id . ' cannot be found.'
             ], 400);
         }
 
         if ($user->delete()) {
             return response()->json([
                 'success' => true,
                 
             ]);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'user could not be deleted.'
             ], 500);
         }
     }
}
