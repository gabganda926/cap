<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class trans_clientFPGController extends Controller
{
  public function index()
  {
    return view('/pages/transaction/adm/client-info-fpg');
  }
}
