<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\courierConnection;

use App\personalInfoConnection;

use Alert;

use Redirect;

class maint_courierController extends Controller
{
  public function __construct(courierConnection $cor, personalInfoConnection $personalinfo)
  {
      $this->courier = $cor;
      $this->pinfo = $personalinfo;
  }

  public function index()
  {
    return view('/pages/maintenance/courier')
    ->with('cor',courierConnection::all())
    ->with('pnf',personalInfoConnection::all());
  }

  public function add_courier(Request $req)
  {
      if ($req->emp_middle_name == null)
      {
        $this->pinfo->pinfo_first_name = $req->emp_first_name;
        $this->pinfo->pinfo_last_name = $req->emp_last_name;
      }
      else
      {
        $this->pinfo->pinfo_first_name = $req->emp_first_name;
        $this->pinfo->pinfo_middle_name = $req->emp_middle_name;
        $this->pinfo->pinfo_last_name = $req->emp_last_name;
      }
      $this->pinfo->pinfo_contact = $req->emp_contact;
      $this->pinfo->pinfo_mail = $req->emp_mail;
      try
      {
        $this->pinfo->save();
        return $this->add_data($req);
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

  public function add_data($req)
  {
      $latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
      $this->courier->personal_info_ID = (int)$latestidpinfo->pinfo_ID;
      $mytime = $req->time;
      $this->courier->created_at = $mytime;
      $this->courier->updated_at = $mytime;
      $this->courier->del_flag  = 0;
      try
      {
        $this->courier->save();
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

  public function update_courier(Request $req)
  {
      $pinfo = personalInfoConnection::where('pinfo_ID', '=', $req->pInfo_ID)->first();
      $pinfo->pinfo_first_name = $req->aemp_first_name;
      $pinfo->pinfo_middle_name = $req->aemp_middle_name;
      $pinfo->pinfo_last_name = $req->aemp_last_name;
      $pinfo->pinfo_contact = $req->aemp_contact;
      $pinfo->pinfo_mail = $req->aemp_mail;
      try
      {
        $pinfo->save();
        return $this->update_data($req);
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

  public function update_data($req)
  {
      $courier = courierConnection::where('courier_ID', '=', $req->aemp_id)->first();

      $mytime = $req->atime;
      $courier->updated_at = $mytime;

      try
      {
        $courier->save();
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

  public function delete_courier(Request $req)
  {
      $courier = courierConnection::where('courier_ID', '=', $req->aemp_id)->first();

      $courier->del_flag = 1;
      $mytime = $req->atime;
      $courier->updated_at = $mytime;

      try
      {
        $courier->save();
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

  public function ardelete_courier(Request $req)
  {
      foreach($req->asd as $ID)
      {
        $courier = courierConnection::where('courier_ID', '=', $ID)->first();

        $courier->del_flag = 1;
        $mytime = $req->time;
        $courier->updated_at = $mytime;

        $courier->save();
      }
  }
}
