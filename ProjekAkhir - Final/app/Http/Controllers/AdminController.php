<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function admin() {
      return view('modules.Auth.admin.adminpage');
    }
}
