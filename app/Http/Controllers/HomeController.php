<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){
    $role = Auth::user()->role;
    if($role =='1'){ //admin
        return view('BackOffice.dashboard');
    }
    elseif($role =='0'){ //user
        return view('FrontOffice.index') ;
    }
    else{  //sous-user
        return view('BackOffice.dashboard') ;
    }

    }
}
