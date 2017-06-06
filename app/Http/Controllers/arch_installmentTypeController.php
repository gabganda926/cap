<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\installmentConnection;

class arch_installmentTypeController extends Controller
{
    public function __construct(installmentConnection $inst)
    {
        $this->instal = $inst;
    }

    public function index()
    {
      return view('/pages/archives/installment')
      ->with('ins',installmentConnection::all());
    }

    public function reactivate_installment(Request $req)
    {
       $instal = installmentConnection::where('installment_ID', '=', $req->asd)->first();
       $instal->del_flag = 0;
       $mytime = $req->time;
       $instal->updated_at = $mytime;

       $instal->save();
       return redirect('/admin/maintenance/installment/type');
    }

    public function areactivate_installment(Request $req)
    {
      foreach($req->asd as $ID)
      {
         $instal = installmentConnection::where('installment_ID', '=', $ID)->first();
         $instal->del_flag = 0;
         $mytime = $req->time;
         $instal->updated_at = $mytime;

         $instal->save();
      }
    }
}
