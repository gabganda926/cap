<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\salesAgentConnection;

use App\addressConnection;

use App\personalInfoConnection;

class arch_salesAgentController extends Controller
{
  public function __construct(salesAgentConnection $emp, addressConnection $add, personalInfoConnection $personalinfo)
  {
      $this->employee = $emp;
      $this->address = $add;
      $this->pinfo = $personalinfo;
  }

  public function index()
  {
    return view('/pages/archives/salesAgent')
    ->with('agent',salesAgentConnection::all())
    ->with('pnf',personalInfoConnection::all())
    ->with('add',addressConnection::all());
  }

  public function reactivate_agent(Request $req)
  {
      $employee = salesAgentConnection::where('agent_ID', '=', $req->asd)->first();

      $employee->del_flag = 0;
      $mytime = $req->time;
      $employee->updated_at = $mytime;

      $employee->save();

      return redirect('admin/maintenance/salesagent');
  }

  public function areactivate_agent(Request $req)
  {
    foreach($req->asd as $ID)
    {
      $employee = salesAgentConnection::where('agent_ID', '=', $ID)->first();

      $employee->del_flag = 0;
      $mytime = $req->time;
      $employee->updated_at = $mytime;

      $employee->save();
    }
  }
}
