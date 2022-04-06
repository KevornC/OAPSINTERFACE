<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function createChild(){
        return view('livewireBlade.parent.liveChild');
    }
    public function showVoucherForm(){
        return view('livewireBlade.parent.liveVoucher');
    }
}
