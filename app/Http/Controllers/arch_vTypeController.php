<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\vTypeConnection;

class arch_vTypeController extends Controller
{
  public function __construct(vTypeConnection $type)
  {
      $this->typ = $type;
  }

  public function index()
  {
    return view('/pages/archives/vehicle type')
    ->with('typ',vTypeConnection::all());
  }

  public function reactivate_vType(Request $req)
  {
     $typ = vTypeConnection::where('vehicle_type_ID', '=', $req->asd)->first();
     $typ->del_flag = 0;
     $mytime = $req->time;
     $typ->updated_at = $mytime;

     $typ->save();
     return redirect('/admin/maintenance/vehicle/types');
  }

  public function areactivate_vType(Request $req)
  {
    foreach($req->asd as $ID)
    {
     $typ = vTypeConnection::where('vehicle_type_ID', '=', $ID)->first();
     $typ->del_flag = 0;
     $mytime = $req->time;
     $typ->updated_at = $mytime;

     $typ->save();
    }
  }
}
