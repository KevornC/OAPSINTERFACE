<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiveChangePassword extends Component
{
    public $changePass = false;
    public $password, $confirm;

    public function modifyPassword(){
        $pLength=strlen($this->password);
        if($this->password!=$this->confirm){
            session()->flash('noMatch','Password does not match.');
        }if($pLength < 8){
            session()->flash('pLen','Password cannot be less than 8 characters.');
        }else{

            $id = session()->get('cID');
            $ch = curl_init();
            $url = 'http://192.168.0.12:8081/api/modify/password/'.$id;
            $data=array(
                'newPassword'=>$this->password,
            );
            http_build_query($data);
            
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_POST,true);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            $results = curl_exec($ch);
            Session()->put('staffPStatus','active');
            return redirect()->route('staffChangePassword');
            $this->changePass=false;
        }
        
    }
    public function render()
    {
        return view('livewire.live-change-password');
    }
}
