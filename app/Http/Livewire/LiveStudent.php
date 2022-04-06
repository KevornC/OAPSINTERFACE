<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
class LiveStudent extends Component
{
    use WithFileUploads;
    public $studentIDN, $fname, $lname, $grade, $class;
    public $gender, $dob, $address, $birthCert,$bCert;
    public $addMode, $viewMode=false,$editMode=false;
    public $students,$extractedStudentID,$oldbirthCert;
    public $dropdownFilter="active";
    public $hiddenDetail=false;
    public $stdID, $studentAct, $studentNotAct, $studentSus, $moreInfo;

    public function showHiddenDetail($id){
        $this->hiddenDetail=true;

        $active=$this->studentAct;
        $notActive=$this->studentNotAct;
        $sus=$this->studentSus;
        if($this->dropdownFilter=="active"){
            $a=$active['studentActive'];
            foreach($a as $key){
                if($key['id']==$id){
                   $this->moreInfo=array(
                    'fn'=> $key['firstname'],
                    'ln'=> $key['lastname'],
                    'addr'=> $key['address'],
                    'bC'=> $key['birthCertificate'],
                    'dob'=> $key['dob'],
                    'gen'=> $key['gender'],
                   );
                   }
            }
        }

        if($this->dropdownFilter=="inactive"){
            $a=$notActive['studentNotActive'];
            foreach($a as $key){
                if($key['id']==$id){
                   $this->moreInfo=array(
                    'fn'=> $key['firstname'],
                    'ln'=> $key['lastname'],
                    'addr'=> $key['address'],
                    'bC'=> $key['birthCertificate'],
                    'dob'=> $key['dob'],
                    'gen'=> $key['gender'],
                   );
                   }
            }// dd($this->moreInfo);
        }

        if($this->dropdownFilter=="suspended"){
            $a=$sus['studentSuspended'];
            foreach($a as $key){
                if($key['id']==$id){
                   $this->moreInfo=array(
                    'fn'=> $key['firstname'],
                    'ln'=> $key['lastname'],
                    'addr'=> $key['address'],
                    'bC'=> $key['birthCertificate'],
                    'dob'=> $key['dob'],
                    'gen'=> $key['gender'],
                   );
                   }
            }
        }
       
           
    }
    public function noShowHiddenDetail(){
        $this->hiddenDetail=false;
    }
    public function clearField(){
        $this->studentIDN = '';
        $this->fname = '';
        $this->lname = '';
        $this->grade = '';
        $this->class = '';
        $this->gender = '';
        $this->dob = '';
        $this->address= ''; 
        $this->birthCert= '';
    }
    protected $rules=[
        'studentIDN'=> 'required', 
        'fname'=> 'required', 
        'lname'=> 'required', 
        'grade'=> 'required',
        'class'=> 'required',
        'gender'=> 'required',
        'dob'=> 'required', 
        'address'=> 'required', 
        'birthCert'=> 'required'
   
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    function showEdit($id){
        $this->addMode=false;
        $this->viewMode=true;
        $this->editMode = true;

        $url = 'http://192.168.0.12:8081/api/edit/student/'.$id;
        $ch=curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $student = array_slice($result,1,1);
        $extractedStudent = $student['student'];
        $this->extractedStudentID = $extractedStudent['id'];
        $this->studentIDN = $extractedStudent['id'];
        $this->fname = $extractedStudent['firstname'];
        $this->lname = $extractedStudent['lastname'];
        $this->grade = $extractedStudent['grade'];
        $this->class = $extractedStudent['class'];
        $this->gender = $extractedStudent['gender'];
        $this->dob = $extractedStudent['dob'];
        $this->address= $extractedStudent['address']; 
        $this->birthCert= $extractedStudent['birthCertificate'];
        $this->oldbirthCert= $extractedStudent['birthCertificate'];
    }
    function onEdit(){
        $this->validate();
        $id=$this->extractedStudentID;
        $url = 'http://192.168.0.12:8081/api/update/student/'.$id;
        $ch=curl_init();
        
        if($this->oldbirthCert == $this->birthCert){
            $birthCert = $this->oldbirthCert;
        }else{
            $birthCert=$this->fname." ".$this->lname." ".$this->birthCert->getClientOriginalName();
            $this->birthCert->storePubliclyAs('storage',$birthCert,'studentbirthCert');
        }
        
        $data=array(
        'idenNumber'=> $this->studentIDN, 
        'firstname'=> $this->fname, 
        'lastname'=> $this->lname, 
        'grade'=> $this->grade,
        'class'=> $this->class,
        'gender'=> $this->gender,
        'dob'=> $this->dob, 
        'address'=> $this->address, 
        'birthCertificate'=> $birthCert,
        'status'=> "active"
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
    public function show(){
        $this->viewMode=false;
        $this->addMode=false;
        $this->editMode=false;
        $this->clearField();
    }
    public function add(){
        $this->viewMode=true;
        $this->addMode=true;
    }

    public function onSubmit(){
       $this->validate();
        $url = 'http://192.168.0.12:8081/api/create/student';
        $ch=curl_init();

        $birthCert=$this->fname." ".$this->lname." ".$this->birthCert->getClientOriginalName();
        $this->birthCert->storePubliclyAs('storage',$birthCert,'studentbirthCert');
        
        $data=array(
        'idenNumber'=> $this->studentIDN, 
        'firstname'=> $this->fname, 
        'lastname'=> $this->lname, 
        'grade'=> $this->grade,
        'class'=> $this->class,
        'gender'=> $this->gender,
        'dob'=> $this->dob, 
        'address'=> $this->address, 
        'birthCertificate'=> $birthCert,
        'status'=> "active"
        );
        http_build_query($data);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $results = curl_exec($ch);
        $results = json_decode($results,true);
        $this->show();
        $this->clearField();
    }

    public function render()
    {
        $ch=curl_init();
        $url = 'http://192.168.0.12:8081/api/show/student';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $results = curl_exec($ch);
        $results = json_decode($results,true);
        $studentAll = array_slice($results,0,1);
        $studentActive = array_slice($results,1,1);
        $this->studentAct= $studentActive;
        $studentNotActive = array_slice($results,2,1);
        $this->studentNotAct= $studentNotActive;
        $studentSuspended = array_slice($results,3,1);
        $this->studentSus= $studentSuspended;
        $studentCount = array_slice($results,4,1);
        $moreInfo = $this->moreInfo;
        return view('livewire.live-student',compact('studentAll','studentActive','studentNotActive','studentSuspended','studentCount','moreInfo'));
    }
}
