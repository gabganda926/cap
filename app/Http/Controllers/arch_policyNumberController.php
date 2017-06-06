<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\policynoConnection;

use App\inscompanyConnection;

class arch_policyNumberController extends Controller
{
    public function __construct(inscompanyConnection $inscomp, policynoConnection $pnumber)
    {
        $this->icomp = $inscomp;
        $this->pnum = $pnumber;
    }

    public function index()
    {
      return view('/pages/archives/policy numbers')
      ->with('pnm',policynoConnection::all())
      ->with('com',inscompanyConnection::all());
    }

    public function reactivate_policy(Request $req)
    {
       $pnum = policynoConnection::where('policy_number', '=', $req->asd)->first();
       $pnum->del_flag = 0;
       $mytime = $req->time;
       $pnum->updated_at = $mytime;

       $pnum->save();
       return redirect('admin/maintenance/policyno');
    }

    public function areactivate_policy(Request $req)
    {
      foreach($req->asd as $ID)
      {
       $pnum = policynoConnection::where('policy_number', '=', $ID)->first();
       $pnum->del_flag = 0;
       $mytime = $req->time;
       $pnum->updated_at = $mytime;

       $pnum->save();
     }
    }
}
