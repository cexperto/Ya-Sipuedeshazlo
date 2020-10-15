<?php

namespace App\Http\Controllers\Backend\Student;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $services = Service::join("users","users.id","=","services.codUserServices")
                    ->get();
        if($services->isEmpty()){
            //return 'vasio';
            return view('student.create');
        }else{
            //return 'no vasio';
        return view('student.history',compact('services'));

        } 
        
    }
}
