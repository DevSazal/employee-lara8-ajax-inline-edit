<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employee;
// use Auth;
use Validator;

class DefaultController extends Controller
{
    public function index()
    {
      $array['employees'] = Employee::orderBy('id', 'asc')->paginate(3);
      return view('index')->with($array);
    }

    public function ajaxPaginateFetch(Request $request)
    {
       if($request->ajax())
       {
          $array['employees'] = Employee::orderBy('id', 'asc')->paginate(3);
          return view('index_child')->with($array)->render();
       }
    }

    public function salaryUpdate(Request $request)
    {
      $employee = Employee::find($request->id);
      $employee->salary = $request->salary;
      $result = $employee->save();

        if($result){
          $request->session()->flash('updated_employee', $employee->id);
          // return ["result" => "Data has been saved."];
          return response()->json($result, 200);
        }else{
          return ["result" => "Operation Failed!"];
        }
    }

    public function nameUpdate(Request $request)
    {
      $employee = Employee::find($request->id);
      $employee->name = $request->name;
      $result = $employee->save();

        if($result){
          $request->session()->flash('updated_employee', $employee->id);
          // return ["result" => "Data has been saved."];
          return response()->json($result, 200);
        }else{
          return ["result" => "Operation Failed!"];
        }
    }

    public function allUpdate(Request $request)
    {
      foreach ($request->employees as $id) {
        // code...
        // dd($employee);
        $key = array_search($id, $request->employees);
        // echo $request->salaries[$key];
        $employee = Employee::find($id);
        $employee->salary = $request->salaries[$key];
        $employee->name = $request->names[$key];
        $result = $employee->save();

          if($result){
            $request->session()->flash('updated_employees', $employee->id);
            // return ["result" => "Data has been saved."];
            // return response()->json($result, 200);
          }else{
            // return ["result" => "Operations Failed!"];
          }

      }
      return response()->json('Employee data has been saved', 200);
    }

}
