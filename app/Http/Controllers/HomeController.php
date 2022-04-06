<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }
    public function home()
    {
        return view('dashboard.parentDashboard');
    }
    public function staff(){
        return view('dashboard.staffDashboard');
    }
    
    public function admin(){
        $ch=curl_init();
        $url = 'http://192.168.0.12:8081/api/stats';
        // $data=array(
        //     'email'=>$this->email,
        //     'password'=>$this->password,
        // );
       
        // http_build_query($data);
        
        curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_POST,true);
        // curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $results = curl_exec($ch);
        $results = json_decode($results,true);
        // dd($results);
        return view('dashboard.userDashboard',compact('results'));
    }

    public function parentLogout(){
        session()->flush('pID');
        return redirect()->route('login');
    }
    public function cantenStaffLogout(){
        session()->flush('cID');
        return redirect()->route('login');
    }
    public function adminLogout(){
        session()->flush('uID');
        return redirect()->route('login');
    }
}
