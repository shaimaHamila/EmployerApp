<?php

namespace App\Http\Controllers;

use App\Models\Employee ;
use Illuminate\Bus\UpdatedBatchJobCounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    public function getEmployee()
    {
        return response()->json(Employee::all(), 200);
    }


    public function getEmployeeById($id)
    {
        $employee = Employee::find($id);
        if(is_null($employee))
        {
            return response()->json(['message' => 'Employee not found'], 404);
        }
        return response()->json($employee::find($id), 200);

    }

    public function addEmployee(Request $request)
    {
        # Create new object
        $employee = Employee::create($request->all());

        return response($employee, 201);
    }

    public function updateEmployee(Request $request,$id)
    {
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['messaeg'=>'Employee not found'], 404);
        }
        $employee->update($request->all());

        return response($employee, 200);
    }

    public function deleteEmployee(Request $request, $id)
    {
        $employee = Employee::find($id);

        if(is_null($employee)){
            return response()->json(['messaeg'=>'Employee not found'], 404);
        }

        $employee->delete();
        return response()->json(null,204);
    }
}
