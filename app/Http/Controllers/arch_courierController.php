<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\courierConnection;

use App\personalInfoConnection;

class arch_courierController extends Controller
{
  public function __construct(courierConnection $cor, personalInfoConnection $personalinfo)
  {
      $this->courier = $cor;
      $this->pinfo = $personalinfo;
  }

  public function index()
  {
    return view('/pages/archives/courier')
    ->with('cor',courierConnection::all())
    ->with('pnf',personalInfoConnection::all());
  }

  public function reactivate_courier(Request $req)
  {
      $courier = courierConnection::where('courier_ID', '=', $req->asd)->first();

      $courier->del_flag = 0;
      $mytime = $req->time;
      $courier->updated_at = $mytime;

      $courier->save();

      return redirect('admin/maintenance/courier');
  }

  public function areactivate_courier(Request $req)
  {
      foreach($req->asd as $ID)
      {
        $courier = courierConnection::where('courier_ID', '=', $ID)->first();

        $courier->del_flag = 0;
        $mytime = $req->time;
        $courier->updated_at = $mytime;

        $courier->save();
      }
  }
}
