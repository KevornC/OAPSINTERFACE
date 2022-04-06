<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveRegisterController extends Controller
{
    //
    function index(){

        return view('livewireBlade.liveRegister');
    }
}
