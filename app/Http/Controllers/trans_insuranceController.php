<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class trans_insuranceController extends Controller
{
  public function index()
  {
    return view('/pages/transaction/adm/insurance');
  }
}
