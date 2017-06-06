<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\complaintTypeConnection;

class arch_complaintTypeController extends Controller
{
  public function __construct(complaintTypeConnection $compType)
  {
    $this->comp = $compType;
  }

  public function index()
  {
      return view('/pages/archives/complaintType')
      ->with('complainttype', complaintTypeConnection::all());
  }

  public function reactivate_ctype(Request $req)
  {
    $comp = complaintTypeConnection::where('complaintType_ID','=', $req->asd)->first();

    $comp->del_flag = 0;
    $mytime = $req->time;
    $comp->updated_at = $mytime;

    $comp->save();

    return redirect('/admin/maintenance/complaint/type');
  }

    public function areactivate_ctype(Request $req)
  {
      foreach($req->asd as $ID)
      {
        $comp = complaintTypeConnection::where('complaintType_ID','=', $ID)->first();

        $comp->del_flag = 0;
        $mytime = $req->time;
        $comp->updated_at = $mytime;

        $comp->save();
      }
  }
}
