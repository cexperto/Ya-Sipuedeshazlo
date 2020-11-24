<?php

namespace App\Http\Controllers\Backend\employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\TypeOfService;
use DB;

class acquiredServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function acquired(){
        
        $idUser=auth()->user()->id;        
        $services = Service::where('employerId','=',$idUser)
                    ->where('state','=','Adquirido')->get();
               
        
        return view('Employer.buyServices', compact('services'));
        
    }
    public function acquiredDetaill(Request $request){
        $studentId = $request->input('userId');
        $serviceId = $request->input('id');
        $users = User::where('id','=',$studentId)->get();
        $services = Service::where('id','=',$serviceId)->get();
        $types = TypeOfService::where('codServicesType','=',$serviceId)->get();

        return view('Employer.BuyDetaill', compact('users','services','types'));
    }
}
