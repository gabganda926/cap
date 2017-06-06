<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class trans_notifyInsuranceController extends Controller
{
  public function index()
  {
    return view('/pages/transaction/adm/notify-client');
  }
}
