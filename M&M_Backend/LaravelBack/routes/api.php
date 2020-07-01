<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
// //Admin Auth
// Route::post('adminlogin', 'Api\Admin\Auth\LoginController@login');
// Route::post('adminregister', 'Api\Admin\Auth\RegisterController@register');

// //Here is the protected User Routes Group,
// Route::group(['middleware' => 'jwt.auth', 'prefix' => 'user'], function () {
//     Route::get('logout', 'Api\User\UserController@logout');
//     Route::get('dashboard', 'Api\User\UserController@dashboard');
// });

// //Here is the protected Admin Routes Group
// Route::group(['prefix' => 'admin'], function () {
//     Route::post('settings', 'Api\Admin\AdminController@settings');
//     Route::post('dashboard', 'Api\Admin\AdminController@dashboard');
// });
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/





Route::post('user/login', 'Api\User\Auth\LoginController@login');
Route::post('user/register', 'Api\User\Auth\RegisterController@register');



Route::get('/employee/{id}', 'EmployeeController@getById');
Route::get('/employees', 'EmployeeController@getAllEmployees');
Route::post('/employee/create/{service_id}','EmployeeController@store');
// Route::put('/employee/update/{service_id}', 'EmployeeController@update');
Route::delete('/employee/{id}', 'EmployeeController@destroy');


Route::get('/service/{id}', 'ServiceController@getById');
Route::get('/services', 'ServiceController@getAllServices');
Route::post('/service/create/{employee_id}','ServiceController@save');
// Route::put('/service/update/{employee_id}', 'ServiceController@update');
Route::delete('/service/{id}', 'ServiceController@destroy');

/*--------------------------------------------------------------------------------*/



Route::get('/booking/{id}', 'BookingController@getById');
Route::get('/bookings', 'BookingController@getAllBookings');
Route::post('/booking/create/{service__package_id}','BookingController@store');
// Route::put('/booking/update/{service__package_id}', 'BookingController@update');
Route::delete('/booking/{id}', 'BookingController@destroy');



/*--------------------------------------------------------------------------------*/


Route::get('/type/service/{id}', 'ServiceTypeController@getById');
Route::get('/services', 'ServiceTypeController@getAllServices');
Route::post('/service/booking/create/{booking_id}','ServiceTypeController@store');
//Route::put('/service/update/{booking_id}', 'ServiceTypeController@update');
Route::delete('/service/{id}', 'ServiceTypeController@destroy');


/*--------------------------------------------------------------------------------*/

Route::get('/service/package/{id}', 'ServiceController@getServiceById');
Route::get('/services/packages', 'ServiceController@getAllServices');
Route::post('/service/package/create/{package_id}','ServiceController@store');
//Route::put('/service/update/{booking_id}', 'ServiceController@update');
Route::delete('/service/{id}', 'ServiceController@destroy');


/*--------------------------------------------------------------------------------*/


Route::get('/user/service/{id}', 'UserController@getById');
Route::get('/users', 'UserController@getAllUsers');
Route::post('/user/create/{service_type_id}','UserController@store');
// Route::put('/user/update/{service_type_id}', 'UserController@update');
Route::delete('/user/{id}', 'UserController@destroy');


/*--------------------------------------------------------------------------------*/


