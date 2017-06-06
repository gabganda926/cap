<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\vModelConnection;

use App\vMakeConnection;

class arch_vMakeController extends Controller
{
  public function __construct(vMakeConnection $make)
  {
      $this->mke = $make;
  }

  public function index()
  {
    return view('/pages/archives/vehicle make')
    ->with('make',vMakeConnection::all())
    ->with('model',vModelConnection::all());
  }

  public function reactivate_vMake(Request $req)
  {
     $mke = vMakeConnection::where('vehicle_make_ID', '=', $req->asd)->first();
     $mke->del_flag = 0;
     $mytime = $req->time;
     $mke->updated_at = $mytime;

     $mke->save();
     return redirect('/admin/maintenance/vehicle/make');
  }

  public function areactivate_vMake(Request $req)
  {
    foreach($req->asd as $ID)
    {
     $mke = vMakeConnection::where('vehicle_make_ID', '=', $ID)->first();
     $mke->del_flag = 0;
     $mytime = $req->time;
     $mke->updated_at = $mytime;

     $mke->save();
    }
  }
}
