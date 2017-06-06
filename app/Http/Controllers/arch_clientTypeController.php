<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\clientTypeConnection;

class arch_clientTypeController extends Controller
{
	public function __construct(clientTypeConnection $clientype)
	{
	    $this->ctype = $clientype;
	}

	public function index()
	{
	    return view('/pages/archives/clientType')
	    ->with('clienttype',clientTypeConnection::all());
	}


    public function reactivate_ctype(Request $req)
    {
      $ctype = clientTypeConnection::where('clientType_ID','=',$req->asd)->first();
      $ctype->del_flag = 0;
      $mytime = $req->time;
      $ctype->updated_at = $mytime;
      $ctype->save();

      return redirect('/admin/maintenance/client/type');
    }

    public function areactivate_ctype(Request $req)
    {   
        foreach($req->asd as $ID)
        {
          $ctype = clientTypeConnection::where('clientType_ID','=',$ID)->first();
          $ctype->del_flag = 0;
          $mytime = $req->time;
          $ctype->updated_at = $mytime;
          $ctype->save();
        }
    }
}
