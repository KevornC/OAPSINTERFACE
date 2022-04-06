<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiveVoucher extends Component
{
    public $total=0,$relationID;
    public $period,$nameOnCard,$securityCode,$CardNumber,$month,$year;
    public $view=true;

    protected $rules = [
        'relationID'=>'required',
        'month'=>'required',
        'year'=>'required',
        'nameOnCard'=>'required',
        'CardNumber'=>'required | numeric | min:16',
        'securityCode'=>'required | min:3',
        'period'=>'required'
    ];
    protected $messages=[
        'relationID.required'=>'Please Select Student!',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function clearFields(){
        $this->relationID='';
        $this->total=0;
        $this->nameOnCard='';
        $this->CardNumber='';
        $this->month='';
        $this->year='';
        $this->securityCode='';
        $this->period='';
    }

    public function payNow(){
        $this->validate();

        $ch = curl_init();
        $url = 'http://192.168.0.12:8081/api/payment';
        $vNumber = rand(1,1000);
        $data = array(
            'relationshipID'=>$this->relationID,
            'totalCost'=>$this->total,
            'amountPaid'=>$this->total,
            'nameOnCard'=>$this->nameOnCard,
            'cardNum'=>$this->CardNumber,
            'expDate'=>$this->month.'/'.$this->year,
            'secCode'=>$this->securityCode,
            'totalAllotment'=>$this->period,
            'voucherNumber'=>$vNumber
        );

        http_build_query($data);

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $results = curl_exec($ch);
        $this->clearFields();
        $this->view=false;


    }
    public function render()
    {
        $id=Session()->get('pID');
        $curl = 'http://192.168.0.12:8081/api/find/all/relationships/'.$id;
        $ch=curl_init();

        curl_setopt($ch,CURLOPT_URL,$curl);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $results = curl_exec($ch);
        $students = json_decode($results,true);
        curl_close($ch);

        $url = 'http://192.168.0.12:8081/api/voucher/details';
        $ch=curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res = curl_exec($ch);
        $details = json_decode($res,true);
        curl_close($ch);
        // dd($students);
        if($this->period != ''){
            $this->total=$details['0']['fixedPrice']*$this->period;
        }
        return view('livewire.live-voucher',compact('students','details'));
    }
}
