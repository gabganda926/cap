<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class trans_transmittalController extends Controller
{
  public function index()
  {
    return view('/pages/transaction/adm/transmittal');
  }
}
