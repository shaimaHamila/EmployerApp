<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Get all employees
Route::get('employees', 'App\Http\Controllers\EmployeeController@getEmployee');

//Get Specific employee
Route::get('employees/{id}', 'App\Http\Controllers\EmployeeController@getEmployeeById');

//Add employee
Route::post('addEmployees', 'App\Http\Controllers\EmployeeController@addEmployee');

//Update an employee
Route::put('updateEmployees/{id}', 'App\Http\Controllers\EmployeeController@updateEmployee');

//Delete an employee
Route::delete('deleteEmployee/{id}', 'App\Http\Controllers\EmployeeController@deleteEmployee');
