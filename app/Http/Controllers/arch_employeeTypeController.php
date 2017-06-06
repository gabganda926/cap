<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\employeeTypeConnection;

use App\employeeConnection;

use App\personalInfoConnection;

class arch_employeeTypeController extends Controller
{
  public function __construct(employeeTypeConnection $employeetype)
  {
      $this->emptype = $employeetype;
  }

  public function index()
  {
      return view('/pages/archives/employeeType')
      ->with('empd',employeeConnection::all())
      ->with('pnf',personalInfoConnection::all())
      ->with('emptype',employeeTypeConnection::all());
  }

  public function reactivate_emptype(Request $req)
  {
    $emptype = employeeTypeConnection::where('emptype_ID','=',$req->asd)->first();
    $emptype->del_flag = 0;
    $mytime = $req->time;
    $emptype->updated_at = $mytime;

    $emptype->save();

    return redirect('/admin/maintenance/employee/type');
  }

  public function areactivate_emptype(Request $req)
  {
    foreach($req->asd as $ID)
    {
      $emptype = employeeTypeConnection::where('emptype_ID','=',$ID)->first();
      $emptype->del_flag = 0;
      $mytime = $req->time;
      $emptype->updated_at = $mytime;

      $emptype->save();
    }
  }
}
