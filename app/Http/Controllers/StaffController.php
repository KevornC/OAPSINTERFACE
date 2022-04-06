<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    function index(){
      return view('livewireBlade.user.liveStaff');
    }
    function staffChangePassword(){
      if(session()->get('staffPStatus') == 'Newly Opened'){
        return view('livewireBlade.staff.liveChangePassword');
      }elseif(session()->get('staffPStatus') == 'active'){
        return redirect()->route('staffDashboard');
      }
    }
}
