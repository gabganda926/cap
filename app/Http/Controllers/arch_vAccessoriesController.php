<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\vAccesoriesConnection;

class arch_vAccessoriesController extends Controller
{
  public function __construct(vAccesoriesConnection $acce)
  {
      $this->acc = $acce;
  }

  public function index()
  {
    return view('/pages/archives/vehicle accessories')
    ->with('acce',vAccesoriesConnection::all());
  }

  public function reactivate_vAcce(Request $req)
  {
     $acc = vAccesoriesConnection::where('vehicle_acce_ID', '=', $req->asd)->first();
     $acc->del_flag = 0;
     $mytime = $req->time;
     $acc->updated_at = $mytime;

     $acc->save();
     return redirect('/admin/maintenance/vehicle/accessories');
  }

  public function areactivate_vAcce(Request $req)
  {
    foreach($req->asd as $ID)
    {
     $acc = vAccesoriesConnection::where('vehicle_acce_ID', '=', $ID)->first();
     $acc->del_flag = 0;
     $mytime = $req->time;
     $acc->updated_at = $mytime;

     $acc->save();
    }
  }
}
