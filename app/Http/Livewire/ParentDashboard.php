<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ParentDashboard extends Component
{
    public $viewMode = false, $EV; 

    public function switch(){
        $this->viewMode = false;
    }

    public function viewVoucher($id){
    $this->viewMode = true;
        $curl = 'http://192.168.0.12:8081/api/view/voucher'.$id;
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$curl);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $results = curl_exec($ch);
        $this->EV = json_decode($results,true);
        $this->EV = $this->EV['evpd'];
    }
    public function render()
    {
        $id=Session()->get('pID');
        $curl = 'http://192.168.0.12:8081/api/find/all/'.$id;
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$curl);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $results = curl_exec($ch);
        $students = json_decode($results,true);
        return view('livewire.parent-dashboard',compact('students'));
    }
}
