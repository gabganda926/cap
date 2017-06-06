<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class trans_tallyController extends Controller
{
  public function index()
  {
    return view('/pages/transaction/adm/tally');
  }
}
