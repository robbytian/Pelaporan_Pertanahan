<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
 
        if(Auth::User()->level == 1){
            return view('kanwil.index');
        }

        else if(Auth::User()->level == 2){
            return view('kantah.index');
        }

        else if(Auth::User()->level == 3){
            return view('fieldstaff.index');
        }
    }
}
