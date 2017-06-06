<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\vModelConnection;

use App\vMakeConnection;

class arch_vModelController extends Controller
{
  public function __construct(vModelConnection $model)
  {
      $this->mod = $model;
  }

  public function index()
  {
    return view('/pages/archives/vehicle model')
    ->with('make',vMakeConnection::all())
    ->with('model',vModelConnection::all());
  }

  public function reactivate_vModel(Request $req)
  {
     $mod = vModelConnection::where('vehicle_model_ID', '=', $req->asd)->first();
     $mod->del_flag = 0;
     $mytime = $req->time;
     $mod->updated_at = $mytime;

     $mod->save();
     return redirect('/admin/maintenance/vehicle/model');
  }

  public function areactivate_vModel(Request $req)
  {
    foreach($req->asd as $ID)
    {
     $mod = vModelConnection::where('vehicle_model_ID', '=', $ID)->first();
     $mod->del_flag = 0;
     $mytime = $req->time;
     $mod->updated_at = $mytime;

     $mod->save();
    }
  }
}
