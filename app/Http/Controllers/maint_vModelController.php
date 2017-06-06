<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\vModelConnection;

use App\vMakeConnection;

use Alert;

use Redirect;

class maint_vModelController extends Controller
{
  public function __construct(vModelConnection $model)
  {
      $this->mod = $model;
  }

  public function index()
  {
    return view('/pages/maintenance/vehicle model')
    ->with('make',vMakeConnection::all())
    ->with('model',vModelConnection::all());
  }

  public function add_vModel(Request $req)
  {
    $this->mod->vehicle_model_name = $req->vehicle_model_name;
    $this->mod->vehicle_make_ID = $req->make_name;
    $mytime = $req->time;
    $this->mod->created_at = $mytime;
    $this->mod->updated_at = $mytime;
    $this->mod->del_flag = 0;

    try
    {
      $this->mod->save();
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

  public function update_vModel(Request $req)
  {
     $mod = vModelConnection::where('vehicle_model_ID', '=', $req->id)->first();
     $mod->vehicle_model_name = $req->avehicle_model_name;
     $mod->vehicle_make_ID = $req->amake_name;
     $mytime = $req->atime;
     $mod->updated_at = $mytime;

     try
      {
        $mod->save();
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

  public function delete_vModel(Request $req)
  {
     $mod = vModelConnection::where('vehicle_model_ID', '=', $req->id)->first();
     $mod->del_flag = 1;
     $mytime = $req->atime;
     $mod->updated_at = $mytime;

     try
     {
       $mod->save();
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

  public function ardelete_vModel(Request $req)
  {
    foreach($req->asd as $ID)
    {
     $mod = vModelConnection::where('vehicle_model_ID', '=', $ID)->first();
     $mod->del_flag = 1;
     $mytime = $req->time;
     $mod->updated_at = $mytime;

     $mod->save();
    }
  }
}
