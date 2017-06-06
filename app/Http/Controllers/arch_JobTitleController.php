<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\JobTitleConnection;

use App\employeeConnection;

use App\personalInfoConnection;

class arch_JobTitleController extends Controller
{
    public function __construct(JobTitleConnection $employeetype)
  {
      $this->emptype = $employeetype;
  }

  public function index()
  {
      return view('/pages/archives/jobtitle')
      ->with('empd',employeeConnection::all())
      ->with('pnf',personalInfoConnection::all())
      ->with('jobtitle',JobTitleConnection::all());
  }

  public function reactivate_job(Request $req)
  {
    $emptype = JobTitleConnection::where('jobtitle_ID','=',$req->asd)->first();
    $emptype->del_flag = 0;
    $mytime = $req->time;
    $emptype->updated_at = $mytime;

    $emptype->save();

    return redirect('/admin/maintenance/job/title');
  }

  public function areactivate_job(Request $req)
  {
    foreach($req->asd as $ID)
    {
      $emptype = JobTitleConnection::where('jobtitle_ID','=',$ID)->first();
      $emptype->del_flag = 0;
      $mytime = $req->time;
      $emptype->updated_at = $mytime;

      $emptype->save();
    }
  }
}
