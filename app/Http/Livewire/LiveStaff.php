<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Hash;

class LiveStaff extends Component
{
    public $viewMode=false, $addMode=true;
    public $firstname, $lastname, $gender, $email, $status, $password, $Sid;
    public $hiddenDetail=false,$dropdownFilter,$canteenCount;

    public function clearField(){
        $this->firstname = '';
        $this->lastname = '';
        $this->gender = '';
    }
    protected $rules=[
        'firstname'=> 'required', 
        'lastname'=> 'required', 
        'gender'=> 'required',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
    public function addMode(){
        $this->viewMode=true;
        $this->addMode=true;
    }
    public function onSubmit(){ 
        $this->validate();
        $num=rand(1,200);
        $ext="@oaps.edu";
        $staffEmail=$this->firstname.$this->lastname.$num.$ext;
        $staffPass=$this->firstname.$this->lastname.$num;
        $staffPass=Hash::make($staffPass);
        
        $url = 'http://192.168.0.12:8081/api/create/staff';
        $ch=curl_init();
        
        $data=array(
        'firstname'=> $this->firstname, 
        'lastname'=> $this->lastname, 
        'gender'=> $this->gender,
        'email'=> $staffEmail,
        'password'=> $staffPass,
        );
        // dd($data);
        http_build_query($data);
        
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $results = curl_exec($ch);
        $results = json_decode($results,true);
        $this->clearField();
        $this->show();
    }

    public function show(){
        $this->viewMode=false;
        $this->addMode=false;
    }
    function showEdit($id){
        $this->addMode=false;
        $this->viewMode=true;
        $this->editMode = true;

        $url = 'http://192.168.0.12:8081/api/edit/staff/'.$id;
        $ch=curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $this->Sid=$result['cs']['id'];
        $this->firstname=$result['cs']['firstname'];
        $this->lastname=$result['cs']['lastname'];
        $this->gender=$result['cs']['gender'];
        $this->status=$result['cs']['status'];
    }

    public function editStaff(){
        $this->validate();
        $url = 'http://192.168.0.12:8081/api/update/staff/'.$this->Sid;
        $ch=curl_init();

        $data=array(
        'firstname'=> $this->firstname, 
        'lastname'=> $this->lastname, 
        'gender'=> $this->gender,
        'status'=> $this->status
        );
        http_build_query($data);
        
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $results = curl_exec($ch);
        $results = json_decode($results,true);

        $this->addMode=false;
        $this->viewMode=false;
        $this->clearField();
    }
    public function render()
    {
        $url = 'http://192.168.0.12:8081/api/show/staff';
        $ch=curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $results = curl_exec($ch);
        $results = json_decode($results,true);
        $this->canteenCount = array_slice($results,2,1);
        return view('livewire.live-staff',compact('results'));
    }
}
