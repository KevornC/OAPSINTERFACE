<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiveLogin extends Component
{ 
    public $email, $password;

    protected $rules=[
        'email'=>'required|email',
        'password'=>'required'
    ];

    public function updated($propertyName){
        return $this->validateOnly($propertyName);
    }

    public function onSubmit(){
        $data=$this->validate();
        $ch=curl_init();
        $url = 'http://192.168.0.12:8081/api/login';
        
        $data=array(
            'email'=>$this->email,
            'password'=>$this->password,
        );
       
        http_build_query($data);
        
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $results = curl_exec($ch);
        $results = json_decode($results,true);
        
        if($results['status']!="404"){
            if($results['userType']=="parent")
            {
              session()->put('pID',$results['userID']);
              return redirect()->route('parentDashboard');
            }elseif($results['userType']=="canteenStaff"){
                session()->put('cID',$results['userID']);
                session()->put('staffPStatus',$results['cStatus']);
                return redirect()->route('staffChangePassword');
            }elseif($results['userType']=="user"){
                session()->put('uID',$results['userID']);
                return redirect()->route('adminDashboard');
            }
        }else{
            session()->flash('message','Invalid login, please try again.');
        }
        curl_close($ch);

    }
    public function render()
    {
        return view('livewire.live-login');
    }
}
