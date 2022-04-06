<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function verifyParent(){
        return view('livewireBlade.user.verifyParent');
    }
    public function index(){
        return view('livewireBlade.user.liveStudent');
    }
}
