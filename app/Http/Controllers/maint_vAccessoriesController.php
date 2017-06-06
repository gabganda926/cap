<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\vAccesoriesConnection;

use Alert;

use Redirect;

class maint_vAccessoriesController extends Controller
{
  public function __construct(vAccesoriesConnection $acce)
  {
      $this->acc = $acce;
  }

  public function index()
  {
    return view('/pages/maintenance/vehicle accessories')
    ->with('acce',vAccesoriesConnection::all());
  }

  public function add_vAcce(Request $req)
  {
    $this->acc->vehicle_acce_name = $req->vehicle_acce_name;
    $mytime = $req->time;
    $this->acc->created_at = $mytime;
    $this->acc->updated_at = $mytime;
    $this->acc->del_flag = 0;
    try
    {
      $this->acc->save();
      alert()
      ->success('Record Saved', 'Success')
      ->persistent("Close");

      return Redirect::back();
    }
    catch(\Exception $e)
    {
      $message = $e->getCode();
      if($message == 23000)
      {
          alert()
          ->error('ERROR', 'Data already exist!')
          ->persistent("Close");

          return Redirect::back();
      }
      else if($message == 22001)
      {
        alert()
        ->error('ERROR', 'Exceed Max limit of column!')
        ->persistent("Close");

        return Redirect::back();
      }
      else
      {
        alert()
        ->error('ERROR', $e->getCode())
        ->persistent("Close");

        return Redirect::back();
      }
    }
  }

  public function update_vAcce(Request $req)
  {
     $acc = vAccesoriesConnection::where('vehicle_acce_ID', '=', $req->id)->first();
     $acc->vehicle_acce_name = $req->avehicle_acce_name;
     $mytime = $req->atime;
     $acc->updated_at = $mytime;

     try
      {
        $acc->save();
        alert()
        ->success('Record Updated', 'Success')
        ->persistent("Close");

        return Redirect::back();
      }
      catch(\Exception $e)
      {
        $message = $e->getCode();
        if($message == 23000)
        {
            alert()
            ->error('ERROR', 'Data already exist!')
            ->persistent("Close");

            return Redirect::back();
        }
        else if($message == 22001)
        {
          alert()
          ->error('ERROR', 'Exceed Max limit of column!')
          ->persistent("Close");

          return Redirect::back();
        }
        else
        {
          alert()
          ->error('ERROR', $e->getCode())
          ->persistent("Close");

          return Redirect::back();
        }
      }
  }

  public function delete_vAcce(Request $req)
  {
     $acc = vAccesoriesConnection::where('vehicle_acce_ID', '=', $req->id)->first();
     $acc->del_flag = 1;
     $mytime = $req->atime;
     $acc->updated_at = $mytime;
     try
     {
       $acc->save()
       ;alert()
       ->success('Record Deleted', 'Success')
       ->persistent("Close");

       return Redirect::back();
     }
     catch(\Exception $e)
     {
       $message = $e->getCode();
       if($message == 23000)
       {
           alert()
           ->error('ERROR', 'Data already exist!')
           ->persistent("Close");

           return Redirect::back();
       }
       else if($message == 22001)
       {
         alert()
         ->error('ERROR', 'Exceed Max limit of column!')
         ->persistent("Close");

         return Redirect::back();
       }
       else
       {
         alert()
         ->error('ERROR', $e->getCode())
         ->persistent("Close");

         return Redirect::back();
       }
     }
  }

  public function ardelete_vAcce(Request $req)
  {
    foreach($req->asd as $ID)
    {
     $acc = vAccesoriesConnection::where('vehicle_acce_ID', '=', $ID)->first();
     $acc->del_flag = 1;
     $mytime = $req->time;
     $acc->updated_at = $mytime;

     $acc->save();
    }
  }
}
