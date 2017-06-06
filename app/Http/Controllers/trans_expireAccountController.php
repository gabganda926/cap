<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class trans_expireAccountController extends Controller
{
  public function index()
  {
    return view('/pages/transaction/adm/expiring-accounts');
  }
}
