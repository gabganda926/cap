<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\salesAgentConnection;

use App\addressConnection;

use App\personalInfoConnection;

date_default_timezone_set('Asia/Manila');

class salesAgentController extends Controller
{

  public function __construct(salesAgentConnection $emp, addressConnection $add, personalInfoConnection $personalinfo)
  {
      $this->employee = $emp;
      $this->address = $add;
      $this->pinfo = $personalinfo;
  }

  public function index()
  {
    return view('/pages/maintenance/salesAgent')
    ->with('agent',salesAgentConnection::all())
    ->with('pnf',personalInfoConnection::all())
    ->with('add',addressConnection::all());
  }


  public function add_agent(Request $req)
  {
      if($req->add_blcknum != null)
      {
        $this->address->add_blcknum = $req->add_blcknum;
      }
      if($req->add_street != null)
      {
        $this->address->add_street = $req->add_street;
      }
      if($req->add_subdivision != null)
      {
        $this->address->add_subdivision = $req->add_subdivision;
      }
      if($req->add_brngy != null)
      {
        $this->address->add_brngy = $req->add_brngy;
      }
      if($req->add_district != null)
      {
        $this->address->add_district = $req->add_district;
      }
      if($req->add_city != null)
      {
        $this->address->add_city = $req->add_city;
      }
      if($req->add_province != null)
      {
        $this->address->add_province = $req->add_province;
      }
      if($req->add_region != null)
      {
        $this->address->add_region = $req->add_region;
      }
      if($req->add_zipcode != null)
      {
        $this->address->add_zipcode = $req->add_zipcode;
      }
        $this->address->del_flag  = 0;
      if($this->address->save())
      {
        return $this->add_agent_info($req);
      }

  }

  public function add_agent_info($req)
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
      $this->pinfo->del_flag  = 0;
      if($this->pinfo->save())
      {
        return $this->add_agnt($req);
      }
  }

  public function add_agnt($req)
  {
      $latestid = addressConnection::orderBy('add_ID', 'desc')->first();
      $latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
      $this->employee->agent_add_ID = (int)$latestid->add_ID;
      $this->employee->personal_info_ID = (int)$latestidpinfo->pinfo_ID;
      $this->employee->del_flag  = 0;
      $this->employee->commision = $req->comm;
      $mytime = $req->time;
      $this->employee->created_at = $mytime;
      $this->employee->updated_at = $mytime;
      $this->employee->save();

      return redirect('admin/maintenance/salesagent');
  }


      public function update_agent(Request $req,addressConnection $add,  salesAgentConnection $emp)
      {
          $address = $add::where('add_ID', '=', $req->aadd_id)->first();

          if($req->aadd_blcknum != null)
          {
            $address->add_blcknum = $req->aadd_blcknum;
          }
          if($req->add_street != null)
          {
            $address->add_street = $req->aadd_street;
          }
          if($req->aadd_subdivision != null)
          {
            $address->add_subdivision = $req->aadd_subdivision;
          }
          if($req->aadd_brngy != null)
          {
            $address->add_brngy = $req->aadd_brngy;
          }
          if($req->aadd_district != null)
          {
            $address->add_district = $req->aadd_district;
          }
          if($req->aadd_city != null)
          {
            $address->add_city = $req->aadd_city;
          }
          if($req->aadd_province != null)
          {
            $address->add_province = $req->aadd_province;
          }
          if($req->aadd_region != null)
          {
            $address->add_region = $req->aadd_region;
          }
          if($req->aadd_zipcode != null)
          {
            $address->add_zipcode = $req->aadd_zipcode;
          }

          if($address->save())
          {
            return $this->update_agent_info($req);
          }

      }

      public function update_agent_info($req)
      {
          $pinfo = personalInfoConnection::where('pinfo_ID', '=', $req->pInfo_ID)->first();

          if ($req->aemp_middle_name == null)
          {
            $pinfo->pinfo_first_name = $req->aemp_first_name;
            $pinfo->pinfo_last_name = $req->aemp_last_name;
          }
          else
          {
            $pinfo->pinfo_first_name = $req->aemp_first_name;
            $pinfo->pinfo_middle_name = $req->aemp_middle_name;
            $pinfo->pinfo_last_name = $req->aemp_last_name;
          }
          $pinfo->pinfo_contact = $req->aemp_contact;
          $pinfo->pinfo_mail = $req->aemp_mail;
          $pinfo->del_flag  = 0;
          if($this->pinfo->save())
          {
            return $this->update_data($req);
          }
      }


      public function update_data($req)
      {
          $employee = salesAgentConnection::where('emp_ID', '=', $req->aemp_id)->first();

          $employee->commision = $req->comm;

          $mytime = $req->atime;
          $this->employee->updated_at = $mytime;

          $employee->save();

          return redirect('admin/maintenance/employee');
      }

      public function delete_data($req)
      {
          $employee = salesAgentConnection::where('emp_ID', '=', $req->aemp_id)->first();

          $employee->del_flag = 1;

          $employee->save();

          return redirect('admin/maintenance/employee');
      }


        public function delete_agent(Request $req)
      {
          $address = addressConnection::where('add_ID', '=', $req->aadd_id)->first();

          $address->del_flag = 1;

          if($address->save())
          {
            return $this->delete_data($req);
          }

      }
}
