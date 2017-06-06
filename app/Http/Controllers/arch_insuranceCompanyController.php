<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\inscompanyConnection;

use App\addressConnection;

use App\contactPersonConnection;

use App\policynoConnection;

use App\personalInfoConnection;

class arch_insuranceCompanyController extends Controller
{
	public function __construct(contactPersonConnection $comPerson, inscompanyConnection $comp, addressConnection $add, personalInfoConnection $personalinfo)
    {
        $this->company = $comp;
        $this->address = $add;
		$this->cPerson = $comPerson;
        $this->pinfo = $personalinfo;
    }


	public function index()
  {
    return view('/pages/archives/insurance company')
    ->with('cmp',inscompanyConnection::all())
    ->with('pnm',policynoConnection::all())
  	->with('cpr',contactPersonConnection::all())
    ->with('pInfo',personalInfoConnection::all())
    ->with('add',addressConnection::all());
  }

  public function reactivate_inscomp(Request $req)
  {
    $compy = inscompanyConnection::where('comp_ID', '=', $req->asd)->first();

    $compy->del_flag = 0;
      $mytime = $req->time;
      $compy->updated_at = $mytime;

    $compy->save();

    return redirect('admin/maintenance/insurance/company');
  }

  public function areactivate_inscomp(Request $req)
  {
      foreach($req->asd as $ID)
      {
    $compy = inscompanyConnection::where('comp_ID', '=', $ID)->first();

    $compy->del_flag = 0;
      $mytime = $req->time;
      $compy->updated_at = $mytime;

    $compy->save();
      }
  }
}
