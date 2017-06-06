<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\addressConnection;

use App\employeeConnection;

use App\personalInfoConnection;

use App\employeeTypeConnection;

class arch_employeeController extends Controller
{
  public function __construct(employeeConnection $emp, addressConnection $add, personalInfoConnection $personalinfo)
  {
      $this->employee = $emp;
      $this->address = $add;
      $this->pinfo = $personalinfo;
  }

  public function index()
  {
    return view('/pages/archives/employee')
    ->with('emp',employeeConnection::all())
    ->with('emptype',employeeTypeConnection::all())
    ->with('pnf',personalInfoConnection::all())
    ->with('add',addressConnection::all());
  }

  public function reactivate_employee(Request $req)
  {
      $employee = employeeConnection::where('emp_ID', '=', $req->asd)->first();

      $employee->del_flag = 0;
      $mytime = $req->time;
      $employee->updated_at = $mytime;

      $employee->save();

      return redirect('admin/maintenance/employee');
  }

  public function areactivate_employee(Request $req)
  {
      foreach($req->asd as $ID)
      {
          $employee = employeeConnection::where('emp_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
      }
  }
}
