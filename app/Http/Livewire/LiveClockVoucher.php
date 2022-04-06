<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiveClockVoucher extends Component
{
    public $searchMode=false,$viewResult;
    public $vnID,$vNum,$voucherNum;
    public $status,$rUsage;
    
    protected $rules=[
        'voucherNum' => 'required',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function show(){
        $this->searchMode=false;  
        $this->viewResult=false;  
    }
    public function clear(){
        $this->voucherNum = '';
    }

    public function onSubmit(){
        $this->validate();

        $url = 'http://192.168.0.12:8081/api/search/voucher/'.$this->voucherNum;

        $CH = curl_init();

        curl_setopt($CH,CURLOPT_URL,$url);
        curl_setopt($CH,CURLOPT_RETURNTRANSFER,true);

        $data = curl_exec($CH);
        $data = json_decode($data,true);
        $record=$data['message']['0'];
        if($data['status']!='404'){
            $this->vnID=$record['id'];
            $this->rUsage = $record['RemainingUsage'];
            $this->vNum = $record['e_voucher_payment_details']['voucherNumber'];
            $this->status = $record['status'];
            if($record['status']!='Active'){
                $this->voucherNum='';
                session()->flash('error','E-Voucher Expired');
            }
            $this->searchMode = true;
        $this->viewResult = true;
        }else{
                session()->flash('message','Not Found! Please try again.');
        }
    }

    public function onClock(){
        $csID = session()->get('cID');
        $url = 'http://192.168.0.12:8081/api/clock/'.$csID.'/'.$this->vnID;
        
        $ch =curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $results = curl_exec($ch);
        $this->voucherNum='';
        $this->searchMode = false;
        $this->viewResult = false;
        session()->flash('success','Usage successfully clocked!');
        
    }

    public function render()
    {

        return view('livewire.live-clock-voucher');
    }
}
