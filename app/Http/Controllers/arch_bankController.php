<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\bankConnection;

use App\addressConnection;

use App\contactPersonConnection;

use App\personalInfoConnection;

class arch_bankController extends Controller
{
  public function __construct(contactPersonConnection $contactPerson,bankConnection $bnk, addressConnection $add, personalInfoConnection $personalinfo)
  {
      $this->banko = $bnk;
      $this->address = $add;
      $this->cPerson = $contactPerson;
      $this->pinfo = $personalinfo;
  }

  public function index()
  {
    return view('/pages/archives/bank')//page link from local drive
    ->with('bank',bankConnection::all())//data from database
    ->with('cpr',contactPersonConnection::all())
    ->with('pInfo',personalInfoConnection::all())
    ->with('add',addressConnection::all());
  }

  public function reactivate_bank(Request $req)
  {
      $banko = bankConnection::where('bank_ID', '=', $req->asd)->first();

      $banko->del_flag = 0;
      $banko->updated_at = $req->time;

      $banko->save();
  }

  public function areactivate_bank(Request $req)
    {      
        foreach($req->asd as $ID)
        {
            $banko = bankConnection::where('bank_ID', '=', $ID)->first();

            $banko->del_flag = 0;
            $banko->updated_at = $req->time;

            $banko->save();
        }
    }
}
