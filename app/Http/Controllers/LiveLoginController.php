<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveLoginController extends Controller
{
    function index(){
        if(Session()->has('uID')){
            return redirect()->route('adminDashboard');
        }elseif(Session()->has('cID')){
            return redirect()->route('staffDashboard');
        }elseif(Session()->has('pID')){
            return redirect()->route('parentDashboard');
        }else{
            return view('livewireBlade.liveLogin');
        }
    }
}
