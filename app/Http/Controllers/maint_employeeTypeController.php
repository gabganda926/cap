<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\employeeTypeConnection;

use App\employeeConnection;

use App\personalInfoConnection;

use Alert;

use Redirect;

class maint_employeeTypeController extends Controller
{
  public function __construct(employeeTypeConnection $employeetype)
  {
      $this->emptype = $employeetype;
  }

  public function index()
  {
      return view('/pages/maintenance/employeeType')
      ->with('empd',employeeConnection::all())
      ->with('pnf',personalInfoConnection::all())
      ->with('emptype',employeeTypeConnection::all());
  }

  public function add_emptype(Request $req)
  {
    $this->emptype->emptype_Name = $req->Employee_type;
    $this->emptype->emptype_Desc = $req->EmployeeType_desc;
    $mytime = $req->time;
    $this->emptype->created_at = $mytime;
    $this->emptype->updated_at = $mytime;
    $this->emptype->del_flag = 0;

    try
    {
      $this->emptype->save();
      alert()
      ->success('Record Saved', 'Success')
      ->persistent("Close");

      return Redirect::back();
    }
    catch(\Exception $e)
    {
      $message = $e->getCode();
      if($message == 23000)
      {
          alert()
          ->error('ERROR', 'Data already exist!')
          ->persistent("Close");

          return Redirect::back();
      }
      else if($message == 22001)
      {
        alert()
        ->error('ERROR', 'Exceed Max limit of column!')
        ->persistent("Close");

        return Redirect::back();
      }
      else
      {
        alert()
        ->error('ERROR', $e->getCode())
        ->persistent("Close");

        return Redirect::back();
      }
    }
  }

  public function update_emptype(Request $req)
  {
    $emptype = employeeTypeConnection::where('emptype_ID','=',$req->id)->first();

    $emptype->emptype_Name = $req->aEmployee_type;
    $emptype->emptype_Desc = $req->aEmployeeType_desc;
    $mytime = $req->atime;
    $emptype->updated_at = $mytime;

    try
    {
      $emptype->save();
      alert()
      ->success('Record Updated', 'Success')
      ->persistent("Close");

      return Redirect::back();
    }
    catch(\Exception $e)
    {
      $message = $e->getCode();
      if($message == 23000)
      {
          alert()
          ->error('ERROR', 'Data already exist!')
          ->persistent("Close");

          return Redirect::back();
      }
      else if($message == 22001)
      {
        alert()
        ->error('ERROR', 'Exceed Max limit of column!')
        ->persistent("Close");

        return Redirect::back();
      }
      else
      {
        alert()
        ->error('ERROR', $e->getCode())
        ->persistent("Close");

        return Redirect::back();
      }
    }
  }

  public function delete_emptype(Request $req)
  {
    $emptype = employeeTypeConnection::where('emptype_ID','=',$req->id)->first();
    $emptype->del_flag = 1;
    $mytime = $req->atime;
    $emptype->updated_at = $mytime;
    try
    {
      $emptype->save();
      alert()
      ->success('Record Deleted', 'Success')
      ->persistent("Close");

      return Redirect::back();
    }
    catch(\Exception $e)
    {
      $message = $e->getCode();
      if($message == 23000)
      {
          alert()
          ->error('ERROR', 'Data already exist!')
          ->persistent("Close");

          return Redirect::back();
      }
      else if($message == 22001)
      {
        alert()
        ->error('ERROR', 'Exceed Max limit of column!')
        ->persistent("Close");

        return Redirect::back();
      }
      else
      {
        alert()
        ->error('ERROR', $e->getCode())
        ->persistent("Close");

        return Redirect::back();
      }
    }
  }

  public function ardelete_emptype(Request $req)
  {
    foreach($req->asd as $ID)
    {
      $emptype = employeeTypeConnection::where('emptype_ID','=',$ID)->first();
      $emptype->del_flag = 1;
      $mytime = $req->time;
      $emptype->updated_at = $mytime;

      $emptype->save();
    }
  }
}
